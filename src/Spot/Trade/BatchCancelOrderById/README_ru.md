### SPOT - Trade - Batch Cancel Order By Id
<b>[Официальная документация](https://bybit-exchange.github.io/docs/spot/trade/batch-cancel)</b>

<p>Эндпоинт позволяет пакетно отменять неисполненные ордеры с использованием списка индентификаторов ордера</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\BatchCancelOrderById::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

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

<h3 align="left" width="100%"><b>ПАРМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces;

interface IBatchCancelOrderByIdRequestInterface
{
    /**
     * Идентификатор заказа. Используйте запятые, чтобы указать несколько идентификаторов заказа. Максимум 100 идентификаторов.
     */
    public function setOrderIds(string $orderIds): self;
    public function getOrderIds(): string;

    /**
    * Категория ордера:
    * 0：обычный ордер, по умолчанию; 
    * 1：TP/SL ордера, Обязательно для удаления TP/SL ордеров.
    * Список смотри в Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory
    */
    public function setOrderCategory(int $orderCategory): self;
    public function getOrderCategory(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
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
    <th style="width: 45%; text-align: center">МЕТОД</th>
    <th style="width: 5%; text-align: center">ОБЯЗАТЕЛЬНО</th>
    <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
  </tr>
  <tr>
    <td>IBatchCancelOrderByIdRequestInterface::setOrderIds(string $orderIds)</td>
    <td><b>ДА</b></td>
    <td><p> Идентификатор заказа. Используйте запятые, чтобы указать несколько идентификаторов заказа. Максимум 100 идентификаторов.</p></td>
  </tr>
  <tr>
    <td>IBatchCancelOrderByIdRequestInterface::setOrderCategory(int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\IBatchCancelOrderByIdResponseInterface\Interfaces;

interface IBatchCancelOrderByIdResponseInterface
{
    /**
     * List. В случае успеха возвращается пустой массив
     * @return IBatchCancelOrderByIdResponseItemInterface[]
     */
    public function getErrorOrderList(): array;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
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
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
   <tr>
     <td>IBatchCancelOrderByIdResponseInterface::getErrorOrderList()</td>
     <td style="text-align: center">BatchCancelOrderByIdResponseItem[]</td>
     <td><p>List. В случае успеха возвращается пустой массив</p></td>
   </tr>
</table>

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\IBatchCancelOrderByIdResponseInterface\Interfaces;

interface IBatchCancelOrderByIdResponseItemInterface
{
    /**
     * Order ID
     */
    public function getOrderId(): int;

    /**
     * Код ошибки
     */
    public function getCode(): string;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
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
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
   <tr>
     <td>IBatchCancelOrderByIdResponseItemInterface::getOrderId()</td>
     <td style="text-align: center">int</td>
     <td><p>Order ID</p></td>
   </tr>
   <tr>
     <td>IBatchCancelOrderByIdResponseItemInterface::getCode()</td>
     <td style="text-align: center">string</td>
     <td><p>Код ошибки</p></td>
   </tr>
</table>