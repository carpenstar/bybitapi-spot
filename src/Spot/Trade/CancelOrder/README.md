### SPOT - Trade - Cancel Order
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/cancel)</b>

<p>Closes an order by system or custom ID</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\CancelOrder::class
```

<br />


<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

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

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces;

interface ICancelOrderRequestInterface
{
    /**
     * Order ID. Required if not passing orderLinkId
     */
     public function setOrderId(?int $orderId): self;
     public function getOrderId(): ?int;
    
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
     public function setOrderCategory(?int $orderCategory): self;
     public function getOrderCategory(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>INTERFACE</b></sup> <br />
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
namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces;

interface ICancelOrderResponseInterface
{
    /**
     * Order ID
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * User-generated order ID
     * @return string
     */
    public function getOrderLinkId(): string;

    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Order status
     * @return string
     */
    public function getStatus(): string;

    /**
     * Account ID
     * @return int
     */
    public function getAccountId(): ?int;

    /**
     * Order price
     * @return float|null
     */
    public function getOrderPrice(): ?float;

    /**
     * Order Creation Time
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Order quantity
     * @return float|null
     */
    public function getOrderQty(): ?float;

    /**
     * Executed quantity
     * @return float|null
     */
    public function getExecQty(): ?float;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string|null
     */
    public function getTimeInForce(): ?string;

    /**
     * Order type
     * @return string|null
     */
    public function getOrderType(): ?string;

    /**
     * Side. BUY, SELL
     * @return string|null
     */
    public function getSide(): ?string;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
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
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderId()</td>
     <td style="text-align: center">null | int</td>
     <td><p>Order ID</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderLinkId()</td>
     <td style="text-align: center">null | string</td>
     <td><p>User-generated order ID</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Name of the trading pair</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Order status</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getAccountId()</td>
     <td style="text-align: center">string</td>
     <td><p>Account ID</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderPrice()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Order price</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Order Creation Time</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderQty()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Order quantity</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getExecQty()</td>
     <td style="text-align: center">null | float</td>
     <td><p>Executed quantity</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getTimeInForce()</td>
     <td style="text-align: center">null | string</td>
     <td>
        <p>Time in force</p>
        <p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044</a></p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getOrderType()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Order type</p></td>
   </tr>
   <tr>
     <td>ICancelOrderResponseInterface::getSide()</td>
     <td style="text-align: center">null | string</td>
     <td><p>Side. BUY, SELL</p></td>
   </tr>
</table>