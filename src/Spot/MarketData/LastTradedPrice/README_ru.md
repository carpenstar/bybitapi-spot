# Market Data - Last Traded Price
<b>[Официальная страница документации](https://bybit-exchange.github.io/docs/spot/public/last-price)</b>

> Если символ не указан, будет возвращена цена всех символов.

```php
// Класс эндпоинта:
\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\LastTradedPrice::class
```

<p align="center" width="100%"><b>ПРИМЕР</b></p>

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Request\LastTradedPriceRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Response\LastTradedPriceResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\LastTradedPrice;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new LastTradedPriceRequest())
    ->setSymbol("ATOMUSDT");

/** @var LastTradedPriceResponse $lastTradePrice */
$lastTradePrice = $bybit->rest(LastTradedPrice::class, $options)->getBody()->fetch();



echo "Symbol: {$lastTradePrice->getSymbol()}" . PHP_EOL;
echo "Price: {$lastTradePrice->getPrice()}" . PHP_EOL;

/**
 * Result:
 *
 * Symbol: ATOMUSDT
 * Price: 702.85
 */
```

---

<p align="center" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces;

interface ILastTradedPriceRequestInterface
{
    public function setSymbol(string $symbol): self;
    
    // .. Getters
}
```
 <table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces\ILastTradedPriceRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Request\LastTradedPriceRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 40%; text-align: center">Метод</th>
    <th style="width: 10%; text-align: center">Обязательно</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>ILastTradedPriceRequestInterface::setSymbol(string $symbol): self</td>
    <td style="text-align: center">НЕТ</td>
    <td>Торговый инструмент</td>
  </tr>
</table>

---

<p align="center" width="100%"><b>CТРУКТУРА ОТВЕТА</b></p>

```php
\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces\ILastTradedPriceResponseInterface::class

interface ILastTradedPriceResponseInterface
{
    public function getSymbol(): string; // Торговый инструмент
    public function getPrice(): float; // Цена последней сделки
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
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Response\LastTradedPriceResponse::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 30%; text-align: center">Метод</th>
    <th style="width: 20%; text-align: center">Тип</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>ILastTradedPriceResponseInterface::getSymbol()</td>
    <td style="text-align: center">string</td>
    <td> Торговый инструмент </td>
  </tr>
  <tr>
    <td>ILastTradedPriceResponseInterface::getPrice()</td>
    <td style="text-align: center">float</td>
    <td> Цена последней сделки </td>
  </tr>
</table>

---