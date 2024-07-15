# Market Data - Order Book
<b>[Official documentation](https://bybit-exchange.github.io/docs/spot/public/depth)</b>

```php
// Endpoint classname
\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\OrderBook::class
```

<br />

<h3 align="left" width="100%"><b>EXAMPLE</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Request\OrderBookRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\OrderBook;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookPriceResponse;

$bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'apiKey', 'apiSecret');

/** @var \Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookResponseInterface $orderBook */
$orderBook = $bybit->publicEndpoint(OrderBook::class, 
    (new OrderBookRequest())->setSymbol("ETHUSDT")
        ->setScale(1)
        ->setLimit(5)
    )->execute()
    ->getResult();


echo "Time: {$orderBook->getTime()->format('Y-m-d H:i:s')} \n";
echo "---\n";
/** @var \Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookPriceResponseInterface $bid */
foreach ($orderBook->getBids()->all() as $bid) {
    echo " - Bid Price: {$bid->getPrice()} Bid Quantity: {$bid->getQuantity()} \n";
}
echo "---\n";
/** @var \Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookPriceResponseInterface $ask */
foreach ($orderBook->getAsks()->all() as $ask) {
    echo " - Ask Price: {$ask->getPrice()} Ask Quantity: {$ask->getQuantity()} \n";
}
echo "---\n";
        
/**
* Time: 2024-06-16 17:45:15
* ---
*  - Bid Price: 3578.6 Bid Quantity: 209.15826 
*  - Bid Price: 3568.4 Bid Quantity: 452.08023 
*  - Bid Price: 3567.2 Bid Quantity: 409.5493 
*  - Bid Price: 3566.3 Bid Quantity: 440.48361 
*  - Bid Price: 3566 Bid Quantity: 173.67083 
* ---
*  - Ask Price: 3581.5 Ask Quantity: 176.0028 
*  - Ask Price: 3581.6 Ask Quantity: 434.83865 
*  - Ask Price: 3581.8 Ask Quantity: 1.29348 
*  - Ask Price: 3582.5 Ask Quantity: 0.00045 
*  - Ask Price: 3583.1 Ask Quantity: 478.33371 
* ---
*/
```

<br />

<h3 align="left" width="100%"><b>REQUEST PARAMETERS</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookRequestInterface
{
     public function setSymbol(string $symbol): self; // Trading instrument
     public function setLimit(int $limit): self; //
    
     // .. Getters
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookRequestInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Request\OrderBookRequest::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 40%; text-align: center">Method</th>
     <th style="width: 10%; text-align: center">Required</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOrderBookRequestInterface::setSymbol(string $symbol)</td>
     <td style="text-align: center"><b>YES</b></td>
     <td>Trading instrument</td>
   </tr>
   <tr>
     <td>IOrderBookRequestInterface::setLimit(int $limit)</td>
     <td style="text-align: center">NO</td>
     <td> Data size limit. [1, 200]. Default: 100 (50 ask + 50 bid) </td>
   </tr>
</table>

<br />

<h3 align="left" width="100%"><b>RESPONSE STRUCTURE</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookResponseInterface
{
     public function getTime(): \DateTime; // Request execution time
     public function getAsks(): EntityCollection;
     public function getBids(): EntityCollection;
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup><br />
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOrderBookResponseInterface::getTime()</td>
     <td style="text-align: center">DateTime</td>
     <td> - </td>
   </tr>
   <tr>
     <td>IOrderBookResponseInterface::getAsks()</td>
     <td style="text-align: center">IOrderBookPriceResponseInterface[]</td>
     <td> - </td>
   </tr>
   <tr>
     <td>IOrderBookResponseInterface::getBids()</td>
     <td style="text-align: center">IOrderBookPriceResponseInterface[]</td>
     <td> - </td>
   </tr>
</table>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookPriceResponseInterface
{
     public function getPrice(): float;
     public function getQuantity(): float;
}
```
<table style="width: 100%">
   <tr>
     <td colspan="3">
         <sup><b>INTERFACE</b></sup><br/>
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookPriceResponseInterface::class</b>
     </td>
   </tr>
   <tr>
     <td colspan="3">
         <sup><b>DTO</b></sup><br/>
         <b>\Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookPriceItemResponse::class</b>
     </td>
   </tr>
   <tr>
     <th style="width: 30%; text-align: center">Method</th>
     <th style="width: 20%; text-align: center">Type</th>
     <th style="width: 50%; text-align: center">Description</th>
   </tr>
   <tr>
     <td>IOrderBookPriceResponseInterface::getPrice()</td>
     <td style="text-align: center">float</td>
     <td> Price </td>
   </tr>
   <tr>
     <td>IOrderBookPriceResponseInterface::getQuantity()</td>
     <td style="text-align: center">float</td>
     <td> Number of tokens at this price </td>
   </tr>
</table>

---