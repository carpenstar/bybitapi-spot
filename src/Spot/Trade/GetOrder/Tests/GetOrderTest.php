<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Enums\EnumOrderType;
use Carpenstar\ByBitAPI\Core\Enums\EnumSide;
use Carpenstar\ByBitAPI\Core\Exceptions\SDKException;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\GetOrder;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Request\GetOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Response\GetOrderResponse;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\PlaceOrder;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Request\PlaceOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response\PlaceOrderResponse;
use PHPUnit\Framework\TestCase;

class GetOrderTest extends TestCase
{
    /**
     * Тестирование заполнения структуры ответа
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"accountId":"1111837","symbol":"BTCUSDT","orderLinkId":"64c7ef2bdf040","orderId":"1477137337600322304","orderPrice":"1000","orderQty":"0.001","execQty":"0","cummulativeQuoteQty":"0","avgPrice":"0","status":"NEW","timeInForce":"GTC","orderType":"LIMIT","side":"BUY","stopPrice":"0.0","icebergQty":"0.0","createTime":"1690824492584","updateTime":"1690824492595","isWorking":"1","locked":"1","orderCategory":0,"blockTradeId":"","smpType":"None","cancelType":"UNKNOWN","smpGroup":0,"smpOrderId":""},"retExtInfo":{},"time":1690834565801}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), GetOrderResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(GetOrderResponse::class, $data->getResult());

        /** @var GetOrderResponse $orderInfo */
        $orderInfo = $data->getResult();

        $this->assertIsInt($orderInfo->getOrderId());
        $this->assertIsString($orderInfo->getOrderLinkId());
        $this->assertIsString($orderInfo->getSymbol());
        $this->assertIsString($orderInfo->getStatus());
        $this->assertIsInt($orderInfo->getAccountId());
        $this->assertIsFloat($orderInfo->getOrderPrice());
        $this->assertInstanceOf(\DateTime::class, $orderInfo->getCreateTime());
        $this->assertIsFloat($orderInfo->getOrderQty());
        $this->assertIsFloat($orderInfo->getExecQty());
        $this->assertIsString($orderInfo->getTimeInForce());
        $this->assertIsString($orderInfo->getOrderType());
        $this->assertIsString($orderInfo->getSide());
    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws SDKException
     */
    public function testGetOrderEndpoint()
    {
        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ');

        $params = (new PlaceOrderRequest())
            ->setSide(EnumSide::BUY)
            ->setOrderType(EnumOrderType::LIMIT)
            ->setOrderPrice(3000)
            ->setSymbol("ETHUSDT")
            ->setOrderQty(1);


        $placeOrderEndpoint = $bybit->privateEndpoint(PlaceOrder::class, $params)->execute();

        /** @var PlaceOrderResponse $orderInfo */
        $orderInfo = $placeOrderEndpoint->getResult();

        $this->assertNotEmpty($orderInfo->getOrderId());
        $this->assertNotEmpty($orderInfo->getOrderLinkId());
        $this->assertEquals('ETHUSDT', $orderInfo->getSymbol());
        $this->assertInstanceOf(\DateTime::class, $orderInfo->getCreateTime());
        $this->assertTrue($orderInfo->getOrderPrice() == 3000);
        $this->assertTrue($orderInfo->getOrderQty() == 1);
        $this->assertEquals(strtoupper(EnumOrderType::LIMIT), $orderInfo->getOrderType());
        $this->assertEquals(strtoupper(EnumSide::BUY), $orderInfo->getSide());
        $this->assertEquals('NEW', $orderInfo->getStatus());
        $this->assertEquals('GTC', $orderInfo->getTimeInForce());
        $this->assertNotEmpty($orderInfo->getAccountId());
        $this->assertEmpty($orderInfo->getTriggerPrice());

        $getOrderResponse = $bybit->privateEndpoint(GetOrder::class, (new GetOrderRequest())->setOrderId($orderInfo->getOrderId()))->execute();

        $this->assertEquals(0, $getOrderResponse->getReturnCode());
        $this->assertEquals('OK', $getOrderResponse->getReturnMessage());
        $this->assertInstanceOf(GetOrderResponse::class, $getOrderResponse->getResult());

        /** @var GetOrderResponse $getOrderInfo */
        $getOrderInfo = $getOrderResponse->getResult();

        $this->assertIsInt($getOrderInfo->getOrderId());
        $this->assertIsString($getOrderInfo->getOrderLinkId());
        $this->assertIsString($getOrderInfo->getSymbol());
        $this->assertIsString($getOrderInfo->getStatus());
        $this->assertIsInt($getOrderInfo->getAccountId());
        $this->assertIsFloat($getOrderInfo->getOrderPrice());
        $this->assertInstanceOf(\DateTime::class, $getOrderInfo->getCreateTime());
        $this->assertIsFloat($getOrderInfo->getOrderQty());
        $this->assertIsFloat($getOrderInfo->getExecQty());
        $this->assertIsString($getOrderInfo->getTimeInForce());
        $this->assertIsString($getOrderInfo->getOrderType());
        $this->assertIsString($getOrderInfo->getSide());
    }
}
