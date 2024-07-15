# Market Data - Tickers
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/tickers)</b>

```php
// Endpoint classname
\Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Tickers::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Request\TickersRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Response\TickersResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Tickers;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new TickersRequest())
    ->setSymbol("ATOMUSDT");

/** @var TickersResponse $tickersData */
$tickersData = $bybit->publicEndpoint(Tickers::class, $options)->execute()->getResult();


echo "Time: {$tickersData->getTime()->format('Y-m-d H:i:s')}" . PHP_EOL;
echo "Symbol: {$tickersData->getSymbol()}" . PHP_EOL;
echo "Best Ask Price: {$tickersData->getBestAskPrice()}" . PHP_EOL;
echo "Last Traded Price: {$tickersData->getLastTradedPrice()}" . PHP_EOL;
echo "High Price: {$tickersData->getHighPrice()}" . PHP_EOL;
echo "Low Price: {$tickersData->getLowPrice()}" . PHP_EOL;
echo "Open Price: {$tickersData->getOpenPrice()}" . PHP_EOL;
echo "Best Bid Price: {$tickersData->getBestAskPrice()}" . PHP_EOL;
echo "Trading Volume: {$tickersData->getTradingVolume()}" . PHP_EOL;
echo "Trading Quote Volume: {$tickersData->getTradingQuoteVolume()}" . PHP_EOL;

/**
 * Result:
 *
 * Time: 2023-05-12 10:00:24
 * Symbol: ATOMUSDT
 * Best Ask Price: 702.85
 * Last Traded Price: 702.85
 * High Price: 702.85
 * Low Price: 702.4
 * Open Price: 702.85
 * Best Bid Price: 702.85
 * Trading Volume: 25.74
 * Trading Quote Volume: 18091.003
 */
```

<br />

<h3 align="left" width="100%"><b>QUERY PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces;

interface ITickerRequestInterface
{
     public function setSymbol(string $symbol): self; // Trading instrument
    
     // .. Getters
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces\ITickerRequestInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Request\TickersRequest::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 40%; text-align: center">Method</th>
     <th style="width: 10%; text-align: center">Required</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>ITickerRequestInterface::setSymbol(string $symbol)</td>
     <td style="text-align: center"><b>YES</b></td>
     <td>Trading instrument</td>
   </tr>
</table>

<br />

<h3 align="left" width="100%"><b>RESPONSE STRUCTURE</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces;

interface ITickersResponseInterface
{
     public function getTime(): \DateTime; // Request execution time
     public function getSymbol(): string; // Trading instrument
     public function getBestAskPrice(): float; // Best selling price in 24 hours
     public function getLastTradedPrice(): float; // Last trade price
     public function getHighPrice(): float; // Maximum price for 24 hours
     public function getLowPrice(): float; // Lowest price in 24 hours
     public function getOpenPrice(): float; // Opening price for 24 hours
     public function getBestBidPrice(): float; // Best buy price in 24 hours
     public function getTradingVolume(): float; // Trading volume for 24 hours
     public function getTradingQuoteVolume(): float; // Traded volume of a symbol for 24 hours
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces\ITickersResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Response\TickersResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> Request execution time </td>
   </tr>
   <tr>
<td>ITickersResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td> Trading instrument </td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getBestAskPrice()</td>
     <td style="text-align: center">float</td>
     <td>Best selling price in 24 hours</td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getLastTradedPrice()</td>
     <td style="text-align: center">float</td>
     <td> Last trade price </td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getHighPrice()</td>
     <td style="text-align: center">float</td>
     <td> Maximum price for 24 hours </td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getLowPrice()</td>
     <td style="text-align: center">float</td>
     <td> Lowest price in 24 hours </td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getOpenPrice()</td>
     <td style="text-align: center">float</td>
     <td> Opening price for 24 hours </td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getBestBidPrice()</td>
     <td style="text-align: center">float</td>
     <td>Best purchase price within 24 hours</td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getTradingVolume()</td>
     <td style="text-align: center">float</td>
     <td> Trading volume for 24 hours </td>
   </tr>
   <tr>
     <td>ITickersResponseInterface::getTradingQuoteVolume()</td>
     <td style="text-align: center">float</td>
     <td>Trade volume of a symbol in 24 hours</td>
   </tr>
</table>


---
