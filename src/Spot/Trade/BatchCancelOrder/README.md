### SPOT - Trade - Batch Cancel Order
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/batch-cancel)</b>

<p>Endpoint allows you to batch cancel unexecuted orders without using the order ID(s)</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\BatchCancelOrder::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\BatchCancelOrder;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Request\BatchCancelOrderRequest;


$bybitApi = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ');
        
$bybitApi->privateEndpoint(BatchCancelOrder::class, (new BatchCancelOrderRequest())->setSymbol('ETHUSDT'));

echo "Is batch canceled: " . $bybit->getResult()->isSuccess();
// Is batch canceled: true
```

<br />

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces;

interface IBatchCancelOrderRequestInterface
{
    /**
    * Name of the trading pair
    */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
    * Side. BUY, SELL. 
    * See at \Carpenstar\ByBitAPI\Core\Enums\EnumSide
    */
    public function setSide(string $side): self;
    public function getSide(): string;

    /**
     * Order type. LIMIT in default. It allows multiple types, separated by comma, e.a LIMIT,LIMIT_MAKER. 
     * See at Carpenstar\ByBitAPI\Core\Enums\EnumOrderType
     */
    public function setOrderTypes(string $orderTypes): self; 
    public function getOrderTypes(): string;
    
    /**
    * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
    * See at Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory
    */
    public function setOrderCategory(int $orderCategory): self;
    public function getOrderCategory(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces\IBatchCancelOrderRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Request\BatchCancelOrderRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">Method</th>
    <th style="width: 5%; text-align: center">Required</th>
    <th style="width: 50%; text-align: center">Description</th>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setSymbol(string $symbol)</td>
    <td><b>YES</b></td>
    <td><p>Trading pair</p></td>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setSide(string $side)</td>
    <td>NO</td>
    <td><p>Side. BUY, SELL. <br/>
    <b>See at \Carpenstar\ByBitAPI\Core\Enums\EnumSide</b></p></td>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setOrderTypes(string $orderTypes)</td>
    <td>NO</td>
    <td>
        <p>Order type. LIMIT in default. It allows multiple types, separated by comma, e.a LIMIT,LIMIT_MAKER.<br/>
        <b>See at Carpenstar\ByBitAPI\Core\Enums\EnumOrderType</b></p>
    </td>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setOrderCategory(int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces;

interface IBatchCancelOrderResponseInterface
{
    /**
     * Batch cancel successfully or not. 0：fail, 1：success
     */
    public function isSuccess(): bool;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces\IBatchCancelOrderResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Response\BatchCancelOrderResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IBatchCancelOrderResponseInterface::isSuccess()</td>
     <td style="text-align: center">bool</td>
     <td><p>Batch cancel successfully or not. 0：fail, 1：success</p></td>
   </tr>
</table>

