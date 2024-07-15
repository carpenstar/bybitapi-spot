### SPOT - Trade - Trade History
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/my-trades)</b>

<p>Возвращает историю торговли пользователя</p>

<ul>
    <li>Если startTime не указано, вы можете запрашивать записи только за последние 7 дней..</li>
    <li>Если вы хотите запросить записи старше 7 дней, необходимо указать startTime.</li>
    <li>АПИ поддерживает запрос записей за период до 180 дней.</li>
</ul>

> Если orderId имеет значение null и в качестве второго параметра передается fromTicketId == null, то результат сортируется по TicketId в порядке возрастания. В противном случае результат сортируется по TicketId по убыванию.

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\TradeHistory::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Request\TradeHistoryRequest;

$bybit = (new BybitAPI())
    ->setHost('https://api-testnet.bybit.com')
    ->setApiKey('apiKey')
    ->setSecret('apiSecret');

$orderHistoryResponse = $bybit->privateEndpoint(TradeHistory::class, (new TradeHistoryRequest())->setSymbol('ETHUSDT'));

echo "Return code: {$orderHistoryResponse->getReturnCode()} \n";
echo "Return message: {$orderHistoryResponse->getReturnMessage()} \n";

/** @var \Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces\ITradeHistoryResponseItemInterface[] $tradeInfoList */
$tradeInfoList = $orderHistoryResponse->getResult()->getTradeHistory();

/** @var \Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces\ITradeHistoryResponseItemInterface $trade */
foreach ($tradeInfoList as $trade) {
    echo " ----- \n";
    echo "    Symbol: {$trade->getSymbol()} \n";
    echo "    ID: {$trade->getId()} \n";
    echo "    Order ID: {$trade->getOrderId()} \n";
    echo "    Trade ID: {$trade->getTradeId()} \n";
    echo "    Order Price: {$trade->getOrderPrice()} \n";
    echo "    Order quantity: {$trade->getOrderQty()} \n";
    echo "    Execution fee: {$trade->getExecFee()} \n";
    echo "    Fee token ID: {$trade->getFeeTokenId()} \n";
    echo "    Create Time: {$trade->getCreatTime()->format('Y-m-d H:i:s')} \n";
    echo "    Is Buyer: {$trade->getIsBuyer()} \n";
    echo "    Is Maker: {$trade->getIsMaker()} \n";
    echo "    Match Order ID: {$trade->getMatchOrderId()} \n";
    echo "    Maker Rebate: {$trade->getMakerRebate()} \n";
    echo "    Execution Time: {$trade->getExecutionTime()->format('Y-m-d H:i:s')} \n";
}


