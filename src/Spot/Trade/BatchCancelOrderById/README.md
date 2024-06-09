### SPOT - Trade - Batch Cancel Order By Id
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/batch-cancel)</b>

<p>Endpoint allows you to batch cancel unexecuted orders using a list of order IDs</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\BatchCancelOrderById::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\BatchCancelOrderById;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Request\BatchCancelOrderByIdRequest;


$bybitApi = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'apiKey', 'apiSecret');

$params = (new BatchCancelOrderByIdRequest())->setOrderIds('5555,66666');

/** @var IResponseInterface $batchCancelResponse */
$batchCancelResponse = $bybitApi->privateEndpoint(BatchCancelOrderById::class, $params);

/** @var BatchCancelOrderByIdResponseItem[] $listInfo */
$listInfo = $batchCancelResponse->getResult()->getErrorOrderList();

// Partialy success

echo "Status code: {$batchCancelResponse->getReturnCode()}\n";
echo "Return message: {$batchCancelResponse->getReturnMessage()}\n";
    
foreach ($listInfo as $info) {
    echo " --- \n";
    echo "Order ID: {$info->getOrderId()} \n";
    echo "Error code: {$info->getCode()} \n";
}

/**
* Status code: 0
* Return message: OK
* --- 
* Order ID: 5555 
* Error code: 12213 
* --- 
* Order ID: 66666 
* Error code: 12213
*/
```

<br />

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces;

interface IBatchCancelOrderByIdRequestInterface
{
    /**
     * Order ID, use commas to indicate multiple orderIds. Maximum of 100 ids.
     */
    public function setOrderIds(string $orderIds): self;
    public function getOrderIds(): string;

    /**
     * Order category.
     * 0：normal order by default;
     * 1：TP/SL order, Required for TP/SL order.
     */
    public function setOrderCategory(int $orderCategory): self;
    public function getOrderCategory(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces\IBatchCancelOrderRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Request\BatchCancelOrderByIdRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">Method</th>
    <th style="width: 5%; text-align: center">Required</th>
    <th style="width: 50%; text-align: center">Description</th>
  </tr>
  <tr>
    <td>IBatchCancelOrderByIdRequestInterface::setOrderIds(string $orderIds)</td>
    <td><b>YES</b></td>
    <td><p>Order ID, use commas to indicate multiple orderIds. Maximum of 100 ids.</p></td>
  </tr>
  <tr>
    <td>IBatchCancelOrderByIdRequestInterface::setOrderCategory(int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\IBatchCancelOrderByIdResponseInterface\Interfaces;

interface IBatchCancelOrderByIdResponseInterface
{
    /**
     * List. If all success, it returns empty array
     * @return IBatchCancelOrderByIdResponseItemInterface[]
     */
    public function getErrorOrderList(): array;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\IBatchCancelOrderByIdResponseInterface\Interfaces\IBatchCancelOrderByIdResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Response\BatchCancelOrderByIdResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IBatchCancelOrderByIdResponseInterface::getErrorOrderList()</td>
     <td style="text-align: center">BatchCancelOrderByIdResponseItem[]</td>
     <td><p>List. If all success, it returns empty array</p></td>
   </tr>
</table>

<br />

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\IBatchCancelOrderByIdResponseInterface\Interfaces;

interface IBatchCancelOrderByIdResponseItemInterface
{
    /**
     * Order ID
     */
    public function getOrderId(): int;

    /**
     * Error code
     */
    public function getCode(): string;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\IBatchCancelOrderByIdResponseInterface\Interfaces\IBatchCancelOrderByIdResponseItemInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Response\BatchCancelOrderByIdResponseItem::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IBatchCancelOrderByIdResponseItemInterface::getOrderId()</td>
     <td style="text-align: center">int</td>
     <td><p>Order ID</p></td>
   </tr>
   <tr>
     <td>IBatchCancelOrderByIdResponseItemInterface::getCode()</td>
     <td style="text-align: center">string</td>
     <td><p>Error code</p></td>
   </tr>
</table>