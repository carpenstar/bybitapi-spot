### SPOT - Trade - Place Order
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/place-order)</b>

> Не используйте дублирующийся orderLinkId в обычном ордере и ордере TP/SL.

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\PlaceOrder::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Request\PlaceOrderRequest;

$params = (new PlaceOrderRequest())
    ->setSide(EnumSide::BUY)
    ->setOrderType(EnumOrderType::LIMIT)
    ->setOrderPrice(3000)
    ->setSymbol("ETHUSDT")
    ->setOrderQty(1);


$placeOrderResponse = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'apiKey', 'apiSecret')
    ->privateEndpoint(PlaceOrder::class, $params)
    ->execute();

echo "Return code: {$placeOrderResponse->getReturnCode()} \n";
echo "Return message: {$placeOrderResponse->getReturnMessage()} \n";
/** @var \Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response\PlaceOrderResponse $orderInfo */
$orderInfo = $placeOrderResponse->getResult();

echo "  Order ID: {$orderInfo->getOrderId()} \n";
echo "  Order Link ID: {$orderInfo->getOrderLinkId()} \n";
echo "  Symbol: {$orderInfo->getSymbol()} \n";
echo "  Create Time: {$orderInfo->getCreateTime()->format('Y-m-d H:i:s')} \n";
echo "  Order Price: {$orderInfo->getOrderPrice()} \n";
echo "  Order Qty: {$orderInfo->getOrderQty()} \n";
echo "  Order Type: {$orderInfo->getOrderType()} \n";
echo "  Side: {$orderInfo->getSide()} \n";
echo "  Status: {$orderInfo->getStatus()} \n";
echo "  Time in force {$orderInfo->getTimeInForce()} \n";
echo "  Account ID: {$orderInfo->getAccountId()} \n";
echo "  Trigger Price: {$orderInfo->getTriggerPrice()} \n";

/**
 * Return code: 0 
 * Return message: OK 
 *   Order ID: 1709705606813845248 
 *   Order Link ID: 1718548790720787 
 *   Symbol: ETHUSDT 
 *   Create Time: 2024-06-16 14:39:50 
 *   Order Price: 3000 
 *   Order Qty: 1 
 *   Order Type: LIMIT 
 *   Side: BUY 
 *   Status: NEW 
 *   Time in force GTC 
 *   Account ID: 1111837 
 *   Trigger Price:
 */
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces;

interface IPlaceOrderRequestInterface
{
    /**
     * Символьный код торговой пары
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): ?string;

    /**
     * Тип ордера
     * @param string $orderType
     * @return self
     */
    public function setOrderType(string $orderType): self;
    public function getOrderType(): ?string;

    /**
     * Направление ордера. BUY, SELL
     * @param string $side
     * @return self
     */
    public function setSide(string $side): self;
    public function getSide(): ?string;

    /**
     * Уникальный пользовательский идентификатор
     * @param string $orderLinkId
     * @return self
     */
    public function setOrderLinkId(string $orderLinkId): self;
    public function getOrderLinkId(): ?string;

    /**
     * Объем ордера. Когда вы размещаете ордер на РЫНОЧНУЮ ПОКУПКУ, этот параметр означает сумму котировки. например, MARKET BUY BTCUSDT, orderQty должен составлять 200 USDT.
     * @param float $orderQty
     * @return self
     */
    public function setOrderQty(float $orderQty): self;
    public function getOrderQty(): ?string;

    /**
     * Цена ордера. Если в поле типа указано MARKET, поле цены является необязательным. Если поле типа LIMIT или LIMIT_MAKER, поле цены является обязательным.
     * @param float $orderPrice
     * @return self
     */
    public function setOrderPrice(float $orderPrice): self;
    public function getOrderPrice(): ?float;

    /**
     * Время действия
     * @param string $timeInForce
     * @return self
     */
    public function setTimeInForce(string $timeInForce): self;
    public function getTimeInForce(): ?string;

    /**
     * Категория ордера. 
     * 0：обычный ордер, по умолчанию; 
     * 1：TP/SL ордер, Обязателен для TP/SL ордеров.
     * @param string $orderCategory
     * @return self
     */
    public function setOrderCategory(string $orderCategory): self;
    public function getOrderCategory(): ?string;

