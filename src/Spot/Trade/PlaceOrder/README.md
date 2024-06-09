### SPOT - Trade - Place Order
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/place-order)</b>

> Do not use the duplicate orderLinkId in normal order & TP/SL order

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\PlaceOrder::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

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

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces;

interface IPlaceOrderRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): ?string;

    /**
     * Order type
     * @param string $orderType
     * @return self
     */
    public function setOrderType(string $orderType): self;
    public function getOrderType(): ?string;

    /**
     * Side. BUY, SELL
     * @param string $side
     * @return self
     */
    public function setSide(string $side): self;
    public function getSide(): ?string;

    /**
     * User-generated order ID
     * @param string $orderLinkId
     * @return self
     */
    public function setOrderLinkId(string $orderLinkId): self;
    public function getOrderLinkId(): ?string;

    /**
     * Order qty. When you place a MARKET BUY order, this param means quote amount. e.g., MARKET BUY BTCUSDT, orderQty should be 200 USDT
     * @param float $orderQty
     * @return self
     */
    public function setOrderQty(float $orderQty): self;
    public function getOrderQty(): ?string;

    /**
     * Order price. When the type field is MARKET, the price field is optional. When the type field is LIMIT or LIMIT_MAKER, the price field is required
     * @param float $orderPrice
     * @return self
     */
    public function setOrderPrice(float $orderPrice): self;
    public function getOrderPrice(): ?float;

    /**
     * Time in force
     * @param string $timeInForce
     * @return self
     */
    public function setTimeInForce(string $timeInForce): self;
    public function getTimeInForce(): ?string;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @param string $orderCategory
     * @return self
     */
    public function setOrderCategory(string $orderCategory): self;
    public function getOrderCategory(): ?string;

    /**
     * Trigger price. Used for TP/SL order
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
        <sup><b>INTERFACE</b></sup> <br />
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
    <th style="width: 45%; text-align: center">Method</th>
    <th style="width: 5%; text-align: center">Required</th>
    <th style="width: 50%; text-align: center">Description</th>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setSymbol(string $symbol)</td>
    <td><b>YES</b></td>
    <td><p>Name of the trading pair</p></td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderType(string $orderType)</td>
    <td><b>YES</b></td>
    <td><p>Order type</p></td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setSide(string $side)</td>
    <td><b>YES</b></td>
    <td>
        <p>Side. BUY, SELL</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderQty(float $orderQty)</td>
    <td><b>YES</b></td>
    <td>
        <p>Order qty. When you place a MARKET BUY order, this param means quote amount. e.g., MARKET BUY BTCUSDT, orderQty should be 200 USDT</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderLinkId(string $orderLinkId)</td>
    <td>NO</td>
    <td>
        <p>User-generated order ID</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderPrice(float $orderPrice)</td>
    <td>NO</td>
    <td>
        <p>Order price. When the type field is MARKET, the price field is optional. When the type field is LIMIT or LIMIT_MAKER, the price field is required</p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setTimeInForce(string $timeInForce)</td>
    <td>NO</td>
    <td>
        <p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Time in force</a></p>
    </td>
  </tr>
  <tr>
    <td>IPlaceOrderRequestInterface::setOrderCategory(string $orderCategory)</td>
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
  <tr>
    <td>IPlaceOrderRequestInterface::setTriggerPrice(float $triggerPrice)</td>
    <td>NO</td>
    <td>
        <p>Trigger price. Used for TP/SL order</p>
    </td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>RESPONSE STRUCTURE</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces;

interface IPlaceOrderResponseInterface
{
    /**
     * Order ID
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * User-generated order ID
     * @return string|null
     */
    public function getOrderLinkId(): ?string;

    /**
     * Name of the trading pair
     * @return string|null
     */
    public function getSymbol(): ?string;

    /**
     * Order Creation Time
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Last traded price
     * @return float|null
     */
    public function getOrderPrice(): ?float;

    /**
     * Order quantity
     * @return float|null
     */
    public function getOrderQty(): ?float;

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

    /**
     * Order status
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string|null
     */
    public function getTimeInForce(): ?string;

    /**
     * Account ID
     * @return string|null
     */
    public function getAccountId(): ?string;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order
     * @return int|null
     */
    public function getOrderCategory(): ?int;

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
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderId()</td>
     <td style="text-align: center">int</td>
     <td><p>Order ID</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderLinkId()</td>
     <td style="text-align: center">string</td>
     <td><p>User-generated order ID</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Name of the trading pair</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getCreateTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Order Creation Time</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Last traded price</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Order quantity</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderType()</td>
     <td style="text-align: center">string</td>
     <td><p>Order type</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getSide()</td>
     <td style="text-align: center">string</td>
     <td><p>Side. BUY, SELL</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getStatus()</td>
     <td style="text-align: center">string</td>
     <td><p>Order status</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getTimeInForce()</td>
     <td style="text-align: center">string</td>
     <td><p><a href="https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044">Time in force</a></p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getAccountId()</td>
     <td style="text-align: center">string</td>
     <td><p>Account ID</p></td>
   </tr>
    <tr>
     <td>IPlaceOrderResponseInterface::getOrderCategory()</td>
     <td style="text-align: center">int</td>
     <td><p>Order category. 0：normal order by default; 1：TP/SL order</p></td>
   </tr>
   <tr>
     <td>IPlaceOrderResponseInterface::getTriggerPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Trigger price. TP/SL order has this field</p></td>
   </tr>
</table>