/**
 * Return code: 0
 * Return message: OK 
 * -----     
 *    Symbol: ETHUSDT 
 *    ID: 1709656664059174912 
 *    Order ID: 1709656663908288256 
 *    Trade ID: 2110000000037347962 
 *    Order Price: 3578.69 
 *    Order quantity: 0.97801 
 *    Execution fee: 0.00097801 
 *    Fee token ID: ETH 
 *    Create Time: 2024-06-16 13:02:36 
 *    Is Buyer: 0 
 *    Is Maker: 1 
 *    Match Order ID: 1708790351975681024 
 *    Maker Rebate: 0 
 *    Execution Time: 2024-06-16 13:02:36 
 * -----     
 *    Symbol: ETHUSDT 
 *    ID: 1709223178689077248 
 *    Order ID: 1709223178529801984 
 *    Trade ID: 2110000000037247445 
 *    Order Price: 3555.73 
 *    Order quantity: 1 
 *    Execution fee: 3.55573 
 *    Fee token ID: USDT 
 *    Create Time: 2024-06-15 22:41:20 
 *    Is Buyer: 1 
 *    Is Maker: 1 
 *    Match Order ID: 1709221391907163136 
 *    Maker Rebate: 0 
 *    Execution Time: 2024-06-15 22:41:20 
 * -----     
 *    Symbol: ETHUSDT 
 *    ID: 1709223171768475648 
 *    Order ID: 1709223171600811776 
 *    Trade ID: 2110000000037247444 
 *    Order Price: 3567.21 
 *    Order quantity: 0.98115 
 *    Execution fee: 0.00098115 
 *    Fee token ID: ETH 
 *    Create Time: 2024-06-15 22:41:19 
 *    Is Buyer: 0 
 *    Is Maker: 1 
 *    Match Order ID: 1709222503263505408 
 *    Maker Rebate: 0 
 *    Execution Time: 2024-06-15 22:41:19 
 */
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryRequestInterface
{
    /**
     * Символьный код торговой пары
     * @param string $symbol
     * @return ITradeHistoryRequestInterface
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Системный идентификатор ордера
     * @param int $orderId
     * @return ITradeHistoryRequestInterface
     */
    public function setOrderId(int $orderId): self;
    public function getOrderId(): int;

    /**
     * Время до которого нужно получить записи, формат: Y-m-d H:i:s
     * @param int $endTime
     * @return ITradeHistoryRequestInterface
     */
    public function setEndTime(int $endTime): self;
    public function getEndTime(): int;

    /**
     * Время от которого нужно получить записи, формат: Y-m-d H:i:s
     * @param int $startTime
     * @return ITradeHistoryRequestInterface
     */
    public function setStartTime(int $startTime): self;
    public function getStartTime(): int;

    /**
     * По умолчанию: 50, максимальное значение - 50
     * @param int $limit
     * @return ITradeHistoryRequestInterface
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * Показать записи идентификатор трейда которых меньше переданного в этом параметре
     * @param int $toTradeId
     * @return ITradeHistoryRequestInterface
     */
    public function setToTradeId(int $toTradeId): self;
    public function getToTradeId(): int;

    /**
     * Показать записи идентификатор трейда которых больше переданного в этом параметре
     * @param int $fromTradeId
     * @return ITradeHistoryRequestInterface
     */
    public function setFromTradeId(int $fromTradeId): self;
    public function getFromTradeId(): int;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces\ITradeHistoryRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: left">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Request\TradeHistoryRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 45%; text-align: center">МЕТОД</th>
    <th style="width: 5%; text-align: center">ОБЯЗАТЕЛЬНО</th>
    <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setSymbol(string $symbol)</td>
    <td>НЕТ</td>
    <td><p>Символьный код торговой пары</p></td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setOrderId(string $orderId)</td>
    <td>НЕТ</td>
    <td><p>Системный идентификатор ордера</p></td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setEndTime(string $endTime)</td>
    <td>НЕТ</td>
    <td><p>Время до которого нужно получить записи, формат: Y-m-d H:i:s</p></td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setStartTime(string $dateTime)</td>
    <td>НЕТ</td>
    <td>
        <p>Время от которого нужно получить записи, формат: Y-m-d H:i:s</p>
    </td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setLimit(int $limit)</td>
    <td>НЕТ</td>
    <td><p>По умолчанию: 50, максимальное значение - 50</p></td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setToTradeId(int $toTradeId)</td>
    <td>НЕТ</td>
    <td>
        <p>Показать записи идентификатор трейда которых меньше переданного в этом параметре</p>
    </td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setFromTradeId(int $fromTradeId)</td>
    <td>НЕТ</td>
    <td>
        <p>Показать записи идентификатор трейда которых больше переданного в этом параметре</p>
    </td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>RESPONSE STRUCTURE</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryResponseInterface
{
    /**
     * @return ITradeHistoryResponseItemInterface[]
     */
    public function getTradeHistory(): array;
}
```

<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces\ITradeHistoryResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Response\TradeHistoryResponse::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
    <tr>
     <td>IOrderHistoryResponseInterface::getOrderHistory()</td>
     <td style="text-align: center">ITradeHistoryResponseItemInterface[]</td>
     <td><p>Возвращает массив трейдов пользователя</p></td>
   </tr>
</table>


<br />


```php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryResponseItemInterface
{
    /**
     * Символьный код торговой пары
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Не имеет значения для использования API. В этом поле отображается «Идентификатор транзакции» из раздела «История торговли» на веб-сайте.
     * @return int
     */
    public function getId(): int;

    /**
     * Системный идентификатор заказа
     * @return int
     */
    public function getOrderId(): int;

    /**
     * Системный идентификатор трейда
     * @return int
     */
    public function getTradeId(): int;

    /**
     * Цена последней сделки
     * @return float
     */
    public function getOrderPrice(): float;

    /**
     * Объем ордера
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Торговая комиссия (за одно заполнение)
     * @return float
     */
    public function getExecFee(): float;

    /**
     * Идентификатор токена комиссии
     * @return string
     */
    public function getFeeTokenId(): string;

    /**
     * Время создания ордера
     * @return \DateTime
     */
    public function getCreatTime(): \DateTime;

    /**
     * 0：Покупатель, 1：Продавец
     * @return int
     */
    public function getIsBuyer(): int;

    /**
     * 0：Maker, 1：Taker
     * @return int
     */
    public function getIsMaker(): int;

    /**
     * Идентификатор ордера трейдера-оппонента
     * @return int
     */
    public function getMatchOrderId(): int;

    /**
     * Скидка мейкера
     * @return int
     */
    public function getMakerRebate(): int;

    /**
     * Время исполнения ордера
     * @return \DateTime
     */
    public function getExecutionTime(): \DateTime;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>ИНТЕРФЕЙС</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces\ITradeHistoryResponseItemInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Response\TradeHistoryResponseItem::class</b>
    </td>
  </tr>
  <tr>
     <th style="width: 30%; text-align: center">МЕТОД</th>
     <th style="width: 20%; text-align: center">ТИП</th>
     <th style="width: 50%; text-align: center">ОПИСАНИЕ</th>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Символьный код торговой пары</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getId()</td>
     <td style="text-align: center">int</td>
     <td><p>Не имеет значения для использования API. В этом поле отображается «Идентификатор транзакции» из раздела «История торговли» на веб-сайте.</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getOrderId()</td>
     <td style="text-align: center">int</td>
     <td><p>Системный идентификатор ордера</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getTradeId()</td>
     <td style="text-align: center">int</td>
     <td><p>Системный идентификатор трейда</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Цена последней сделки</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Объем ордера</p></td>
    </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getExecQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Исполненный объем ордера</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getFeeTokenId()</td>
     <td style="text-align: center">string</td>
     <td><p>Идентификатор токена комиссии</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getCreatTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Время создания ордера</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getIsBuyer()</td>
     <td style="text-align: center">int</td>
     <td><p>0：Покупатель, 1：Продавец</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getIsMaker()</td>
     <td style="text-align: center">int</td>
     <td><p>0：Maker, 1：Taker</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getMatchOrderId()</td>
     <td style="text-align: center">string</td>
     <td><p>Идентификатор ордера трейдера-оппонента</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getMakerRebate()</td>
     <td style="text-align: center">int</td>
     <td><p>Скидка мейкера</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getExecutionTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Время исполнения ордера</p></td>
   </tr>
</table>