# Market Data - Kline
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/kline)</b>

> Endpoint returns the results of only the last 1000 candles, regardless of what interval is specified.

> If startTime and endTime are not specified, only the last candles will be sent.


```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Kline::class
```

<p align="center" width="100%"><b>EXAMPLE</b></p>

```php
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new KlineRequest())
    ->setSymbol("ATOMUSDT")
    ->setInterval(EnumIntervals::MINUTE1)
    ->setLimit(3);

/** @var KlineResponse $kline */
$kline = $bybit->rest(Kline::class, $options)->getBody()->fetch();



echo "Time: {$kline->getTime()->format('Y-m-d H:i:s')}" . PHP_EOL;
echo "Symbol: {$kline->getSymbol()}" . PHP_EOL;
echo "Alias: {$kline->getAlias()}" . PHP_EOL;
echo "Close Price: {$kline->getClosePrice()}" . PHP_EOL;
echo "High Price: {$kline->getHighPrice()}" . PHP_EOL;
echo "Low Price: {$kline->getLowPrice()}" . PHP_EOL;
echo "Open Price: {$kline->getOpenPrice()}" . PHP_EOL;
echo "Trading Volume: {$kline->getTradingVolume()}" . PHP_EOL;

/**
 * Result:
 *
 * Time: 2023-05-09 18:30:00
 * Symbol: ATOMUSDT
 * Alias: ATOMUSDT
 * Close Price: 702.8
 * High Price: 702.85
 * Low Price: 702.65
 * Open Price: 702.65
 * Trading Volume: 0.03
 */
```

<p align="center" width="100%"><b>REQUEST PARAMETERS</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineRequestInterface
{
     public function setSymbol(string $symbol): self; // Trading instrument
     public function setLimit(int $limit): self; // Limit on the number of ticks received. [1, 1000]. Default: 1000
     public function setInterval(string $interval): self; // Tick size. Available values: 1m, 3m, 5m, 15m, 30m, 1h, 2h, 4h, 6h, 12, 1d, 1w, 1M
     public function setStartTime(int $timestamp): self; // Timestamp from which we get the data slice
     public function setEndTime(int $timestamp): self; // Timestamp BEFORE which we get the data slice
    
     // .. Getters
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineRequestInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 40%; text-align: center">Method</th>
     <th style="width: 10%; text-align: center">Required</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setSymbol(string $symbol): self</td>
     <td style="text-align: center"><b>YES</b></td>
     <td> Trading instrument</td>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setInterval(string $interval): self</td>
     <td style="text-align: center"><b>YES</b></td>
     <td>
         Teak size. Available values: 1m, 3m, 5m, 15m, 30m, 1h, 2h, 4h, 6h, 12, 1d, 1w, 1M
     </td>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setLimit(int $limit): self</td>
     <td style="text-align: center">NO</td>
     <td> Limit on the number of ticks received. [1, 1000]. Default: 1000 </td>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setStartTime(int $startTime): self</td>
     <td style="text-align: center">NO</td>
     <td> Timestamp from which we get the data slice </td>
   </tr>
   <tr>
     <td>IKlineRequestInterface::setEndTime(int $endTime): self</td>
     <td style="text-align: center">NO</td>
     <td> Timestamp BEFORE which we get the data slice </td>
   </tr>
</table>

<p align="center" width="100%"><b>RESPONSE STRUCTURE</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineResponseInterface
{
     public function getTime(): \DateTime; // Tick start time
     public function getSymbol(): string; // Trading instrument
     public function getAlias(): string; // Alias
     public function getClosePrice(): float; // Tick closing price
     public function getHighPrice(): float; // Maximum tick price
     public function getLowPrice(): float; // Minimum tick price
     public function getOpenPrice(): float; // Tick opening price
     public function getTradingVolume(): float; // Trading volume
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> Tick start time </td>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td> Trading instrument </td>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getAlias()</td>
     <td style="text-align: center">string</td>
     <td> Alias </td>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getClosePrice()</td>
     <td style="text-align: center">float</td>
     <td> Tick closing price </td>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getHighPrice()</td>
     <td style="text-align: center">float</td>
     <td> Maximum tick price </td>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getLowPrice()</td>
     <td style="text-align: center">float</td>
     <td> Minimum tick price </td>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getOpenPrice()</td>
     <td style="text-align: center">float</td>
     <td> Tick opening price </td>
   </tr>
   <tr>
     <td>IKlineResponseInterface::getTradingVolume()</td>
     <td style="text-align: center">float</td>
     <td> Trading volume </td>
   </tr>
</table>

---