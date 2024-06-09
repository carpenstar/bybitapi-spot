# Market Data - Kline
<b>[Официальная страница документации](https://bybit-exchange.github.io/docs/spot/public/kline)</b>

> Эндпоинт возвращает результаты только последних 1000 свечей независимо от того, какой интервал указан.

> Если startTime и endTime не указаны, будут отправлены только последние свечи.


```php
// Класс эндпоинта:
\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Kline::class
```

<br />

<h3 align="left" width="100%"><b>ПРИМЕР</b></h3>

---

```php
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline;

$bybitApiData = (new BybitAPI())
    ->setCredentials('https://api-testnet.bybit.com','apiKey', 'apiSecret')
    ->publicEndpoint(Kline::class, (new KlineRequest())->setSymbol("ATOMUSDT")->setInterval(EnumIntervals::MINUTE1)->setLimit(5))
    ->execute();


echo "Return code: {$bybitApiData->getReturnCode()} \n";
echo "Return message: {$bybitApiData->getReturnMessage()} \n";

/**
* @var KlineResponseItem[] $listKline
*/
$listKline = $bybitApiData->getResult()->getKlineList();
foreach ($listKline as $kline) {
    echo " ----- \n";
    echo "  Time: {$kline->getTime()->format('Y-m-d H:i:s')} \n";
    echo "  Symbol: {$kline->getSymbol()} \n";
    echo "  Alias: {$kline->getAlias()} \n";
    echo "  Close Price: {$kline->getClosePrice()} \n";
    echo "  High Price: {$kline->getHighPrice()} \n";
    echo "  Low Price: {$kline->getLowPrice()} \n";
    echo "  Open Price: {$kline->getOpenPrice()} \n";
    echo "  Trading Volume: {$kline->getTradingVolume()} \n";
}

/**
* Return code: 0
* Return message: OK
* -----
*   Time: 2024-06-16 17:09:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:10:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:11:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:12:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
* -----
*   Time: 2024-06-16 17:13:00
*   Symbol: ATOMUSDT
*   Alias: ATOMUSDT
*   Close Price: 110
*   High Price: 110
*   Low Price: 110
*   Open Price: 110
*   Trading Volume: 0
*/
```

<br />

<h3 align="left" width="100%"><b>ПАРАМЕТРЫ ЗАПРОСА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineRequestInterface
{
    public function setSymbol(string $symbol): self; // Торговый инструмент
    public function setLimit(int $limit): self; // Лимит на количество получаемых тиков. [1, 1000]. По умолчанию: 1000
    public function setInterval(string $interval): self; // Размер тика. Доступные значения: 1m, 3m, 5m, 15m, 30m, 1h, 2h, 4h, 6h, 12, 1d, 1w, 1M
    public function setStartTime(int $timestamp): self; // Таймштамп ОТ которого получаем срез данных
    public function setEndTime(int $timestamp): self; // Таймштамп ДО которого получаем срез данных
    
    // .. Getters
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineRequestInterface::class</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse::class</b>
    </td>
  </tr>
  <tr>
    <th style="width: 40%; text-align: center">Метод</th>
    <th style="width: 10%; text-align: center">Обязательно</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setSymbol(string $symbol): self</td>
    <td style="text-align: center"><b>ДА</b></td>
    <td> Торговый инструмент</td>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setInterval(string $interval): self</td>
    <td style="text-align: center"><b>ДА</b></td>
    <td> 
        Размер тика. Доступные значения: 1m, 3m, 5m, 15m, 30m, 1h, 2h, 4h, 6h, 12, 1d, 1w, 1M
    </td>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setLimit(int $limit): self</td>
    <td style="text-align: center">НЕТ</td>
    <td> Лимит на количество получаемых тиков. [1, 1000]. По умолчанию: 1000 </td>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setStartTime(int $startTime): self</td>
    <td style="text-align: center">НЕТ</td>
    <td> Таймштамп ОТ которого получаем срез данных </td>
  </tr>
  <tr>
    <td>IKlineRequestInterface::setEndTime(int $endTime): self</td>
    <td style="text-align: center">НЕТ</td>
    <td> Таймштамп ДО которого получаем срез данных </td>
  </tr>
</table>

<br />

<h3 align="left" width="100%"><b>CТРУКТУРА ОТВЕТА</b></h3>

---

```php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineResponseInterface
{
    public function getTime(): \DateTime; // Время начала тика
    public function getSymbol(): string; // Торговый инструмент
    public function getAlias(): string; // Алиас
    public function getClosePrice(): float; // Цена закрытия тика
    public function getHighPrice(): float; // Максимальная цена тика
    public function getLowPrice(): float; // Минимальная цена тика
    public function getOpenPrice(): float; // Цена открытия тика
    public function getTradingVolume(): float; // Торговый обьем
}
```
<table style="width: 100%">
  <tr>
    <td colspan="3">
        <sup><b>INTERFACE</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineResponseInterface</b>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <sup><b>DTO</b></sup> <br />
        <b>\Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse</b>
    </td>
  </tr>
  <tr>
    <th style="width: 30%; text-align: center">Метод</th>
    <th style="width: 20%; text-align: center">Тип</th>
    <th style="width: 50%; text-align: center">Описание</th>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getTime()</td>
    <td style="text-align: center">DateTime</td>
    <td> Время начала тика </td>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getSymbol()</td>
    <td style="text-align: center">string</td>
    <td> Торговый инструмент </td>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getAlias()</td>
    <td style="text-align: center">string</td>
    <td> Алиас </td>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getClosePrice()</td>
    <td style="text-align: center">float</td>
    <td> Цена закрытия тика </td>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getHighPrice()</td>
    <td style="text-align: center">float</td>
    <td> Максимальная цена тика </td>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getLowPrice()</td>
    <td style="text-align: center">float</td>
    <td> Минимальная цена тика </td>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getOpenPrice()</td>
    <td style="text-align: center">float</td>
    <td> Цена открытия тика </td>
  </tr>
  <tr>
    <td>IKlineResponseInterface::getTradingVolume()</td>
    <td style="text-align: center">float</td>
    <td> Торговый обьем </td>
  </tr>
</table>

---