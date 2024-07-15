<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Builders\ResponseHandlerBuilder;
use Carpenstar\ByBitAPI\Core\Builders\RestBuilder;
use Carpenstar\ByBitAPI\Core\Enums\EnumOutputMode;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseDto;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookPriceResponseInterface;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookResponseInterface;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\MergedOrderBook;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Overrides\TestMergedOrderBook;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Request\MergedOrderBookRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookPriceItemResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookResponse;
use PHPUnit\Framework\TestCase;

class MergedOrderBookTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"asks":[["26796.1","0.011429"],["26796.9","0.000958"],["26800","0.026581"],["26807.7","0.000135"],["26810.2","0.000592"]],"bids":[["26796","0.077068"],["26795.9","0.115983"],["26711","0.002177"],["26693.1","0.001057"],["26683.9","0.001006"]],"time":1683983945762},"retExtInfo":{},"time":1683983945762}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), MergedOrderBookResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(MergedOrderBookResponse::class, $data->getResult());

        /** @var MergedOrderBookResponse $orderbookInfo */
        $orderbookInfo = $data->getResult();

        $this->assertInstanceOf(\DateTime::class, $orderbookInfo->getTime());

        $ask = current($orderbookInfo->getAsks()->all());
        $this->assertEquals(26796.1, $ask->getPrice());
        $this->assertEquals(0.011429, $ask->getQuantity());

        $bid = current($orderbookInfo->getBids()->all());
        $this->assertEquals(26796, $bid->getPrice());
        $this->assertEquals(0.077068, $bid->getQuantity());
    }
}