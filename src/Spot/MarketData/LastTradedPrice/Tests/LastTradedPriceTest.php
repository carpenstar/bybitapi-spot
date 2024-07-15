<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Builders\ResponseHandlerBuilder;
use Carpenstar\ByBitAPI\Core\Builders\RestBuilder;
use Carpenstar\ByBitAPI\Core\Enums\EnumOutputMode;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseDto;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\LastTradedPrice;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Overrides\TestLastTradedPrice;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Request\LastTradedPriceRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Response\LastTradedPriceResponse;
use PHPUnit\Framework\TestCase;

class LastTradedPriceTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"symbol":"BTCUSDT","price":"26386.61"},"retExtInfo":{},"time":1683982585451}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), LastTradedPriceResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(LastTradedPriceResponse::class, $data->getResult());

        /** @var LastTradedPriceResponse $klineInfo */
        $klineInfo = $data->getResult();

        $this->assertEquals('BTCUSDT', $klineInfo->getSymbol());
        $this->assertEquals(26386.61, $klineInfo->getPrice());
    }
}