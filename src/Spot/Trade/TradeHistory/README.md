### SPOT - Trade - Trade History
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/trade/my-trades)</b>

<p>Returns order history</p>

<ul>
    <li>If startTime is not specified, you can only query for records in the last 7 days.</li>
    <li>If you want to query for records older than 7 days, startTime is required.</li>
    <li>It supports to query records up to 180 days.</li>
</ul>

> If the orderId is null, fromTicketId is passed, and toTicketId is null, then the result is sorted by ticketId in ascend. Otherwise, the result is sorted by ticketId in descend.

```php
// Endpoint class:
\Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\TradeHistory::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

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

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return ITradeHistoryRequestInterface
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Order ID
     * @param int $orderId
     * @return ITradeHistoryRequestInterface
     */
    public function setOrderId(int $orderId): self;
    public function getOrderId(): int;

    /**
     * End datetime, eq Y-m-d H:i:s
     * @param int $endTime
     * @return ITradeHistoryRequestInterface
     */
    public function setEndTime(int $endTime): self;
    public function getEndTime(): int;

    /**
     * Start datetime, eq Y-m-d H:i:s
     * @param int $startTime
     * @return ITradeHistoryRequestInterface
     */
    public function setStartTime(int $startTime): self;
    public function getStartTime(): int;

    /**
     * Default value is 50, max 50
     * @param int $limit
     * @return ITradeHistoryRequestInterface
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * Query smaller than the trade ID
     * @param int $toTradeId
     * @return ITradeHistoryRequestInterface
     */
    public function setToTradeId(int $toTradeId): self;
    public function getToTradeId(): int;

    /**
     * Query greater than the trade ID
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
        <sup><b>INTERFACE</b></sup> <br />
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
    <th style="width: 45%; text-align: center">Method</th>
    <th style="width: 5%; text-align: center">Required</th>
    <th style="width: 50%; text-align: center">Description</th>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setSymbol(string $symbol)</td>
    <td>NO</td>
    <td><p>Name of the trading pair</p></td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setOrderId(string $orderId)</td>
    <td>NO</td>
    <td><p>Specify orderId to return all the orders that orderId of which are smaller than this particular one for pagination purpose</p></td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setEndTime(string $endTime)</td>
    <td>NO</td>
    <td>
        <p>The end string datetime, eq: Y-m-d H:i:s</p>
    </td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setStartTime(string $dateTime)</td>
    <td>NO</td>
    <td>
        <p>The start string datetime, eq: Y-m-d H:i:s</p>
    </td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setLimit(int $limit)</td>
    <td>NO</td>
    <td>
        <p>Limit for data size. [1, 500]. Default: 500</p>
    </td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setToTradeId(int $toTradeId)</td>
    <td>NO</td>
    <td>
        <p>Query smaller than the trade ID</p>
    </td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setToTradeId(int $toTradeId)</td>
    <td>NO</td>
    <td>
        <p>Query smaller than the trade ID</p>
    </td>
  </tr>
  <tr>
    <td>ITradeHistoryRequestInterface::setFromTradeId(int $fromTradeId)</td>
    <td>NO</td>
    <td>
        <p>Query greater than the trade ID</p>
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
        <sup><b>INTERFACE</b></sup> <br />
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
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
    <tr>
     <td>IOrderHistoryResponseInterface::getOrderHistory()</td>
     <td style="text-align: center">ITradeHistoryResponseItemInterface[]</td>
     <td><p>Returns an array of trade history data</p></td>
   </tr>
</table>


<br />


```php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryResponseItemInterface
{
    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Irrelevant for API usage. This field reflects the "Transaction ID" from the Trade History section of the website
     * @return int
     */
    public function getId(): int;

    /**
     * Order ID
     * @return int
     */
    public function getOrderId(): int;

    /**
     * The ID for the trade
     * @return int
     */
    public function getTradeId(): int;

    /**
     * Last traded price
     * @return float
     */
    public function getOrderPrice(): float;

    /**
     * Order quantity
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Trading fee (for a single fill)
     * @return float
     */
    public function getExecFee(): float;

    /**
     * Fee Token ID
     * @return string
     */
    public function getFeeTokenId(): string;

    /**
     * Order created time in the match engine
     * @return \DateTime
     */
    public function getCreatTime(): \DateTime;

    /**
     * 0：Buyer, 1：Seller
     * @return int
     */
    public function getIsBuyer(): int;

    /**
     * 0：Maker, 1：Taker
     * @return int
     */
    public function getIsMaker(): int;

    /**
     * Order ID of the opponent trader
     * @return int
     */
    public function getMatchOrderId(): int;

    /**
     * Maker rebate
     * @return int
     */
    public function getMakerRebate(): int;

    /**
     * Order execution time
     * @return \DateTime
     */
    public function getExecutionTime(): \DateTime;
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
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
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getSymbol()</td>
     <td style="text-align: center">string</td>
     <td><p>Name of the trading pair</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getId()</td>
     <td style="text-align: center">int</td>
     <td><p>Irrelevant for API usage. This field reflects the "Transaction ID" from the Trade History section of the website</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getOrderId()</td>
     <td style="text-align: center">int</td>
     <td><p>Order ID</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getTradeId()</td>
     <td style="text-align: center">int</td>
     <td><p>The ID for the trade</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getOrderPrice()</td>
     <td style="text-align: center">float</td>
     <td><p>Order price</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getOrderQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Order quantity</p></td>
    </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getExecQty()</td>
     <td style="text-align: center">float</td>
     <td><p>Executed quantity</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getFeeTokenId()</td>
     <td style="text-align: center">string</td>
     <td><p>Fee Token ID</p></td>
   </tr>
   <tr>
     <td>ITradeHistoryResponseItemInterface::getCreatTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Order created time in the match engine</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getIsBuyer()</td>
     <td style="text-align: center">int</td>
     <td><p>0：Buyer, 1：Seller</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getIsMaker()</td>
     <td style="text-align: center">int</td>
     <td><p>0：Maker, 1：Taker</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getMatchOrderId()</td>
     <td style="text-align: center">string</td>
     <td><p>Order ID of the opponent trader</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getMakerRebate()</td>
     <td style="text-align: center">int</td>
     <td><p>Maker rebate</p></td>
   </tr>
    <tr>
     <td>ITradeHistoryResponseItemInterface::getExecutionTime()</td>
     <td style="text-align: center">\DateTime</td>
     <td><p>Order execution time</p></td>
   </tr>
</table>