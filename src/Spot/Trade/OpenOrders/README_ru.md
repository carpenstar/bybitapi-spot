### SPOT - Trade - Open Orders
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/open-order)</b>

<p>Возвращает список открытых ордеров</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\OpenOrders::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\OpenOrders;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Request\OpenOrdersRequest;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response\OpenOrdersResponse;

$bybit = (new BybitAPI())
    ->setHost('https://api-testnet.bybit.com')
    ->setApiKey('apiKey')
    ->setSecret('apiSecret');

    /**
    * @var \Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersResponseInterface 
    */
    $openOrdersResponse = $bybit->privateEndpoint(OpenOrders::class, (new OpenOrdersRequest())->setSymbol('ETHUSDT'));

    echo "Return code: {$openOrdersResponse->getReturnCode()} \n";
    echo "Return message: {$openOrdersResponse->getReturnMessage()} \n";

    /** @var \Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersResponseItemInterface $orderInfoList */
    $orderInfoList = $openOrdersResponse->getResult()->getOpenOrders();

    foreach ($orderInfoList as $order) {
        echo "  Order ID: {$order->getOrderId()} \n";
        echo "  Order Link ID: {$order->getOrderLinkId()} \n";
        echo "  Symbol: {$order->getSymbol()} \n";
        echo "  Order status: {$order->getStatus()} \n";
        echo "  Account ID: {$order->getAccountId()} \n";
        echo "  Order Price: {$order->getOrderPrice()} \n";
        echo "  Create time: {$order->getCreateTime()->format('Y-m-d H:i:s')} \n";
        echo "  Update time {$order->getUpdateTime()->format('Y-m-d H:i:s')} \n";
        echo "  Order quantity: {$order->getOrderQty()} \n";
        echo "  Execute quantity: {$order->getExecQty()} \n";
        echo "  Time in force: {$order->getTimeInForce()} \n";
        echo "  Order type: {$order->getOrderType()} \n";
        echo "  Order side: {$order->getSide()} \n";
    }

/**
 * Output:
 * 
 * Return code: 0 
 * Return message: OK 
 *   Order ID: 1709290359846209280 
 *   Order Link ID: 17184992894241130 
 *   Symbol: ETHUSDT 
 *   Order status: NEW 
 *   Account ID: 1111837 
 *   Order Price: 3000 
 *   Create time: 2024-06-16 00:54:49 
 *   Update time 2024-06-16 00:54:49 
 *   Order quantity: 1 
 *   Execute quantity: 0 
 *   Time in force: GTC 
 *   Order type: LIMIT 
 *   Order side: BUY 
 */
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces;

interface IOpenOrdersRequestInterface
{
    /**
     * Символьный код торговой пары
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Укажите orderId, чтобы вернуть все заказы, у которых идентификатор orderId меньше, чем переданный, это нужно для реализации пагинации.
     * @param int $orderId
     * @return self
     */
    public function setOrderId(int $orderId): self;
    public function getOrderId(): int;

