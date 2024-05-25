# Market Data - Tickers
<b>[Официальная страница документации](https://bybit-exchange.github.io/docs/spot/public/tickers)</b>

```php
// Endpoint classname
\Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Tickers::class
```

<p align="center" width="100%"><b>ПРИМЕР</b></p>

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Request\TickersRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Response\TickersResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Tickers;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new TickersRequest())
    ->setSymbol("ATOMUSDT");

/** @var TickersResponse $tickersData */
$tickersData = $bybit->rest(Tickers::class, $options)->getBody()->fetch();



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

---

<p align="center" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces;

interface ITickerRequestInterface
{
    public function setSymbol(string $symbol): self; // Торговый инструмент
    
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
    <th style="width: 40%; text-align: center">Метод</th>
    <th style="width: 10%; text-align: center">Обязательно</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>ITickerRequestInterface::setSymbol(string $symbol)</td>
    <td style="text-align: center"><b>ДА</b></td>
    <td>Торговый инструмент</td>
  </tr>
</table>


<p align="center" width="100%"><b>CТРУКТУРА ОТВЕТА</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces;

interface ITickersResponseInterface
{
    public function getTime(): \DateTime; // Время исполнения запроса
    public function getSymbol(): string; // Торговый инструмент
    public function getBestAskPrice(): float; // Лучшая цена продажи за 24 часа
    public function getLastTradedPrice(): float; // Цена последней сделки
    public function getHighPrice(): float; // Максимальная цена за 24 часа
    public function getLowPrice(): float; // Наименьшая цена за 24 часа
    public function getOpenPrice(): float; // Цена открытия за 24 часа
    public function getBestBidPrice(): float; // Лучшая цена покупки за 24 часа
    public function getTradingVolume(): float; // Торговый обьем за 24 часа
    public function getTradingQuoteVolume(): float; // Проторгованный обьем символа за 24 часа
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
    <th style="width: 30%; text-align: center">Метод</th>
    <th style="width: 20%; text-align: center">Тип</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getTime()</td>
    <td style="text-align: center">DateTime</td>
    <td> Время исполнения запроса </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getSymbol()</td>
    <td style="text-align: center">string</td>
    <td> Торговый инструмент </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getBestAskPrice()</td>
    <td style="text-align: center">float</td>
    <td> Лучшая цена продажи за 24 часа </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getLastTradedPrice()</td>
    <td style="text-align: center">float</td>
    <td> Цена последней сделки </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getHighPrice()</td>
    <td style="text-align: center">float</td>
    <td> Максимальная цена за 24 часа </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getLowPrice()</td>
    <td style="text-align: center">float</td>
    <td> Наименьшая цена за 24 часа </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getOpenPrice()</td>
    <td style="text-align: center">float</td>
    <td> Цена открытия за 24 часа </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getBestBidPrice()</td>
    <td style="text-align: center">float</td>
    <td> Лучшая цена покупки за 24 часа </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getTradingVolume()</td>
    <td style="text-align: center">float</td>
    <td> Торговый обьем за 24 часа </td>
  </tr>
  <tr>
    <td>ITickersResponseInterface::getTradingQuoteVolume()</td>
    <td style="text-align: center">float</td>
    <td>Проторгованный обьем символа за 24 часа</td>
  </tr>
</table>


---
