# Market Data - Merged Order Book
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/merge-depth)</b>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\MergedOrderBook::class
```

<p align="center" width="100%"><b>EXAMPLE</b></p>

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Request\MergedOrderBookRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\MergedOrderBook;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookPriceResponse;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new MergedOrderBookRequest())
    ->setSymbol("BTCUSDT")
    ->setScale(1)
    ->setLimit(5);

/** @var MergedOrderBookResponse $mergedOrderBook */
$mergedOrderBook = $bybit->rest(MergedOrderBook::class, $options)->getBody()->fetch();



echo "Time: {$mergedOrderBook->getTime()->format('Y-m-d H:i:s')}" . PHP_EOL;
echo '---' . PHP_EOL;
/** @var MergedOrderBookPriceResponse $bid */
foreach ($mergedOrderBook->getBids()->all() as $bid) {
    echo " - Bid Price: {$bid->getPrice()} Bid Quantity: {$bid->getQuantity()}" . PHP_EOL;
}
echo '---' . PHP_EOL;
/** @var MergedOrderBookPriceResponse $ask */
foreach ($mergedOrderBook->getAsks()->all() as $ask) {
    echo " - Ask Price: {$ask->getPrice()} Ask Quantity: {$ask->getQuantity()}" . PHP_EOL;
}
echo '---' . PHP_EOL;


/**
 * Result:
 *
 * Time: 2023-05-11 21:10:57
 * ---
 * - Bid Price: 27028.4 Bid Quantity: 0.052636
 * - Bid Price: 27028.3 Bid Quantity: 0.193124
 * - Bid Price: 27014.8 Bid Quantity: 0.020057
 * - Bid Price: 27014.7 Bid Quantity: 0.003761
 * - Bid Price: 26938.2 Bid Quantity: 0.001864
 * ---
 * - Ask Price: 27028.5 Ask Quantity: 0.132579
 * - Ask Price: 27028.6 Ask Quantity: 0.077184
 * - Ask Price: 27033.1 Ask Quantity: 0.152256
 * - Ask Price: 27033.2 Ask Quantity: 0.016766
 * - Ask Price: 27033.4 Ask Quantity: 0.112448
 * ---
 */
```

---

<p align="center" width="100%"><b>REQUEST PARAMETERS</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookRequestInterface
{
     public function setSymbol(string $symbol): self; // Trading instrument
     public function setScale(int $scale): self; // Precision of the combined order book: 1 means 1 digit.
     public function setLimit(int $limit): self; // Data size limit. [1, 200]. Default: 100 (50 ask + 50 bid)
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IMergedOrderBookRequestInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Request\MergedOrderBookRequest::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 40%; text-align: center">Method</th>
     <th style="width: 10%; text-align: center">Required</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setSymbol(string $symbol)</td>
     <td style="text-align: center"><b>YES</b></td>
     <td> Trading instrument</td>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setScale(int $scale)</td>
     <td style="text-align: center">NO</td>
     <td> Consolidated order book precision: 1 means 1 digit. </td>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setLimit(int $limit)</td>
     <td style="text-align: center">NO</td>
     <td> Data size limit. [1, 200]. Default: 100 (50 ask + 50 bid) </td>
   </tr>
</table>

---

<p align="center" width="100%"><b>RESPONSE STRUCTURE</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookResponseInterface
{
     public function getTime(): \DateTime; 
     public function getAsks(): EntityCollection; 
     public function getBids(): EntityCollection; 

}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces\ILastTradedPriceResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>ILastTradedPriceResponseInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> - </td>
   </tr>
   <tr>
     <td>ILastTradedPriceResponseInterface::getAsks()</td>
     <td style="text-align: center">MergedOrderBookPriceItemResponse[]</td>
     <td> - </td>
   </tr>
   <tr>
     <td>ILastTradedPriceResponseInterface::getBids()</td>
     <td style="text-align: center">MergedOrderBookPriceItemResponse[]</td>
     <td> - </td>
   </tr>
</table>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookPriceResponseInterface
{
     public function getPrice(): float;
     public function getQuantity(): float;
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookPriceResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookPriceItemResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IMergedOrderBookPriceResponseInterface::getPrice()</td>
     <td style="text-align: center">float</td>
     <td> Price </td>
   </tr>
   <tr>
     <td>IMergedOrderBookPriceResponseInterface::getQuantity()</td>
     <td style="text-align: center">float</td>
     <td> Quantity of tokens at this price </td>
   </tr>
</table>

---