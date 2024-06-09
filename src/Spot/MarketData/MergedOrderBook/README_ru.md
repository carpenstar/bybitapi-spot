# Market Data - Merged Order Book
<b>[Официальная страница документации](https://bybit-exchange.github.io/docs/spot/public/merge-depth)</b>

```php
// Класс эндпоинта:
\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\MergedOrderBook::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР ВЫЗОВА</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Request\MergedOrderBookRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\MergedOrderBook;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookPriceResponse;

$bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'apiKey', 'apiSecret');

/** @var \Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookResponseInterface $mergedOrderBook */
$mergedOrderBook = $bybit->publicEndpoint(MergedOrderBook::class, 
    (new MergedOrderBookRequest())->setSymbol("ETHUSDT")
        ->setScale(1)
        ->setLimit(5)
    )->execute()
    ->getResult();


echo "Time: {$mergedOrderBook->getTime()->format('Y-m-d H:i:s')} \n";
echo "---\n";
/** @var \Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookPriceResponseInterface $bid */
foreach ($mergedOrderBook->getBids()->all() as $bid) {
    echo " - Bid Price: {$bid->getPrice()} Bid Quantity: {$bid->getQuantity()} \n";
}
echo "---\n";
/** @var \Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookPriceResponseInterface $ask */
foreach ($mergedOrderBook->getAsks()->all() as $ask) {
    echo " - Ask Price: {$ask->getPrice()} Ask Quantity: {$ask->getQuantity()} \n";
}
echo "---\n";
        
/**
* Time: 2024-06-16 17:42:15
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

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookRequestInterface
{
    public function setSymbol(string $symbol): self; // Торговый инструмент
    public function setScale(int $scale): self; // Точность объединенной книги заказов: 1 означает 1 цифру.
    public function setLimit(int $limit): self; // Ограничение размера данных. [1, 200]. По умолчанию: 100 (50 ask + 50 bid)
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IMergedOrderBookRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Request\MergedOrderBookRequest::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 40%; text-align: center">Метод</th>
    <th style="width: 10%; text-align: center">Обязательно</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setSymbol(string $symbol)</td>
    <td style="text-align: center"><b>ДА</b></td>
    <td> Торговый инструмент</td>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setScale(int $scale)</td>
    <td style="text-align: center">НЕТ</td>
    <td> Точность объединенной книги заказов: 1 означает 1 цифру. </td>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setLimit(int $limit)</td>
    <td style="text-align: center">НЕТ</td>
    <td> Ограничение размера данных. [1, 200]. По умолчанию: 100 (50 ask + 50 bid) </td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>CТРУКТУРА ОТВЕТА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookResponseInterface
{
    public function getTime(): \DateTime; //
    public function getAsks(): EntityCollection; //
    public function getBids(): EntityCollection; //

}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces\ILastTradedPriceResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookResponse::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 30%; text-align: center">Метод</th>
    <th style="width: 20%; text-align: center">Тип</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>ILastTradedPriceResponseInterface::getTime()</td>
    <td style="text-align: center">DateTime</td>
    <td> Время исполнения запроса </td>
  </tr>
  <tr>
    <td>ILastTradedPriceResponseInterface::getAsks()</td>
    <td style="text-align: center">MergedOrderBookPriceItemResponse[]</td>
    <td> - </td>
  </tr>
  <tr>
    <td>ILastTradedPriceResponseInterface::getBids()</td>
    <td style="text-align: center">MergedOrderBookPriceItemResponse[]</td>
    <td> - </td>
  </tr>
</table>

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookPriceResponseInterface
{
    public function getPrice(): float;
    public function getQuantity(): float;
}
```

<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookPriceResponseInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookPriceItemResponse::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 30%; text-align: center">Метод</th>
    <th style="width: 20%; text-align: center">Тип</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>IMergedOrderBookPriceResponseInterface::getPrice()</td>
    <td style="text-align: center">float</td>
    <td> Цена </td>
  </tr>
  <tr>
    <td>IMergedOrderBookPriceResponseInterface::getQuantity()</td>
    <td style="text-align: center">float</td>
    <td> Количество токенов по этой цене </td>
  </tr>
</table>

---
