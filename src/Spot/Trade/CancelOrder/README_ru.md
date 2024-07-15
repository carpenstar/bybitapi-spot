### SPOT - Trade - Cancel Order
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/cancel)</b>

<p>Закрывает неисполненный ордер по системному или пользовательскому идентификатору</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\CancelOrder::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\CancelOrder;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Request\CancelOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Response\CancelOrderResponse;


$bybit = (new BybitAPI())
    ->setHost('https://api-testnet.bybit.com')
    ->setApiKey('apiKey')
    ->setSecret('apiSecret');

$cancelOrderResponse = $bybit->privateEndpoint(CancelOrder::class, (new CancelOrderRequest())->setOrderId(1709211390077699840));

echo "Return code: {$cancelOrderResponse->getReturnCode()} \n";
echo "Return message: {$cancelOrderResponse->getReturnMessage()} \n";

/** @var CancelOrderResponse $cancelOrderInfo */
$cancelOrderInfo = $cancelOrderResponse->getResult();
echo "  Order ID: {$cancelOrderInfo->getOrderId()} \n";
echo "  Order Link ID: {$cancelOrderInfo->getOrderLinkId()} \n";
echo "  Symbol: {$cancelOrderInfo->getSymbol()} \n";
echo "  Order status: {$cancelOrderInfo->getStatus()} \n";
echo "  Account ID: {$cancelOrderInfo->getAccountId()} \n";
echo "  Order Price: {$cancelOrderInfo->getOrderPrice()} \n";
echo "  Create Time: {$cancelOrderInfo->getCreateTime()->format('Y-m-d H:i:s')} \n";
echo "  Order Quantity: {$cancelOrderInfo->getOrderQty()} \n";
echo "  Executed quantity: {$cancelOrderInfo->getExecQty()} \n";
echo "  Time in force: {$cancelOrderInfo->getTimeInForce()} \n";
echo "  Order type: {$cancelOrderInfo->getOrderType()} \n";
echo "  Side: {$cancelOrderInfo->getSide()} \n";

/**
 * Output:
 * 
 * Return code: 0 
 * Return message: OK 
 *  Order ID: 1709211390077699840 
 *  Order Link ID: 17184898754951017 
 *  Symbol: ETHUSDT 
 *  Order status: FILLED 
 *  Account ID: 1111837 
 *  Order Price: 3570 
 *  Create Time: 2024-06-15 22:17:55 
 *  Order Quantity: 1 
 *  Executed quantity: 1 
 *  Time in force: GTC 
 *  Order type: LIMIT 
 *  Side: BUY
 */
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces;

interface ICancelOrderRequestInterface
{
    /**
     * Идентификатор заказа. Требуется, если не передается orderLinkId
     */
     public function setOrderId(?int $orderId): self;
     public function getOrderId(): ?int;
    
    /**
     * Уникальный пользовательский идентификатор. Требуется, если не передается orderLinkId
     */
     public function setOrderLinkId(?string $orderLinkId): self;
     public function getOrderLinkId(): ?string;
    
    /**
     * Категория ордера.
     * 0：обычный ордер, по умолчанию;
     * 1：TP/SL ордер, Обязательно для TP/SL ордеров.
     */
     public function setOrderCategory(?int $orderCategory): self;
     public function getOrderCategory(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces\CancelOrder::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Request\CancelOrderRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">Метод</th>
    <th style="width: 5%; text-align: center">Обязательно</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderId(string $orderId)</td>
    <td>НЕТ</td>
    <td><p>Идентификатор заказа. Требуется, если не передается orderLinkId</p></td>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderLinkId(string $orderLinkId)</td>
    <td><b>НЕТ</b></td>
    <td><p>Уникальный пользовательский идентификатор. Требуется, если не передается orderLinkId</p></td>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderCategory(?int $orderCategory)</td>
    <td>НЕТ</td>
    <td>
        <p>Категория ордера:</p>
        <ul>
            <li>0：обычный ордер, по умолчанию; </li>
            <li>1：TP/SL ордера, Обязательно для удаления TP/SL ордеров.</li>
        </ul>
        <p><b>Список смотри в Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory</b></p>
    </td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>СТРУКТУРА ОТВЕТА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces;

interface ICancelOrderResponseInterface
{
    /**
     * Идентификатор заказа
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * Пользовательский идентификатор
     * @return string
     */
    public function getOrderLinkId(): string;

    /**
     * Символьный код торгового инструмента
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Статус ордера
     * @return string
     */
    public function getStatus(): string;

    /**
     * Идентификатор аккаунта
     * @return int
     */
    public function getAccountId(): ?int;

    /**
     * Цена ордера
     * @return float|null
     */
    public function getOrderPrice(): ?float;

    /**
     * Время создания ордера
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Обьем ордера
     * @return float|null
     */
    public function getOrderQty(): ?float;

    /**
     * Исполненный обьем ордера
     * @return float|null
     */
    public function getExecQty(): ?float;

    /**
     * Время действия
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string|null
     */
    public function getTimeInForce(): ?string;

    /**
     * Тип ордера
     * @return string|null
     */
    public function getOrderType(): ?string;

    /**
     * Направление. BUY, SELL
     * @return string|null
     */
    public function getSide(): ?string;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces\ICancelOrderResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Response\ICancelOrderResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderId()</td>
     <td style="text-align: center">null | int</td>
     <td><p>Идентифкатор ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderLinkId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Пользовательский идентификатор ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Символьный код торгового инструмента</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Статус ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getAccountId()</td>
     <td style="text-align: center">string</td>
     <td><p>Идентификатор аккаунта</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderPrice()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Цена ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Время создания ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderQty()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Объем ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getExecQty()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Исполненный объем ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getTimeInForce()</td>
     <td style="text-align: center">null | string</td>
     <td>
        <p>Время действия</p>
        <p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044</a></p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderType()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Тип ордера</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getSide()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Направление. BUY, SELL</p></td>
   </tr>
</table>