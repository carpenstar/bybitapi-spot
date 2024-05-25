# Market Data - Public Trading Records
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/recent-trade)</b>

<p align="center" width="100%"><b>EXAMPLE</b></p>

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Request\PublicTradingRecordsRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\PublicTradingRecords;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Response\PublicTradingRecordsResponse;

$bybit = new BybitAPI('https://api-testnet.bybit.com',"apiKey", "secret");

$options = (new PublicTradingRecordsRequest())
    ->setSymbol("BTCUSDT")
    ->setLimit(5);

/** @var PublicTradingRecordsResponse[] $publicTradingRecordsList */
$publicTradingRecordsList = $bybit->rest(PublicTradingRecords::class, $options)->getBody()->all();



foreach ($publicTradingRecordsList as $publicTradingRecord) {
    echo "Time: {$publicTradingRecord->getTime()->format('Y-m-d H:i:i')}" . PHP_EOL;
    echo "Price: {$publicTradingRecord->getPrice()}" . PHP_EOL;
    echo "Quantity: {$publicTradingRecord->getQuantity()}" . PHP_EOL;
    echo "Is Buyer Maker: {$publicTradingRecord->getIsBuyerMaker()}" . PHP_EOL;
    echo "Type: {$publicTradingRecord->getType()}" . PHP_EOL;
    echo "-----" . PHP_EOL;
}

/**
 * Result:
 *
 * Time: 2023-05-12 09:45:45
 * Price: 26327.59
 * Quantity: 0.00038
 * Is Buyer Maker: 1
 * Type: 0
 * -----
 * Time: 2023-05-12 09:45:45
 * Price: 26327.59
 * Quantity: 0.000342
 * Is Buyer Maker: 1
 * Type: 0
 * -----
 * Time: 2023-05-12 09:45:45
 * Price: 26327.59
 * Quantity: 0.00038
 * Is Buyer Maker: 1
 * Type: 0
 * -----
 * Time: 2023-05-12 09:45:45
 * Price: 26327.59
 * Quantity: 0.00019
 * Is Buyer Maker: 1
 * Type: 0
 * -----
 * Time: 2023-05-12 09:45:45
 * Price: 26327.59
 * Quantity: 0.00038
 * Is Buyer Maker: 1
 * Type: 0
 * -----
 */
```

---

<p align="center" width="100%"><b>REQUEST PARAMETERS</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Interfaces;

interface IPublicTradingRecordsRequestInterface
{
     public function setSymbol(string $symbol): self; // Trading instrument
     public function setLimit(int $limit): self; // Limit of returned records per request
    
     // .. Getters
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Interfaces\IPublicTradingRecordsRequestInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Request\PublicTradingRecordsRequest::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 40%; text-align: center">Method</th>
     <th style="width: 10%; text-align: center">Required</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IPublicTradingRecordsRequestInterface::setSymbol(string $symbol)</td>
     <td style="text-align: center"><b>YES</b></td>
     <td>Trading instrument</td>
   </tr>
   <tr>
     <td>IPublicTradingRecordsRequestInterface::setLimit(int $limit)</td>
     <td style="text-align: center">NO</td>
     <td>Limit of returned records per request </td>
   </tr>
</table>

---

<p align="center" width="100%"><b>RESPONSE STRUCTURE</b></p>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Interfaces;

interface IPublicTradingRecordsResponseInterface
{
     public function getPrice(): float; // Transaction price
     public function getQuantity(): float; // Transaction volume
     public function getTime(): \DateTime; // Deal time
     public function getIsBuyerMaker(): bool; // 0：Sell, 1：Buy
     public function getType(): int; // 0：regular trade, 1：over-the-counter (OTC) trade
}
```

<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Interfaces\IPublicTradingRecordsResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup> <br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Response\PublicTradingRecordsResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IPublicTradingRecordsResponseInterface::getPrice()</td>
     <td style="text-align: center">float</td>
     <td> Transaction price </td>
   </tr>
   <tr>
     <td>IPublicTradingRecordsResponseInterface::getQuantity()</td>
     <td style="text-align: center">float</td>
     <td> Transaction volume </td>
   </tr>
   <tr>
     <td>IPublicTradingRecordsResponseInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> Trade time </td>
   </tr>
   <tr>
     <td>IPublicTradingRecordsResponseInterface::getIsBuyerMaker()</td>
     <td style="text-align: center">bool</td>
     <td> 0：Sell, 1：Buy </td>
   </tr>
   <tr>
     <td>IPublicTradingRecordsResponseInterface::getType()</td>
     <td style="text-align: center">int</td>
     <td> 0：regular trade, 1：over-the-counter (OTC) trade </td>
   </tr>
</table>

---