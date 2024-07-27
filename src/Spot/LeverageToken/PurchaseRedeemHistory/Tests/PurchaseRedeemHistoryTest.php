<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Response\PurchaseRedeemHistoryResponse;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Response\PurchaseRedeemHistoryResponseItem;
use PHPUnit\Framework\TestCase;

class PurchaseRedeemHistoryTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[{"amount":"","excTime":1662549752000,"fee":"","ltCode":"DOT3L","orderId":"2083","orderStatus":"3","orderTime":1662549752000,"orderType":1,"serialNo":"x003","value":"","valueCoin":"USDT"},{"amount":"","excTime":1662549702000,"fee":"","ltCode":"DOT3L","orderId":"2082","orderStatus":"3","orderTime":1662549702000,"orderType":1,"serialNo":"x002","value":"","valueCoin":"USDT"}]},"retExtInfo":{},"time":1662608374640}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), PurchaseRedeemHistoryResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(PurchaseRedeemHistoryResponse::class, $data->getResult());

        /** @var PurchaseRedeemHistoryResponseItem $purchaseHistoryInfo */
        $purchaseHistoryInfo = current($data->getResult()->getPurchaseHistory());

        $this->assertInstanceOf(\DateTime::class, $purchaseHistoryInfo->getExecTime());
        $this->assertInstanceOf(\DateTime::class, $purchaseHistoryInfo->getOrderTime());
        $this->assertEquals(0.0, $purchaseHistoryInfo->getAmount());
        $this->assertEquals(0.0, $purchaseHistoryInfo->getFee());
        $this->assertEquals('DOT3L', $purchaseHistoryInfo->getLtCode());
        $this->assertEquals(2083, $purchaseHistoryInfo->getOrderId());
        $this->assertEquals(3, $purchaseHistoryInfo->getOrderStatus());
        $this->assertEquals(1, $purchaseHistoryInfo->getOrderType());
        $this->assertEquals('x003', $purchaseHistoryInfo->getSerialNo());
        $this->assertEquals(0.0, $purchaseHistoryInfo->getValue());
        $this->assertEquals('USDT', $purchaseHistoryInfo->getValueCoin());
    }
}
