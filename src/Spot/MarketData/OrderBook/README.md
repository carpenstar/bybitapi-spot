# Market Data - Order Book
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/depth)</b>

```php
// Endpoint classname
\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\OrderBook::class
```

<p align="center" width="100%"><b>EXAMPLE</b></p>

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\OrderBook;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Request\OrderBookRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookPriceResponse;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new OrderBookRequest())
    ->setSymbol("ATOMUSDT")
    ->setLimit(5);

/** @var OrderBookResponse $orderBookData */
$orderBookData = $bybit->rest(OrderBook::class, $options)->getBody()->fetch();



echo "Time: {$orderBookData->getTime()->format('Y-m-d H:i:s')}" . PHP_EOL;
echo "Bids:" . PHP_EOL;
/** @var OrderBookPriceResponse $bid */
foreach ($orderBookData->getBids()->all() as $bid) {
    echo " - Bid Price: {$bid->getPrice()} Bid Quantity: {$bid->getQuantity()}" . PHP_EOL;
}
echo "Asks:" . PHP_EOL;
/** @var OrderBookPriceResponse $ask */
foreach ($orderBookData->getAsks()->all() as $ask) {
    echo " - Bid Price: {$ask->getPrice()} Bid Quantity: {$ask->getQuantity()}" . PHP_EOL;
}

/**
 * Result:
 * 
 * Time: 2023-05-12 10:15:41
 * Bids:
 * - Bid Price: 171.45 Bid Quantity: 19.29
 * - Bid Price: 104.15 Bid Quantity: 9.96
 * - Bid Price: 90.25 Bid Quantity: 99.72
 * - Bid Price: 81.05 Bid Quantity: 0.75
 * - Bid Price: 16.7 Bid Quantity: 5.98
 * Asks:
 * - Bid Price: 702.85 Bid Quantity: 1639.55
 * - Bid Price: 702.9 Bid Quantity: 0.01
 * - Bid Price: 703 Bid Quantity: 0.01
 * - Bid Price: 703.25 Bid Quantity: 0.01
 * - Bid Price: 704.8 Bid Quantity: 179.16
 */
```

---

<p align="center" width="100%"><b>REQUEST PARAMETERS</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookRequestInterface
{
     public function setSymbol(string $symbol): self; // Trading instrument
     public function setLimit(int $limit): self; //
    
     // .. Getters
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookRequestInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Request\OrderBookRequest::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 40%; text-align: center">Method</th>
     <th style="width: 10%; text-align: center">Required</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOrderBookRequestInterface::setSymbol(string $symbol)</td>
     <td style="text-align: center"><b>YES</b></td>
     <td>Trading instrument</td>
   </tr>
   <tr>
     <td>IOrderBookRequestInterface::setLimit(int $limit)</td>
     <td style="text-align: center">NO</td>
     <td> Data size limit. [1, 200]. Default: 100 (50 ask + 50 bid) </td>
   </tr>
</table>

---

<p align="center" width="100%"><b>RESPONSE STRUCTURE</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookResponseInterface
{
     public function getTime(): \DateTime; // Request execution time
     public function getAsks(): EntityCollection;
     public function getBids(): EntityCollection;
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOrderBookResponseInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> - </td>
   </tr>
   <tr>
     <td>IOrderBookResponseInterface::getAsks()</td>
     <td style="text-align: center">IOrderBookPriceResponseInterface[]</td>
     <td> - </td>
   </tr>
   <tr>
     <td>IOrderBookResponseInterface::getBids()</td>
     <td style="text-align: center">IOrderBookPriceResponseInterface[]</td>
     <td> - </td>
   </tr>
</table>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookPriceResponseInterface
{
     public function getPrice(): float;
     public function getQuantity(): float;
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup><br/>
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookPriceResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup><br/>
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookPriceItemResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOrderBookPriceResponseInterface::getPrice()</td>
     <td style="text-align: center">float</td>
     <td> Price </td>
   </tr>
   <tr>
     <td>IOrderBookPriceResponseInterface::getQuantity()</td>
     <td style="text-align: center">float</td>
     <td> Number of tokens at this price </td>
   </tr>
</table>

---