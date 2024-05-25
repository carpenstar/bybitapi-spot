# Market Data - Best Bid Ask Price
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/bid-ask)</b>

> If a trading instrument is not specified, the best order price of all symbols will be returned.

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\BestBidAskPrice::class
```

<p align="center" width="100%"><b>EXAMPLE</b></p>

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\BestBidAskPrice;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Request\BestBidAskPriceRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Response\BestBidAskPriceResponse;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new BestBidAskPriceRequest())->setSymbol("BTCUSDT");

/** @var BestBidAskPriceResponse $bestBidAskPrice */
$bestBidAskPrice = $bybit->rest(BestBidAskPrice::class, $options)->getBody()->fetch();



echo "Symbol: {$bestBidAskPrice->getSymbol()}" . PHP_EOL;
echo "Bid Price: {$bestBidAskPrice->getBidPrice()}" . PHP_EOL;
echo "Bid Qty: {$bestBidAskPrice->getBidQty()}" . PHP_EOL;
echo "Ask Price: {$bestBidAskPrice->getAskPrice()}" . PHP_EOL;
echo "Ask Qty: {$bestBidAskPrice->getAskQty()}" . PHP_EOL;
echo "Time: {$bestBidAskPrice->getTime()->format("Y-m-d H:i:s")}" . PHP_EOL;

/**
 * Result:
 *
 * Symbol: BTCUSDT
 * Bid Price: 27776
 * Bid Qty: 0.002492{}
 * Ask Price: 27776.01
 * Ask Qty: 0.004536
 * Time: 2023-05-09 18:03:57
 */
```

<p align="center" width="100%"><b>REQUEST PARAMETERS</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces;

interface IBestBidAskPriceRequestInterface
{
    public function setSymbol(string $symbol): self;
    
    // .. Getters
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces\IBestBidAskPriceRequestInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Response\BestBidAskPriceResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 40%; text-align: center">Method</th>
     <th style="width: 10%; text-align: center">Required</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IBestBidAskPriceRequestInterface::setSymbol(string $symbol): self</td>
     <td style="text-align: center"><b>YES</b></td>
     <td>Line with trading pair ticker</td>
   </tr>
</table>

<p align="center" width="100%"><b>RESPONSE STRUCTURE</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces;

interface IBestBidAskPriceResponseInterface
{
     public function getSymbol(): string; // Trading instrument
     public function getAskPrice(): float; // Best selling price
     public function getAskQty(): float; // Quantity at best selling price
     public function getBidPrice(): float; // Best buy price
     public function getBidQty(): float; // Quantity at best purchase price
     public function getTime(): \DateTime; // Request response time
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces\IBestBidAskPriceResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Response\BestBidAskPriceResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IBestBidAskPriceResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td> Trading instrument </td>
   </tr>
   <tr>
     <td>IBestBidAskPriceResponseInterface::getAskPrice()</td>
     <td style="text-align: center">float</td>
     <td> Best selling price </td>
   </tr>
   <tr>
     <td>IBestBidAskPriceResponseInterface::getAskQty()</td>
     <td style="text-align: center">float</td>
     <td> Quantity at best selling price </td>
   </tr>
   <tr>
     <td>IBestBidAskPriceResponseInterface::getBidPrice()</td>
     <td style="text-align: center">float</td>
     <td> Best purchase price </td>
   </tr>
   <tr>
     <td>IBestBidAskPriceResponseInterface::getBidQty()</td>
     <td style="text-align: center">float</td>
     <td> Quantity at best purchase price </td>
   </tr>
   <tr>
     <td>IBestBidAskPriceResponseInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> Request response time </td>
   </tr>
</table>

---