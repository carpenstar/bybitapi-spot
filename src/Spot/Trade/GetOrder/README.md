### SPOT - Trade - Get Order
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/get-order)</b>

<p>Retrieves order information by system or custom ID</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\GetOrder::class
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

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces;

interface IGetOrderRequestInterface
{
    /**
     * Order ID. Required if not passing orderLinkId
     */
    public function setOrderId(?string $orderId): self;
    public function getOrderId(): ?string;

    /**
     * Unique user-set order ID. Required if not passing orderId
     */
    public function setOrderLinkId(?string $orderLinkId): self;
    public function getOrderLinkId(): ?string;

    /**
     * Order category.
     * 0：normal order by default;
     * 1：TP/SL order, Required for TP/SL order.
     */
    public function setOrderCategory(string $orderCategory): self;
    public function getOrderCategory(): string;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces\GetOrder::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Request\GetOrderRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">Method</th>
    <th style="width: 5%; text-align: center">Required</th>
    <th style="width: 50%; text-align: center">Description</th>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderId(string $orderId)</td>
    <td><b>NO</b></td>
    <td><p>Order ID. Required if not passing orderLinkId</p></td>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderLinkId(string $orderLinkId)</td>
    <td><b>NO</b></td>
    <td><p>Unique user-set order ID. Required if not passing orderId</p></td>
  </tr>
  <tr>
    <td>ICancelOrderRequestInterface::setOrderCategory(?int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces;

interface IGetOrderResponseInterface
{
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
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Account ID
     * @return int
     */
    public function getAccountId(): int;

    /**
     * Average filled price
     * @return float
     */
    public function getAvgPrice(): float;

    /**
     * Order created time in the match engine
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Total order quantity. For some historical data, it might less than 0, and that means it is not applicable
     * @return float
     */
    public function getCummulativeQuoteQty(): float;

    /**
     * Executed quantity
     * @return float
     */
    public function getExecQty(): float;

    /**
     * Is working. 0：valid, 1：invalid
     * @return int
     */
    public function getIsWorking(): int;

    /**
     * Reserved for order (if it's 0, it means that the funds corresponding to the order have been settled)
     * @return float
     */
    public function getLocked(): float;

    /**
     * Order quantity
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Order type
     * @return string
     */
    public function getOrderType(): string;

    /**
     * Order direction
     * @return string
     */
    public function getSide(): string;

    /**
     * Order status
     * @return string
     */
    public function getStatus(): string;

    /**
     * Stop price
     * @return float
     */
    public function getStopPrice(): float;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string
     */
    public function getTimeInForce(): string;

    /**
     * Last time order was updated
     * @return \DateTime
     */
    public function getUpdateTime(): \DateTime;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces\GetOrderResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Response\GetOrderResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getOrderLinkId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>User-generated order ID</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getOrderId()</td>
     <td style="text-align: center">string</td>
     <td><p>Order ID</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Order price</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Name of the trading pair</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getAccountId()</td>
     <td style="text-align: center">int</td>
     <td><p>Account ID</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getAvgPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Average filled price</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Order created time in the match engine</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getCummulativeQuoteQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Total order quantity. For some historical data, it might less than 0, and that means it is not applicable</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getExecQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Executed quantity</p></td>
   </tr>
   <tr>
     <td>IGetOrderResponseInterface::getIsWorking()</td>
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
     <td>IGetOrderResponseInterface::getLocked()</td>
     <td style="text-align: center">float</td>
     <td><p>Reserved for order (if it's 0, it means that the funds corresponding to the order have been settled)</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Order quantity</p></td>
    </tr>
    <tr>
     <td>IGetOrderResponseInterface::getOrderType()</td>
     <td style="text-align: center">string</td>
     <td><p>Order type</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getSide()</td>
     <td style="text-align: center">string</td>
     <td><p>Order direction</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Order status</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getStopPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Stop price</p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getTimeInForce()</td>
     <td style="text-align: center">float</td>
     <td><p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Time in force</a></p></td>
   </tr>
    <tr>
     <td>IGetOrderResponseInterface::getUpdateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Last time order was updated</p></td>
   </tr>
</table>