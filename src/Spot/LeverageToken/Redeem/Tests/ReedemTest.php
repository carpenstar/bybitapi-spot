<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Response\ReedemResponse;
use PHPUnit\Framework\TestCase;

class ReedemTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"id":"2087","ltCode":"DOT3LUSDT","orderAmount":"","orderQuantity":"50","orderStatus":"2","quantity":"","serialNo":"r001","timestamp":1662605726326,"valueCoin":"DOT3L"},"retExtInfo":{},"time":1662605727987}';;
        $data = (new CurlResponseHandler())->build(json_decode($json, true), ReedemResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(ReedemResponse::class, $data->getResult());

        /** @var ReedemResponse $reedemInfo */
        $reedemInfo = $data->getResult();

        $this->assertInstanceOf(\DateTime::class, $reedemInfo->getTimestamp());
        $this->assertEquals('2087', $reedemInfo->getId());
        $this->assertEquals('DOT3LUSDT', $reedemInfo->getLtCode());
        $this->assertEquals(0, $reedemInfo->getOrderAmount());
        $this->assertEquals(50, $reedemInfo->getOrderQuantity());
        $this->assertEquals(2, $reedemInfo->getOrderStatus());
        $this->assertEquals(0, $reedemInfo->getQuantity());
        $this->assertEquals('r001', $reedemInfo->getSerialNo());
        $this->assertEquals('DOT3L', $reedemInfo->getValueCoin());
    }
}