### SPOT - Trade - Order History
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/order-history)</b>

<p>Returns order history</p>

<ul>
    <li>If startTime and endTime are both not specified, it returns last 7 days records by default.</li>
    <li>Supports fetching 3 months worth of data per request. Returns data up to 6 months old.</li>
    <li>Market maker can only get recent 3 days orders.</li>
    <li>Cancelled, Rejected, Deactivated orders save up to 7 days</li>
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

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Specify orderId to return all the orders that orderId of which are smaller than this particular one for pagination purpose
     * @param int $orderId
     * @return self
     */
    public function setOrderId(int $orderId): self;
    public function getOrderId(): int;

    /**
     * Limit for data size. [1, 500]. Default: 100
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * The start string datetime, eq: Y-m-d H:i:s
     * @param string $dateTime
     * @return self
     */
    public function setStartTime(string $dateTime): self;
    public function getStartTime(): int;

    /**
     * The end string datetime, eq: Y-m-d H:i:s
     * @param string $endTime
     * @return self
     */
    public function setEndTime(string $endTime): self;
    public function getEndTime(): int;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
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
        <sup><b>INTERFACE</b></sup> <br />
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
    <th style="width: 45%; text-align: center">Method</th>
    <th style="width: 5%; text-align: center">Required</th>
    <th style="width: 50%; text-align: center">Description</th>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setSymbol(string $symbol)</td>
    <td>NO</td>
    <td><p>Name of the trading pair</p></td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setOrderId(string $orderId)</td>
    <td>NO</td>
    <td><p>Specify orderId to return all the orders that orderId of which are smaller than this particular one for pagination purpose</p></td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setLimit(int $limit)</td>
    <td>NO</td>
    <td>
        <p>Limit for data size. [1, 500]. Default: 500</p>
    </td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setStartTime(string $dateTime)</td>
    <td>NO</td>
    <td>
        <p>The start string datetime, eq: Y-m-d H:i:s</p>
    </td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setEndTime(string $endTime)</td>
    <td>NO</td>
    <td>
        <p>The end string datetime, eq: Y-m-d H:i:s</p>
    </td>
  </tr>
  <tr>
    <td>IOrderHistoryRequestInterface::setOrderCategory(int $orderCategory)</td>
    <td>NO</td>
    <td>
        <p>Order category.</p>
        <ul>
            <li>0：normal order by default;</li>
            <li>1：TP/SL order, Required for TP/SL order.</li>
        </ul>
        <p><b>See at Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory</b></p>
    </td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>RESPONSE STRUCTURE</b></h3>

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
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces\IOrderHistoryResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response\OrderHistoryResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
    <tr>
     <td>IOrderHistoryResponseInterface::getOrderHistory()</td>
     <td style="text-align: center">IOrderHistoryResponseItemInterface[]</td>
     <td><p>Returns an array of history data</p></td>
   </tr>
</table>


<br />


```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryResponseItemInterface
{
    /**
     * Account ID
     * @return int
     */
    public function getAccountId(): int;

    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * User-generated order ID
     * @return string
     */
    public function getOrderLinkId(): string;

    /**
     * Order ID
     * @return int
     */
    public function getOrderId(): int;

    /**
     * Order price
     * @return float
     */
    public function getOrderPrice(): float;

    /**
     * Order quantity
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Executed quantity
     * @return float
     */
    public function getExecQty(): float;

    /**
     * Total order quantity. For some historical data, it might less than 0, and that means it is not applicable
     * @return float
     */
    public function getCummulativeQuoteQty(): float;

    /**
     * Average filled price
     * @return float
     */
    public function getAvgPrice(): float;

    /**
     * Order status
     * @return string
     */
    public function getStatus(): string;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string
     */
    public function getTimeInForce(): string;

    /**
     * Order type
     * @return string
     */
    public function getOrderType(): string;

    /**
     * Side. BUY, SELL
     * @return string
     */
    public function getSide(): string;

    /**
     * Stop price
     * @return float
     */
    public function getStopPrice(): float;

    /**
     * Order created time in the match engine
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Last time order was updated
     * @return \DateTime
     */
    public function getUpdateTime(): \DateTime;

    /**
     * Is working. 0：valid, 1：invalid
     * @return int
     */
    public function getIsWorking(): int;

    /**
     * Order category. 0：normal order; 1：TP/SL order. TP/SL order has this field
     * @return int
     */
    public function getOrderCategory(): int;

    /**
     * Trigger price. TP/SL order has this field
     * @return float|null
     */
    public function getTriggerPrice(): ?float;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
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
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOrderHistoryResponseItemInterface::getAccountId()</td>
     <td style="text-align: center">int</td>
     <td><p>Account ID</p></td>
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
        <p>Order category:</p>
        <ul>
            <li>0：normal order; </li>
            <li>1：TP/SL order. TP/SL order has this field</li>
        </ul>
        <p><b>See at Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory</b></p>
    </td>
    </tr>
    <tr>
     <td>IOrderHistoryResponseItemInterface::getTriggerPrice()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Trigger price. TP/SL order has this field</p></td>
   </tr>
</table>