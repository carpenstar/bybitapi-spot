<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookResponse;
use PHPUnit\Framework\TestCase;

class OrderBookTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"asks":[["26847.07","0.026755"],["26847.09","0.018993"],["26847.11","0.023623"],["26847.13","0.054235"],["26847.15","0.02979"]],"bids":[["26844.02","0.017595"],["26844","0.020731"],["26843.98","0.039244"],["26843.96","0.035931"],["26843.94","0.053928"]],"time":1683984334496},"retExtInfo":{},"time":1683984334496}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), OrderBookResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(OrderBookResponse::class, $data->getResult());

        /** @var OrderBookResponse $orderbookInfo */
        $orderbookInfo = $data->getResult();

        $this->assertInstanceOf(\DateTime::class, $orderbookInfo->getTime());

        $ask = current($orderbookInfo->getAsks()->all());
        $this->assertEquals(26847.07, $ask->getPrice());
        $this->assertEquals(0.026755, $ask->getQuantity());

        $bid = current($orderbookInfo->getBids()->all());
        $this->assertEquals(26844.02, $bid->getPrice());
        $this->assertEquals(0.017595, $bid->getQuantity());
    }
}
