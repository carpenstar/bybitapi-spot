### Market Data - Instrument Info
<b>[Официальная страница документации](https://bybit-exchange.github.io/docs/spot/public/instrument)</b>

<p>Эндпоинт возвращает спецификации по всем символам</p>

```php
// Класс эндпоинта:
\Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\InstrumentInfo::class
```

<p align="center" width="100%"><b>ПРИМЕР</b></p>

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\InstrumentInfo;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoResponse;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

/** @var InstrumentInfoResponse[] $instrumentInfoData */
$instrumentInfo = $bybit->rest(InstrumentInfo::class)->getBody()->all();
$instrumentInfo = array_slice($instrumentInfo, 0, 2);



/** @var InstrumentInfoResponse $instrumentItem */
foreach ($instrumentInfo as $instrumentItem) {
    echo "Name: {$instrumentItem->getName()}" . PHP_EOL;
    echo "Alias: {$instrumentItem->getAlias()}" . PHP_EOL;
    echo "Base Coin: {$instrumentItem->getBaseCoin()}" . PHP_EOL;
    echo "Quote Coin: {$instrumentItem->getQuoteCoin()}" . PHP_EOL;
    echo "Base Precision: {$instrumentItem->getBasePrecision()}" . PHP_EOL;
    echo "Quote Precision: {$instrumentItem->getQuotePrecision()}" . PHP_EOL;
    echo "Min Trade Quantity: {$instrumentItem->getMinTradeQty()}" . PHP_EOL;
    echo "Min Trade Amount: {$instrumentItem->getMaxTradeAmt()}" . PHP_EOL;
    echo "Min Price Precision: {$instrumentItem->getMinPricePrecision()}" . PHP_EOL;
    echo "Max Trade Quantity: {$instrumentItem->getMaxTradeQty()}" . PHP_EOL;
    echo "Max Trade Amt: {$instrumentItem->getMaxTradeAmt()}" . PHP_EOL;
    echo "Innovation: {$instrumentItem->getInnovation()}" . PHP_EOL;
    echo "Show Status: {$instrumentItem->getShowStatus()}" . PHP_EOL;
    echo "-----" . PHP_EOL;
}

/**
 * Result:
 * 
 * Name: BTCUSDT
 * Alias: BTCUSDT
 * Base Coin: BTC
 * Quote Coin: USDT
 * Base Precision: 1.0E-6
 * Quote Precision: 1.0E-8
 * Min Trade Quantity: 4.0E-5
 * Min Trade Amount: 1200000
 * Min Price Precision: 0.01
 * Max Trade Quantity: 500
 * Max Trade Amt: 1200000
 * Innovation: 0
 * Show Status: 1
 * -----
 * Name: ETHUSDT
 * Alias: ETHUSDT
 * Base Coin: ETH
 * Quote Coin: USDT
 * Base Precision: 1.0E-5
 * Quote Precision: 1.0E-7
 * Min Trade Quantity: 0.0005
 * Min Trade Amount: 1200000
 * Min Price Precision: 0.01
 * Max Trade Quantity: 100000000
 * Max Trade Amt: 1200000
 * Innovation: 0
 * Show Status: 1
 * -----
 * Name: EOSUSDT
 * Alias: EOSUSDT
 * Base Coin: EOS
 * Quote Coin: USDT
 * Base Precision: 0.01
 * Quote Precision: 1.0E-6
 * Min Trade Quantity: 0.01
 * Min Trade Amount: 10000
 * Min Price Precision: 0.0001
 * Max Trade Quantity: 90909.090909
 * Max Trade Amt: 10000
 * Innovation: 0
 * Show Status: 1
 * -----
 */
```

<p align="center" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></p>

---

> Эндпоинт не принимает никаких дополнительных параметров в запросе

---

<p align="center" width="100%"><b>СТРУКТУРА ОТВЕТА</b></p>

```php
\Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces\IInstrumentInfoResponse::class;

interface IInstrumentInfoResponse
{
    public function getName(): string; // Торговый инструмент
    public function getAlias(): string; // Синоним
    public function getBaseCoin(): string; // Базовый токен
    public function getQuoteCoin(): string; // Валюта котировки
    public function getBasePrecision(): float; // Десятичная точность (базовая валюта)
    public function getQuotePrecision(): float; // Десятичная точность (котируемая валюта)
    public function getMinTradeQty(): float; // Мин. обьем ордера (недействительно для MARKET ордеров на покупку)
    public function getMinTradeAmt(): float; // Мин. стоимость ордера (действительно только для рыночных ордеров на покупку)
    public function getMaxTradeQty(): float; // Макс. количество заказа (игнорируется при размещении заказа с типом заказа LIMIT_MAKER)
    public function getMaxTradeAmt(): int; // Макс. обьем ордера (игнорируется при размещении ордера типа LIMIT_MAKER)
    public function getMinPricePrecision(): float; // Мин. количество десятичных знаков
    public function getShowStatus(): int; // Указывает на то, что символ открыт для торговли
    public function getInnovation(): int; // Указывает на то, что цена этой валюты относительно волатильна
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces\IInstrumentInfoResponse\IInstrumentInfoResponse::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoResponse::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 30%; text-align: center">Метод</th>
    <th style="width: 20%; text-align: center">Тип</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getName()</td>
    <td style="text-align: center">string</td>
    <td> Торговый инструмент </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getAlias()</td>
    <td style="text-align: center">string</td>
    <td> Синоним </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getBaseCoin()</td>
    <td style="text-align: center">string</td>
    <td> Базовый токен </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getQuoteCoin()</td>
    <td style="text-align: center">string</td>
    <td> Валюта котировки </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getBasePrecision()</td>
    <td style="text-align: center">float</td>
    <td> Десятичная точность (базовая валюта) </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getQuotePrecision()</td>
    <td style="text-align: center">float</td>
    <td> Десятичная точность (котируемая валюта) </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getMinTradeQty()</td>
    <td style="text-align: center">float</td>
    <td> Мин. обьем ордера (недействительно для MARKET ордеров на покупку) </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getMinTradeAmt()</td>
    <td style="text-align: center">float</td>
    <td> Мин. стоимость ордера (действительно только для рыночных ордеров на покупку) </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getMaxTradeQty()</td>
    <td style="text-align: center">float</td>
    <td> Макс. количество заказа (игнорируется при размещении заказа с типом заказа LIMIT_MAKER) </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getMaxTradeAmt()</td>
    <td style="text-align: center">int</td>
    <td> Макс. обьем ордера (игнорируется при размещении ордера типа LIMIT_MAKER) </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getMinPricePrecision()</td>
    <td style="text-align: center">float</td>
    <td> Мин. количество десятичных знаков </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getShowStatus()</td>
    <td style="text-align: center">int</td>
    <td> Указывает на то, что символ открыт для торговли </td>
  </tr>
  <tr>
    <td>IInstrumentInfoResponse::getInnovation()</td>
    <td style="text-align: center">int</td>
    <td> Указывает на то, что цена этой валюты относительно волатильна </td>
  </tr>
</table>

---