    /**
     * Ограничение на количество возвращаемых записей. [1, 500]. По умолчанию: 500
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * Категория ордера.
     * 0：обычный ордер, по умолчанию;
     * 1：TP/SL ордер, Обязательно для TP/SL ордеров.
     * @param int $orderCategory
     * @return self
     */
    public function setOrderCategory(int $orderCategory): self;
    public function getOrderCategory(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Request\OpenOrdersRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">МЕТОД</th>
    <th style="width: 5%; text-align: center">ОБЯЗАТЕЛЬНО</th>
    <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setSymbol(string $symbol)</td>
    <td>НЕТ</td>
    <td><p>Символьный код торговой пары</p></td>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setOrderId(string $orderId)</td>
    <td>НЕТ</td>
    <td><p>Укажите orderId, чтобы вернуть все заказы, у которых идентификатор orderId меньше, чем переданный, это нужно для реализации пагинации.</p></td>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setLimit(int $limit)</td>
    <td>НЕТ</td>
    <td>
        <p>Ограничение на количество возвращаемых записей. [1, 500]. По умолчанию: 500</p>
    </td>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setOrderCategory(int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces;

interface IOpenOrdersResponseInterface
{
    /**
     * Возвращает массив объектов открытых ордеров
     * @return OpenOrdersResponseItem[]
     */
    public function getOpenOrders(): array;
}
```

<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response\OpenOrdersOrderResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
    <tr>
     <td>IOpenOrdersResponseInterface::getOpenOrders()</td>
     <td style="text-align: center">OpenOrdersResponseItem[]</td>
     <td><p>Возвращает массив объектов открытых ордеров</p></td>
   </tr>
</table>


<br />


```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces;

interface IOpenOrdersResponseItemInterface
{
    /**
     * Идентификатор аккаунта
     * @return int
     */
    public function getAccountId(): int;

    /**
     * Символьный код торговой пары
     * @return string
     */
    public function getSymbol(): string;

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
     * Объем ордера
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Исполненный объем ордера
     * @return float
     */
    public function getExecQty(): float;

    /**
     * Общий объем ордера. Для некоторых исторических данных оно может быть меньше 0.
     * @return float
     */
    public function getCummulativeQuoteQty(): float;

    /**
     * Средняя цена заполнения ордера (средняя цена, если в рамках этого ордера было исполнено несколько обратных ордеров)
     * @return float
     */
    public function getAvgPrice(): float;

    /**
     * Статус ордера
     * @return string
     */
    public function getStatus(): string;

    /**
     * Время действия
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string
     */
    public function getTimeInForce(): string;

    /**
     * Тип ордера
     * @return string
     */
    public function getOrderType(): string;

    /**
     * Направление ордера. BUY, SELL
     * @return string
     */
    public function getSide(): string;

    /**
     * Цена остановки
     * @return float
     */
    public function getStopPrice(): float;

    /**
     * Время создания ордера
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Время последнего обновления ордера
     * @return \DateTime
     */
    public function getUpdateTime(): \DateTime;

    /**
     * Торгуется символ? 0：да, 1：нет
     * @return int
     */
    public function getIsWorking(): int;

    /**
     * Категория ордера. 0：обычный ордер; 1：TP/SL ордер. TP/SL обязательно содержит это поле заполненным
     * @return int
     */
    public function getOrderCategory(): int;

    /**
     * Триггерная цена. TP/SL ордер всегда имеет заполненным это поле
     * @return float|null
     */
    public function getTriggerPrice(): ?float;
}
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersResponseItemInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response\OpenOrdersOrderResponseItem::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getAccountId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Идентификатор аккаунта</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderLinkId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Символьный код торговой пары</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderId()</td>
     <td style="text-align: center">string</td>
     <td><p>Системный идентификатор ордера</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Цена ордера</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Символьный код торговой пары</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getAvgPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Средняя цена заполнения ордера (средняя цена, если в рамках этого ордера было исполнено несколько обратных ордеров)</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Время создания ордера</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getCummulativeQuoteQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Общий объем ордера. Для некоторых исторических данных оно может быть меньше 0.</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getExecQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Исполненный объем ордера</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getIsWorking()</td>
     <td style="text-align: center">int</td>
     <td>
        <p>Торгуется символ?:</p>
        <ul>
            <li>0：да</li>
            <li>1：нет</li>
        </ul>
     </td>
    </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Объем ордера</p></td>
    </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderType()</td>
     <td style="text-align: center">string</td>
     <td><p>Тип ордера</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getSide()</td>
     <td style="text-align: center">string</td>
     <td><p>Направление ордера</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Статус ордера</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getStopPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Цена остановки</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getTimeInForce()</td>
     <td style="text-align: center">float</td>
     <td><p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Время действия</a></p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getUpdateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Время последнего обновления</p></td>
   </tr>
</table>