### Market Data - Instrument Info
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/instrument)</b>

<p>Endpoint returns specifications for all symbols</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\InstrumentInfo::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\InstrumentInfo;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoResponseItem;

$bybit = (new BybitAPI())
->setCredentials('https://api-testnet.bybit.com','apiKey', 'secret');

/** @var InstrumentInfoResponseItem[] $instrumentInfoData */
$instrumentInfo = $bybit->publicEndpoint(InstrumentInfo::class)->execute()->getResult();
$instrumentInfo = array_slice($instrumentInfo, 0, 2);



/** @var InstrumentInfoResponseItem $instrumentItem */
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

<br />

<h3 align="left" width="100%"><b>QUERY PARAMETERS</b></h3>

---

> Endpoint does not accept any additional parameters in the request

<br />

<h3 align="left" width="100%"><b>RESPONSE STRUCTURE</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces;

interface IInstrumentInfoResponseItemInterface
{
    /**
     * Name of the trading pair
     * @return string
     */
    public function getName(): string;

    /**
     * Alias
     * @return string
     */
    public function getAlias(): string;

    /**
     * Base currency
     * @return string
     */
    public function getBaseCoin(): string;

    /**
     * Quote currency
     * @return string
     */
    public function getQuoteCoin(): string;

    /**
     * Decimal precision (base currency)
     * @return float
     */
    public function getBasePrecision(): float;

    /**
     * Decimal precision (quote currency)
     * @return float
     */
    public function getQuotePrecision(): float;

    /**
     * Min. order qty (Not valid for market buy orders)
     * @return float
     */
    public function getMinTradeQty(): float;

    /**
     * Min. order value (Only valid for market buy orders)
     * @return float
     */
    public function getMinTradeAmt(): float;

    /**
     * Max. order qty (It is ignored when you place an order with order type LIMIT_MAKER)
     * @return float
     */
    public function getMaxTradeQty(): float;

    /**
     * Max. order value (It is ignored when you place an order with order type LIMIT_MAKER)
     * @return int
     */
    public function getMaxTradeAmt(): int;

    /**
     * Min. number of decimal places
     * @return float
     */
    public function getMinPricePrecision(): float;

    /**
     * Category
     * @return int
     */
    public function getCategory(): int;

    /**
     * 1 indicates that the price of this currency is relatively volatile
     * @return int
     */
    public function getShowStatus(): int;

    /**
     * 1 indicates that the symbol open for trading
     * @return int
     */
    public function getInnovation(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces\IInstrumentInfoResponse\IInstrumentInfoResponseItemInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoItemResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getName()</td>
     <td style="text-align: center">string</td>
     <td> Trading instrument </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getAlias()</td>
     <td style="text-align: center">string</td>
     <td> Synonym </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getBaseCoin()</td>
     <td style="text-align: center">string</td>
     <td> Base token </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getQuoteCoin()</td>
     <td style="text-align: center">string</td>
     <td> Quote currency </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getBasePrecision()</td>
     <td style="text-align: center">float</td>
     <td> Decimal precision (base currency) </td>
   </tr>
  <tr>
     <td>IInstrumentInfoResponseItemInterface::getQuotePrecision()</td>
     <td style="text-align: center">float</td>
     <td> Decimal precision (quote currency) </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getMinTradeQty()</td>
     <td style="text-align: center">float</td>
     <td> Min. order volume (not valid for MARKET buy orders) </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getMinTradeAmt()</td>
     <td style="text-align: center">float</td>
     <td> Min. order value (valid only for market buy orders) </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getMaxTradeQty()</td>
     <td style="text-align: center">float</td>
     <td> Max. order quantity (ignored when placing an order with order type LIMIT_MAKER) </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getMaxTradeAmt()</td>
     <td style="text-align: center">int</td>
     <td> Max. order volume (ignored when placing an order of the LIMIT_MAKER type) </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getMinPricePrecision()</td>
     <td style="text-align: center">float</td>
     <td> Min. number of decimal places </td>
   </tr>
<tr>
     <td>IInstrumentInfoResponseItemInterface::getShowStatus()</td>
     <td style="text-align: center">int</td>
     <td> Indicates that the symbol is open for trading </td>
   </tr>
   <tr>
     <td>IInstrumentInfoResponseItemInterface::getInnovation()</td>
     <td style="text-align: center">int</td>
     <td> Indicates that the price of this currency is relatively volatile </td>
   </tr>
</table>

---