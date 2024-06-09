### SPOT - Trade - Get Order
<b>[Официальная документаци](https://bybit-exchange.github.io/docs/spot/trade/get-order)</b>

<p>Возвращает информацию по системному или пользовательскому идентификатору</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\GetOrder::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\GetOrder;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Request\GetOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Response\GetOrderResponse;


$bybit = (new BybitAPI())
    ->setHost('https://api-testnet.bybit.com')
    ->setApiKey('apiKey')
    ->setSecret('apiSecret');

$getOrderResponse = $bybit->privateEndpoint(GetOrder::class, (new GetOrderRequest())->setOrderId(1709244334557234944));

echo "Return code: {$getOrderResponse->getReturnCode()} \n";
echo "Return message: {$getOrderResponse->getReturnMessage()} \n";

/** @var GetOrderResponse $getOrderInfo */
$getOrderInfo = $getOrderResponse->getResult();

echo "  Order ID: {$getOrderInfo->getOrderId()} \n";
echo "  Order Link ID: {$getOrderInfo->getOrderLinkId()} \n";
echo "  Symbol: {$getOrderInfo->getSymbol()} \n";
echo "  Order status: {$getOrderInfo->getStatus()} \n";
echo "  Account ID: {$getOrderInfo->getAccountId()} \n";
echo "  Order Price: {$getOrderInfo->getOrderPrice()} \n";
echo "  Create Time: {$getOrderInfo->getCreateTime()->format('Y-m-d H:i:s')} \n";
echo "  Update Time: {$getOrderInfo->getUpdateTime()->format('Y-m-d H:i:s')} \n";
echo "  Order quantity: {$getOrderInfo->getOrderQty()} \n";
echo "  Executed quantity: {$getOrderInfo->getExecQty()} \n";
echo "  Time in force: {$getOrderInfo->getTimeInForce()} \n";
echo "  Order type: {$getOrderInfo->getOrderType()} \n";
echo "  Side: {$getOrderInfo->getSide()} \n";

/**
 * Output:
 * 
 * Return code: 0 
 * Return message: OK 
 *   Order ID: 1709244334557234944 
 *   Order Link ID: 17184938027821188 
 *   Symbol: ETHUSDT 
 *   Order status: NEW 
 *   Account ID: 1111837 
 *   Order Price: 3000 
 *   Create Time: 2024-06-15 23:23:22 
 *   Update Time: 2024-06-15 23:23:22 
 *   Order quantity: 1 
 *   Executed quantity: 0 
 *   Time in force: GTC 
 *   Order type: LIMIT 
 *   Side: BUY
 */
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces;

interface IGetOrderRequestInterface
{
    /**
     * Идентификатор заказа. Требуется, если не передается orderLinkId
     */
    public function setOrderId(?string $orderId): self;
    public function getOrderId(): ?string;

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
    public function setOrderCategory(string $orderCategory): self;
    public function getOrderCategory(): string;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces\IGetOrderRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Request\GetOrderRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">МЕТОД</th>
    <th style="width: 5%; text-align: center">ОБЯЗАТЕЛЬНО</th>
    <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderId(string $orderId)</td>
    <td>НЕТ</td>
    <td><p>Идентификатор заказа. Требуется, если не передается orderLinkId</p></td>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderLinkId(string $orderLinkId)</td>
    <td>НЕТ</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces;

interface IGetOrderResponseInterface
{
    /**
     * Уникальный пользовательский идентификатор
     * @return string
     */
    public function getOrderLinkId(): string;

    /**
     * Системный идентификатор ордера
     * @return int
     */
    public function getOrderId(): int;

    /**
     * Цена ордера
     * @return float
     */
    public function getOrderPrice(): float;

    /**
     * Символьный код торговой пары
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Идентификатор аккаунта
     * @return int
     */
    public function getAccountId(): int;

    /**
     * Средняя цена заполнения ордера (средняя цена, если в рамках этого ордера было исполнено несколько обратных ордеров)
     * @return float
     */
    public function getAvgPrice(): float;

    /**
     * Время создания ордера
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Общий объем ордера. Для некоторых исторических данных оно может быть меньше 0.
     * @return float
     */
    public function getCummulativeQuoteQty(): float;

    /**
     * Исполненный объем ордера
     * @return float
     */
    public function getExecQty(): float;

    /**
     * Торгуется символ? 0：да, 1：нет
     * @return int
     */
    public function getIsWorking(): int;

    /**
     * Зарезервировано для ордера (если 0, это означает, что средства, соответствующие заказу, оплачены)
     * @return float
     */
    public function getLocked(): float;

    /**
     * Объем ордера
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Тип ордера
     * @return string
     */
    public function getOrderType(): string;

    /**
     * Направление ордера
     * @return string
     */
    public function getSide(): string;

    /**
     * Статус ордера
     * @return string
     */
    public function getStatus(): string;

    /**
     * Цена остановки
     * @return float
     */
    public function getStopPrice(): float;

    /**
     * Время действия ордера
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string
     */
    public function getTimeInForce(): string;

    /**
     * Время последнего обновления ордера
     * @return \DateTime
     */
    public function getUpdateTime(): \DateTime;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces\IGetOrderResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Response\GetOrderResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getOrderLinkId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Уникальный пользовательский идентификатор</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getOrderId()</td>
     <td style="text-align: center">string</td>
     <td><p>Системный идентификатор ордера</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Цена ордера</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Символьный код торговой пары</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getAccountId()</td>
     <td style="text-align: center">int</td>
     <td><p>Идентификатор аккаунта</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getAvgPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Средняя цена заполнения ордера (средняя цена, если в рамках этого ордера было исполнено несколько обратных ордеров)</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Время создания заказа</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getCummulativeQuoteQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Общий объем ордера. Для некоторых исторических данных оно может быть меньше 0</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getExecQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Исполненный объем ордера</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getIsWorking()</td>
     <td style="text-align: center">int</td>
     <td>
        <p>Торгуется символ?</p>
        <ul>
            <li>0：да</li>
            <li>1：нет</li>
        </ul>
     </td>
    </tr>
    <tr>
     <td>IGetOrderResponseInterface::getLocked()</td>
     <td style="text-align: center">float</td>
     <td><p>Зарезервировано для ордера (если 0, это означает, что средства, соответствующие заказу, оплачены)</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Объем ордера</p></td>
    </tr>
    <tr>
     <td>IGetOrderResponseInterface::getOrderType()</td>
     <td style="text-align: center">string</td>
     <td><p>Тип ордера</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getSide()</td>
     <td style="text-align: center">string</td>
     <td><p>Направление ордера</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Статус ордера</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getStopPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Цена остановки</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getTimeInForce()</td>
     <td style="text-align: center">float</td>
     <td><p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Время действия</a></p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getUpdateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Последнее время обновления ордера</p></td>
   </tr>
</table>