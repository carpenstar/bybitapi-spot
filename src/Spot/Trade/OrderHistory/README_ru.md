### SPOT - Trade - Order History
<b>[Официальная документации](https://bybit-exchange.github.io/docs/spot/trade/order-history)</b>

<p>Возвращает историю ордеров</p>

<ul>
    <li>Если startTime и endTime не указаны, по умолчанию возвращаются записи за последние 7 дней.</li>
    <li>Поддерживает получение данных за 3 месяца по каждому запросу. Возвращает данные за период до 6 месяцев.</li>
    <li>Маркет-мейкер может получать ордера только за последние 3 дня.</li>
    <li>Отмененные, отклоненные, деактивированные заказы сохраняются до 7 дней.</li>
</ul>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\OrderHistory::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\OrderHistory;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Request\OrderHistoryRequest;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response\OrderHistoryResponse;

        $bybit = (new BybitAPI())
            ->setHost('https://api-testnet.bybit.com')
            ->setApiKey('apiKey')
            ->setSecret('apiSecret');

        $orderHistoryResponse = $bybit->privateEndpoint(OrderHistory::class, (new OrderHistoryRequest())->setSymbol('ETHUSDT'));

        echo "Return code: {$orderHistoryResponse->getReturnCode()} \n";
        echo "Return message: {$orderHistoryResponse->getReturnMessage()} \n";
        echo " ----- \n";
        /**
         * @var \Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response\OrderHistoryResponseItem[] $orderInfoList
         */
        $orderInfoList = $orderHistoryResponse->getResult()->getOrderHistory();

        /**
         * @var \Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response\OrderHistoryResponseItem $order
         */
        foreach ($orderInfoList as $order) {
            echo "  Account ID: {$order->getAccountId()} \n";
            echo "  Symbol: {$order->getSymbol()} \n";
            echo "  Order Link ID: {$order->getOrderLinkId()} \n";
            echo "  Order ID: {$order->getOrderId()} \n";
            echo "  Order Price: {$order->getOrderPrice()} \n";
            echo "  Order quantity: {$order->getOrderQty()} \n";
            echo "  Executed quantity: {$order->getExecQty()} \n";
            echo "  Cummulative Quote Quantity: {$order->getCummulativeQuoteQty()} \n";
            echo "  Average Filled Price: {$order->getAvgPrice()} \n";
            echo "  Order status: {$order->getStatus()} \n";
            echo "  Time in force: {$order->getTimeInForce()} \n";
            echo "  Order type: {$order->getOrderType()} \n";
            echo "  Order side: {$order->getSide()} \n";
            echo "  Stop Price: {$order->getStopPrice()} \n";
            echo "  Create time: {$order->getCreateTime()->format('Y-m-d H-i-s')} \n";
            echo "  Update time: {$order->getUpdateTime()->format('Y-m-d H:i:s')} \n";
            echo "  Is working: {$order->getIsWorking()} \n";
            echo "  Order category: {$order->getOrderCategory()} \n";
            echo "  Trigger price: {$order->getTriggerPrice()} \n";
            echo " ----- \n";
        }

/**
 * Output: 
 * Return code: 0 
 * Return message: OK 
 * ----- 
 *    Account ID: 1111837 
 *    Symbol: ETHUSDT 
 *    Order Link ID: 17185350677301134 
 *    Order ID: 3000 
 *    Order Price: 3000 
 *    Order quantity: 1 
 *    Executed quantity: 0 
 *    Cummulative Quote Quantity: 0 
 *    Average Filled Price: 0 
 *    Order status: CANCELED 
 *    Time in force: GTC 
 *    Order type: LIMIT 
 *    Order side: BUY 
 *    Stop Price: 0 
 *    Create time: 2024-06-16 10-51-07 
 *    Update time: 2024-06-16 10:51:08 
 *    Is working: 1 
 *    Order category: 0 
 *    Trigger price:  
 * ----- 
 *    Account ID: 1111837 
 *    Symbol: ETHUSDT 
 *    Order Link ID: 17185350669091223 
 *    Order ID: 3000 
 *    Order Price: 3000 
 *    Order quantity: 1 
 *    Executed quantity: 0 
 *    Cummulative Quote Quantity: 0 
 *    Average Filled Price: 0 
 *    Order status: CANCELED 
 *    Time in force: GTC 
 *    Order type: LIMIT 
 *    Order side: BUY 
 *    Stop Price: 0 
 *    Create time: 2024-06-16 10-51-06 
 *    Update time: 2024-06-16 10:51:07 
 *    Is working: 1 
 *    Order category: 0 
 *    Trigger price:  
 * -----
 */
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryRequestInterface
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
     * Нижняя временная граница от которой нужно получить записи, формат: Y-m-d H:i:s
     * @param string $dateTime
     * @return self
     */
    public function setStartTime(string $dateTime): self;
    public function getStartTime(): int;

    /**
     * Верхняя временная граница до которой нужно получить записи, формат: Y-m-d H:i:s
     * @param string $endTime
     * @return self
     */
    public function setEndTime(string $endTime): self;
    public function getEndTime(): int;

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
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces\IOrderHistoryRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Request\OrderHistoryRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">МЕТОД</th>
    <th style="width: 5%; text-align: center">ОБЯЗАТЕЛЬНО</th>
    <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setSymbol(string $symbol)</td>
    <td>НЕТ</td>
    <td><p>Символьный код торговой пары</p></td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setOrderId(string $orderId)</td>
    <td>НЕТ</td>
    <td><p>Укажите orderId, чтобы вернуть все заказы, у которых идентификатор orderId меньше, чем переданный, это нужно для реализации пагинации.</p></td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setLimit(int $limit)</td>
    <td>НЕТ</td>
    <td>
        <p>Ограничение на количество возвращаемых записей. [1, 500]. По умолчанию: 500</p>
    </td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setStartTime(string $dateTime)</td>
    <td>НЕТ</td>
    <td>
        <p>Нижняя временная граница от которой нужно получить записи, формат: Y-m-d H:i:s</p>
    </td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setEndTime(string $endTime)</td>
    <td>НЕТ</td>
    <td>
        <p>Верхняя временная граница до которой нужно получить записи, формат: Y-m-d H:i:s</p>
    </td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setOrderCategory(int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryResponseInterface
{
    /**
     * @return IOrderHistoryResponseItemInterface[]
     */
    public function getOrderHistory(): array;
}
```

<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOrderHistoryResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response\OrderHistoryResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
    <tr>
     <td>IOrderHistoryResponseInterface::getOrderHistory()</td>
     <td style="text-align: center">IOrderHistoryResponseItemInterface[]</td>
     <td><p>Возвращает массив истории ордеров</p></td>
   </tr>
</table>


<br />


```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryResponseItemInterface
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
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces\IOrderHistoryResponseItemInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response\OrderHistoryResponseItem::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getAccountId()</td>
     <td style="text-align: center">int</td>
     <td><p>Идентификатор аккаунта</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Name of the trading pair</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getOrderLinkId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>User-generated order ID</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getOrderId()</td>
     <td style="text-align: center">string</td>
     <td><p>Order ID</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Order price</p></td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Order quantity</p></td>
    </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getExecQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Executed quantity</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getCummulativeQuoteQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Total order quantity. For some historical data, it might less than 0, and that means it is not applicable</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getAvgPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Average filled price</p></td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Order status</p></td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getTimeInForce()</td>
     <td style="text-align: center">float</td>
     <td><p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Time in force</a></p></td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getOrderType()</td>
     <td style="text-align: center">string</td>
     <td><p>Order type</p></td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getSide()</td>
     <td style="text-align: center">string</td>
     <td><p>Order direction</p></td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getStopPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Stop price</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Order created time in the match engine</p></td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getUpdateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Last time order was updated</p></td>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getIsWorking()</td>
     <td style="text-align: center">int</td>
     <td>
        <p>Is working:</p>
        <ul>
            <li>0：valid</li>
            <li>1：invalid</li>
        </ul>
     </td>
    </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getOrderCategory()</td>
     <td style="text-align: center">int</td>
     <td>
        <p>Категория ордера:</p>
        <ul>
            <li>0：обычный ордер, по умолчанию; </li>
            <li>1：TP/SL ордера, Обязательно для удаления TP/SL ордеров.</li>
        </ul>
        <p><b>Список смотри в Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory</b></p>
    </td>
   </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getTriggerPrice()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Триггерная цена. TP/SL ордер всегда имеет заполненным это поле</p></td>
   </tr>
</table>