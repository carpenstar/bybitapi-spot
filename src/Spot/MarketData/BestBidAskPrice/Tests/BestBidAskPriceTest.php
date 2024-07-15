<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Response\BestBidAskPriceResponse;
use PHPUnit\Framework\TestCase;

class BestBidAskPriceTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"symbol":"BTCUSDT","bidPrice":"26298.69","bidQty":"0.106418","askPrice":"26298.7","askQty":"0.008773","time":1683979447464},"retExtInfo":{},"time":1683979447820}';;
        $data = (new CurlResponseHandler())->build(json_decode($json, true), BestBidAskPriceResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(BestBidAskPriceResponse::class, $data->getResult());

        /** @var BestBidAskPriceResponse $priceInfo */
        $priceInfo = $data->getResult();

        $this->assertInstanceOf(\DateTime::class, $priceInfo->getTime());
        $this->assertEquals('BTCUSDT', $priceInfo->getSymbol());
        $this->assertEquals(26298.69, $priceInfo->getBidPrice());
        $this->assertEquals(0.106418, $priceInfo->getBidQty());
        $this->assertEquals(26298.7, $priceInfo->getAskPrice());
        $this->assertEquals(0.008773, $priceInfo->getAskQty());
    }
}