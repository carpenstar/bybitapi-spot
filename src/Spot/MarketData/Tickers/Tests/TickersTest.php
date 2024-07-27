<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Tests;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Builders\ResponseHandlerBuilder;
use Carpenstar\ByBitAPI\Core\Builders\RestBuilder;
use Carpenstar\ByBitAPI\Core\Enums\EnumOutputMode;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseDto;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Overrides\TestTickers;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Request\TickersRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Response\TickersResponse;
use PHPUnit\Framework\TestCase;

class TickersTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"t":1683986136017,"s":"BTCUSDT","bp":"26799.99","ap":"26810.3","lp":"26810.3","o":"26875.03","h":"28073.41","l":"25992.06","v":"2389.959483","qv":"65100545.90244497"},"retExtInfo":{},"time":1683986136450}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), TickersResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(TickersResponse::class, $data->getResult());

        /** @var TickersResponse $tickerInfo */
        $tickerInfo = $data->getResult();

        $this->assertInstanceOf(\DateTime::class, $tickerInfo->getTime());
        $this->assertEquals('BTCUSDT', $tickerInfo->getSymbol());
        $this->assertEquals(26810.3, $tickerInfo->getLastTradedPrice());
        $this->assertEquals(28073.41, $tickerInfo->getHighPrice());
        $this->assertEquals(25992.06, $tickerInfo->getLowPrice());
        $this->assertEquals(26875.03, $tickerInfo->getOpenPrice());
        $this->assertEquals(26799.99, $tickerInfo->getBestBidPrice());
        $this->assertEquals(26810.3, $tickerInfo->getBestAskPrice());
        $this->assertEquals(2389.959483, $tickerInfo->getTradingVolume());
        $this->assertEquals(65100545.90244497, $tickerInfo->getTradingQuoteVolume());
    }
}