    /**
     * Триггерная цена. Используется для TP/SL ордеров
     * @param float $triggerPrice
     * @return self
     */
    public function setTriggerPrice(float $triggerPrice): self;
    public function getTriggerPrice(): ?float;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces\IPlaceOrderRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Request\PlaceOrderRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">МЕТОД</th>
    <th style="width: 5%; text-align: center">ОБЯЗАТЕЛЕН</th>
    <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setSymbol(string $symbol)</td>
    <td><b>ДА</b></td>
    <td><p>Символьный код торговой пары</p></td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderType(string $orderType)</td>
    <td><b>ДА</b></td>
    <td><p>Тип ордера</p></td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setSide(string $side)</td>
    <td><b>Да</b></td>
    <td>
        <p>Направление ордера. BUY, SELL</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderQty(float $orderQty)</td>
    <td><b>ДА</b></td>
    <td>
        <p>Объем ордера. Когда вы размещаете ордер на РЫНОЧНУЮ ПОКУПКУ, этот параметр означает сумму котировки. например, MARKET BUY BTCUSDT, orderQty должен составлять 200 USDT.</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderLinkId(string $orderLinkId)</td>
    <td>НЕТ</td>
    <td>
        <p>Уникальный пользовательский идентификатор</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderPrice(float $orderPrice)</td>
    <td>НЕТ</td>
    <td>
        <p>Цена ордера. Если в поле типа указано MARKET, поле цены является необязательным. Если поле типа LIMIT или LIMIT_MAKER, поле цены является обязательным.</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setTimeInForce(string $timeInForce)</td>
    <td>НЕТ</td>
    <td>
        <p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Время действия</a></p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderCategory(string $orderCategory)</td>
    <td>НЕТ</td>
    <td>
        <p>Категория ордера</p>
        <ul>
            <li>0：обычный ордер, по умолчанию;</li>
            <li>1：TP/SL ордер, Обязателен для TP/SL ордеров.</li>
        </ul>
        <p><b>Список смотри в Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory</b></p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setTriggerPrice(float $triggerPrice)</td>
    <td>НЕТ</td>
    <td>
        <p>Триггерная цена. Используется для TP/SL ордеров</p>
    </td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>Структура ответа</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces;

interface IPlaceOrderResponseInterface
{
    /**
     * Системный идентификатор ордера
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * Уникальный пользовательский идентификатор ордера
     * @return string|null
     */
    public function getOrderLinkId(): ?string;

    /**
     * Символьный код торговой пары
     * @return string|null
     */
    public function getSymbol(): ?string;

    /** Время создания ордера
     * Order Creation Time
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Последная исполненная цена
     * @return float|null
     */
    public function getOrderPrice(): ?float;

    /**
     * Объем ордера
     * @return float|null
     */
    public function getOrderQty(): ?float;

    /**
     * Тип ордера
     * @return string|null
     */
    public function getOrderType(): ?string;

    /**
     * Напрвление ордера. BUY, SELL
     * @return string|null
     */
    public function getSide(): ?string;

    /**
     * Статус ордера
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * Время действия
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string|null
     */
    public function getTimeInForce(): ?string;

    /**
     * Идентификатор аккаунта
     * @return string|null
     */
    public function getAccountId(): ?string;

    /**
     * Категория ордера. 0：обычный ордер, по умолчанию; 1：TP/SL ордер
     * @return int|null
     */
    public function getOrderCategory(): ?int;

    /**
     * Триггерная цена. TP/SL всегда имеет заполненное значение этого свойства
     * @return float|null
     */
    public function getTriggerPrice(): ?float;
}
```

<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces\IPlaceOrderResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response\PlaceOrderResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderId()</td>
     <td style="text-align: center">int</td>
     <td><p>Системный идентификатор ордера</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderLinkId()</td>
     <td style="text-align: center">string</td>
     <td><p>Униакльный пользовательский идентификатор ордера</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Символьный код торговой пары</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Время создания ордера</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Последняя цена исполнения ордера</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Объем ордера</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderType()</td>
     <td style="text-align: center">string</td>
     <td><p>Тип Ордера</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getSide()</td>
     <td style="text-align: center">string</td>
     <td><p>Направление ордера. BUY, SELL</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Текущий статус ордера</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getTimeInForce()</td>
     <td style="text-align: center">string</td>
     <td><p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Время действия</a></p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getAccountId()</td>
     <td style="text-align: center">string</td>
     <td><p>Идентификатор аккаунта</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderCategory()</td>
     <td style="text-align: center">int</td>
     <td><p>Категория ордера. 0：обычный ордер, по умолчанию; 1：TP/SL ордер</p></td>
   </tr>
   <tr>
     <td>IPlaceOrderResponseInterface::getTriggerPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Триггерная цена. TP/SL ордер всегда имеет это свойство заполненным</p></td>
   </tr>
</table>