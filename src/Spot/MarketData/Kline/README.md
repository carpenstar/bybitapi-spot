# Market Data - Kline
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/kline)</b>

> Endpoint returns the results of only the last 1000 candles, regardless of what interval is specified.

> If startTime and endTime are not specified, only the last candles will be sent.


```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Kline::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline;

$bybitApiData = (new BybitAPI())
    ->setCredentials('https://api-testnet.bybit.com','apiKey', 'apiSecret')
    ->publicEndpoint(Kline::class, (new KlineRequest())->setSymbol("ATOMUSDT")->setInterval(EnumIntervals::MINUTE1)->setLimit(5))
    ->execute();


echo "Return code: {$bybitApiData->getReturnCode()} \n";
echo "Return message: {$bybitApiData->getReturnMessage()} \n";

/**
* @var KlineResponseItem[] $listKline
*/
$listKline = $bybitApiData->getResult()->getKlineList();
foreach ($listKline as $kline) {
    echo " ----- \n";
    echo "  Time: {$kline->getTime()->format('Y-m-d H:i:s')} \n";
    echo "  Symbol: {$kline->getSymbol()} \n";
    echo "  Alias: {$kline->getAlias()} \n";
    echo "  Close Price: {$kline->getClosePrice()} \n";
    echo "  High Price: {$kline->getHighPrice()} \n";
    echo "  Low Price: {$kline->getLowPrice()} \n";
    echo "  Open Price: {$kline->getOpenPrice()} \n";
    echo "  Trading Volume: {$kline->getTradingVolume()} \n";
}

/**
* Return code: 0
* Return message: OK
* -----
*   Time: 2024-06-16 17:09:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:10:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:11:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:12:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:13:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
*/
```

<br />

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Limit for data size. [1, 1000]. Default: 1000
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * Chart interval
     * @param string $interval
     * @return self
     */
    public function setInterval(string $interval): self;
    public function getInterval(): string;

    /**
     * Start time, eq: Y-m-d H:i:s
     * @param int $startTime
     * @return self
     */
    public function setStartTime(int $startTime): self;
    public function getStartTime(): int;

    /**
     * End time, eq: H:i:s
     * @param int $endTime
     * @return self
     */
    public function setEndTime(int $endTime): self;
    public function getEndTime(): int;
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

<br />

<h3 align="left" width="100%"><b>RESPONSE STRUCTURE</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineResponseItemInterface
{
    /**
     * Timestamp
     * @return \DateTime
     */
    public function getTime(): \DateTime;

    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Alias
     * @return string
     */
    public function getAlias(): string;

    /**
     * Close price
     * @return float
     */
    public function getClosePrice(): float;

    /**
     * High price
     * @return float
     */
    public function getHighPrice(): float;

    /**
     * Low price
     * @return float
     */
    public function getLowPrice(): float;

    /**
     * Open price
     * @return float
     */
    public function getOpenPrice(): float;

    /**
     * Trading volume
     * @return float
     */
    public function getTradingVolume(): float;
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineResponseItemInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponseItem::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> Tick start time </td>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td> Trading instrument </td>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getAlias()</td>
     <td style="text-align: center">string</td>
     <td> Alias </td>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getClosePrice()</td>
     <td style="text-align: center">float</td>
     <td> Tick closing price </td>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getHighPrice()</td>
     <td style="text-align: center">float</td>
     <td> Maximum tick price </td>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getLowPrice()</td>
     <td style="text-align: center">float</td>
     <td> Minimum tick price </td>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getOpenPrice()</td>
     <td style="text-align: center">float</td>
     <td> Tick opening price </td>
   </tr>
   <tr>
     <td>IKlineResponseItemInterface::getTradingVolume()</td>
     <td style="text-align: center">float</td>
     <td> Trading volume </td>
   </tr>
</table>

---