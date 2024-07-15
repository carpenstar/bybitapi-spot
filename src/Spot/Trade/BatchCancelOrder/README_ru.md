### SPOT - Trade - Batch Cancel Order
<b>[Официальная документация](https://bybit-exchange.github.io/docs/spot/trade/batch-cancel)</b>

<p>Эндпоинт позволяет пакетно отменять неисполненные ордеры без использования индентификатора(-ов) ордера</p>

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\BatchCancelOrder::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\BatchCancelOrder;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Request\BatchCancelOrderRequest;


$bybitApi = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'apiKey', 'apiSecret');
        
$bybitApi->privateEndpoint(BatchCancelOrder::class, (new BatchCancelOrderRequest())->setSymbol('ETHUSDT'));

echo "Is batch canceled: " . $bybit->getResult()->isSuccess();
// Is batch canceled: true
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces;

interface IBatchCancelOrderRequestInterface
{
    /**
    * Название торговой пары
    */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
    * Направление. BUY - покупка, SELL - продажа. 
    * Список смотри в \Carpenstar\ByBitAPI\Core\Enums\EnumSide
    */
    public function setSide(string $side): self;
    public function getSide(): string;

    /**
     * Тип ордера. LIMIT по умолчанию. Допускается использование нескольких типов разделенных запятой, например: LIMIT,LIMIT_MAKER. 
     * Список смотри в Carpenstar\ByBitAPI\Core\Enums\EnumOrderType
     */
    public function setOrderTypes(string $orderTypes): self;
    public function getOrderTypes(): string;
    
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
        <sup><b>Интерфейс</b></sup> <br />
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
    <th style="width: 45%; text-align: center">Метод</th>
    <th style="width: 5%; text-align: center">Обязательно</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setSymbol(string $symbol)</td>
    <td><b>ДА</b></td>
    <td><p>Название торговой пары</p></td>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setSide(string $side)</td>
    <td>НЕТ</td>
    <td>
    <p>Направление. BUY - покупка, SELL - продажа</p>
    <p><b>Список смотри в \Carpenstar\ByBitAPI\Core\Enums\EnumSide</b></p>
    </td>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setOrderTypes(string $orderTypes)</td>
    <td>НЕТ</td>
    <td>
        <p>Тип ордера. LIMIT по умолчанию. Допускается использование нескольких типов разделенных запятой, например: LIMIT,LIMIT_MAKER.</p>
        <p><b>Список смотри в Carpenstar\ByBitAPI\Core\Enums\EnumOrderType</b></p>
    </td>
  </tr>
  <tr>
    <td>IBatchCancelOrderRequestInterface::setOrderCategory(int $orderCategory)</td>
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
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces;

interface IBatchCancelOrderResponseInterface
{
    /**
     * Пакетная отмена успешна или нет. 0: неудача, 1: успех
     */
    public function isSuccess(): bool;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>Интерфейс</b></sup> <br />
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
     <th style="width: 30%; text-align: center">Метод</th>
     <th style="width: 20%; text-align: center">Тип</th>
     <th style="width: 50%; text-align: center">Описание</th>
   </tr>
   <tr>
     <td>IBatchCancelOrderResponseInterface::isSuccess()</td>
     <td style="text-align: center">bool</td>
     <td>
        <p>Пакетная отмена успешна или нет. 0: неудача, 1: успех</p>
    </td>
   </tr>
</table>

