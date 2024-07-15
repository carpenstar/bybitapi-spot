# Market Data - Last Traded Price
<b>[Официальная страница документации](https://bybit-exchange.github.io/docs/spot/public/last-price)</b>

> Если символ не указан, будет возвращена цена всех символов.

```php
// Класс эндпоинта:
\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\LastTradedPrice::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Request\LastTradedPriceRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Response\LastTradedPriceResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\LastTradedPrice;

$lastTradePriceResponse = (new BybitAPI())
    ->setCredentials('https://api-testnet.bybit.com', 'apiKey', 'apiSecret')
    ->publicEndpoint(LastTradedPrice::class, (new LastTradedPriceRequest())->setSymbol("ATOMUSDT"))
    ->execute();

echo "Return Code: {$lastTradePriceResponse->getReturnCode()} \n";
echo "Return Code: {$lastTradePriceResponse->getReturnMessage()} \n";
echo " ---  \n";
echo "  Symbol: {$lastTradePriceResponse->getResult()->getSymbol()} \n";
echo "  Price: {$lastTradePriceResponse->getResult()->getPrice()} \n";


/**
 *
 * Return Code: 0 
 * Return Code: OK 
 * ---  
 *  Symbol: ATOMUSDT 
 *  Price: 110
 */
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

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

<br />

<h3 align="left" width="100%"><b>CТРУКТУРА ОТВЕТА</b></h3>

---

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