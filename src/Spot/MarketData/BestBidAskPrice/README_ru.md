# Market Data - Best Bid Ask Price
<b>[Официальная страница документации](https://bybit-exchange.github.io/docs/spot/public/bid-ask)</b>

> Если торговый инструмент не указан, то будет возвращена лучшая цена ордера из всех символов.

```php
// Класс эндпоинта:
\Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\BestBidAskPrice::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\BestBidAskPrice;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Request\BestBidAskPriceRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Response\BestBidAskPriceResponse;

$bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com',"apiKey", "secret");

$bestBidAskPriceResponse = $bybit->publicEndpoint(BestBidAskPrice::class, (new BestBidAskPriceRequest())->setSymbol("BTCUSDT"))
    ->execute()
    ->getResult();

/** @var BestBidAskPriceResponse $bestBidAskPrice */
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

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

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
    <th style="width: 40%; text-align: center">Метод</th>
    <th style="width: 10%; text-align: center">Обязательно</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>:: setSymbol(string $symbol): self</td>
    <td style="text-align: center"><b>ДА</b></td>
    <td>Строка с тикером торговой пары</td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>СТРУКТУРА ОТВЕТА</b></h3>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces;

interface IBestBidAskPriceResponseInterface
{
    public function getSymbol(): string; // Торговый инструмент
    public function getAskPrice(): float; // Лучшая цена продажи 
    public function getAskQty(): float; // Количество по лучшей цене продажи
    public function getBidPrice(): float; // Лучшая цена покупки
    public function getBidQty(): float; // Количество по лучшей цене покупки
    public function getTime(): \DateTime; // Время ответа на запрос
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
    <th style="width: 30%; text-align: center">Метод</th>
    <th style="width: 20%; text-align: center">Тип</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>IBestBidAskPriceResponseInterface::getSymbol()</td>
    <td style="text-align: center">string</td>
    <td> Торговый инструмент </td>
  </tr>
  <tr>
    <td>IBestBidAskPriceResponseInterface::getAskPrice()</td>
    <td style="text-align: center">float</td>
    <td> Лучшая цена продажи </td>
  </tr>
  <tr>
    <td>IBestBidAskPriceResponseInterface::getAskQty()</td>
    <td style="text-align: center">float</td>
    <td> Количество по лучшей цене продажи </td>
  </tr>
  <tr>
    <td>IBestBidAskPriceResponseInterface::getBidPrice()</td>
    <td style="text-align: center">float</td>
    <td> Лучшая цена покупки </td>
  </tr>
  <tr>
    <td>IBestBidAskPriceResponseInterface::getBidQty()</td>
    <td style="text-align: center">float</td>
    <td> Количество по лучшей цене покупки </td>
  </tr>
  <tr>
    <td>IBestBidAskPriceResponseInterface::getTime()</td>
    <td style="text-align: center">DateTime</td>
    <td> Время ответа на запрос </td>
  </tr>
</table>

---