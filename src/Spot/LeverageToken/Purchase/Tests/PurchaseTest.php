<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Response\PurchaseResponse;
use PHPUnit\Framework\TestCase;

class PurchaseTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"amount":"100","id":"2085","ltCode":"DOT3LUSDT","orderAmount":"","orderQuantity":"","orderStatus":"2","serialNo":"x005","timestamp": 1662549845373,"valueCoin":"USDT"},"retExtInfo":{},"time":1662549845453}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), PurchaseResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(PurchaseResponse::class, $data->getResult());

        /** @var PurchaseResponse $purchaseInfo */
        $purchaseInfo = $data->getResult();

        $this->assertInstanceOf(\DateTime::class, $purchaseInfo->getTimestamp());
        $this->assertEquals(100, $purchaseInfo->getAmount());
        $this->assertEquals(2085, $purchaseInfo->getId());
        $this->assertEquals('DOT3LUSDT', $purchaseInfo->getLtCode());
        $this->assertEquals(0.0, $purchaseInfo->getOrderAmount());
        $this->assertEquals(0.0, $purchaseInfo->getOrderQuantity());
        $this->assertEquals(2, $purchaseInfo->getOrderStatus());
        $this->assertEquals('x005', $purchaseInfo->getSerialNo());
        $this->assertEquals('USDT', $purchaseInfo->getValueCoin());
    }
}