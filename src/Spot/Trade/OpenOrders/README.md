### SPOT - Trade - Open Orders
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/open-order)</b>

<p>Returns a list of open orders</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\OpenOrders::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

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

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces;

interface IOpenOrdersRequestInterface
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
     * Limit for data size. [1, 500]. Default: 500
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * Order category:
     * 0：normal order by default;
     * 1：TP/SL order, Required for TP/SL order.
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
    <th style="width: 45%; text-align: center">Method</th>
    <th style="width: 5%; text-align: center">Required</th>
    <th style="width: 50%; text-align: center">Description</th>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setSymbol(string $symbol)</td>
    <td>NO</td>
    <td><p>Name of the trading pair</p></td>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setOrderId(string $orderId)</td>
    <td>NO</td>
    <td><p>Specify orderId to return all the orders that orderId of which are smaller than this particular one for pagination purpose</p></td>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setLimit(int $limit)</td>
    <td>NO</td>
    <td>
        <p>Limit for data size. [1, 500]. Default: 500</p>
    </td>
  </tr>
  <tr>
    <td>IOpenOrdersRequestInterface::setOrderCategory(int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces;

interface IOpenOrdersResponseInterface
{
    /**
     * Returns an array of open order objects
     * @return OpenOrdersResponseItem[]
     */
    public function getOpenOrders(): array;
}
```

<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
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
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
    <tr>
     <td>IOpenOrdersResponseInterface::getOpenOrders()</td>
     <td style="text-align: center">OpenOrdersResponseItem[]</td>
     <td><p>Returns an array of open order objects</p></td>
   </tr>
</table>


<br />


```php
namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces;

interface IOpenOrdersResponseItemInterface
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
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
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
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderLinkId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>User-generated order ID</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderId()</td>
     <td style="text-align: center">string</td>
     <td><p>Order ID</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Order price</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Name of the trading pair</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getAccountId()</td>
     <td style="text-align: center">int</td>
     <td><p>Account ID</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getAvgPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Average filled price</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Order created time in the match engine</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getCummulativeQuoteQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Total order quantity. For some historical data, it might less than 0, and that means it is not applicable</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getExecQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Executed quantity</p></td>
   </tr>
   <tr>
     <td>IOpenOrdersResponseItemInterface::getIsWorking()</td>
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
     <td>IOpenOrdersResponseItemInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Order quantity</p></td>
    </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getOrderType()</td>
     <td style="text-align: center">string</td>
     <td><p>Order type</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getSide()</td>
     <td style="text-align: center">string</td>
     <td><p>Order direction</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Order status</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getStopPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Stop price</p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getTimeInForce()</td>
     <td style="text-align: center">float</td>
     <td><p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Time in force</a></p></td>
   </tr>
    <tr>
     <td>IOpenOrdersResponseItemInterface::getUpdateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Last time order was updated</p></td>
   </tr>
</table>