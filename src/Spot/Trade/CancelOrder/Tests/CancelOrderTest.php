<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Enums\EnumOrderType;
use Carpenstar\ByBitAPI\Core\Enums\EnumSide;
use Carpenstar\ByBitAPI\Core\Exceptions\SDKException;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\CancelOrder;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Request\CancelOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Response\CancelOrderResponse;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\PlaceOrder;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Request\PlaceOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response\PlaceOrderResponse;
use PHPUnit\Framework\TestCase;

class CancelOrderTest extends TestCase
{
    /**
     * Тестирование заполнения структуры ответа
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"orderId":"1477137337600322304","orderLinkId":"64c7ef2bdf040","symbol":"BTCUSDT","createTime":"1690824492584","orderPrice":"1000","orderQty":"0.001","orderType":"LIMIT","side":"BUY","status":"NEW","timeInForce":"GTC","accountId":"1111837","execQty":"0","orderCategory":0,"smpType":"None"},"retExtInfo":{},"time":1690824492593}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), CancelOrderResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(CancelOrderResponse::class, $data->getResult());

        /** @var CancelOrderResponse $cancelOrderInfo */
        $cancelOrderInfo = $data->getResult();

        $this->assertIsInt($cancelOrderInfo->getOrderId());
        $this->assertIsString($cancelOrderInfo->getOrderLinkId());
        $this->assertIsString($cancelOrderInfo->getSymbol());
        $this->assertIsString($cancelOrderInfo->getStatus());
        $this->assertIsInt($cancelOrderInfo->getAccountId());
        $this->assertIsFloat($cancelOrderInfo->getOrderPrice());
        $this->assertInstanceOf(\DateTime::class, $cancelOrderInfo->getCreateTime());
        $this->assertIsFloat($cancelOrderInfo->getOrderQty());
        $this->assertIsFloat($cancelOrderInfo->getExecQty());
        $this->assertIsString($cancelOrderInfo->getTimeInForce());
        $this->assertIsString($cancelOrderInfo->getOrderType());
        $this->assertIsString($cancelOrderInfo->getSide());

    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws SDKException
     */
    public function testCancelOrderEndpoint()
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



        $canceledOrderResponse = $bybit->privateEndpoint(CancelOrder::class, (new CancelOrderRequest())->setOrderId($orderInfo->getOrderId()))->execute();

        $this->assertEquals(0, $canceledOrderResponse->getReturnCode());
        $this->assertEquals('OK', $canceledOrderResponse->getReturnMessage());
        $this->assertInstanceOf(CancelOrderResponse::class, $canceledOrderResponse->getResult());

        /** @var CancelOrderResponse $cancelOrderInfo */
        $cancelOrderInfo = $canceledOrderResponse->getResult();

        $this->assertIsInt($cancelOrderInfo->getOrderId());
        $this->assertIsString($cancelOrderInfo->getOrderLinkId());
        $this->assertIsString($cancelOrderInfo->getSymbol());
        $this->assertIsString($cancelOrderInfo->getStatus());
        $this->assertIsInt($cancelOrderInfo->getAccountId());
        $this->assertIsFloat($cancelOrderInfo->getOrderPrice());
        $this->assertInstanceOf(\DateTime::class, $cancelOrderInfo->getCreateTime());
        $this->assertIsFloat($cancelOrderInfo->getOrderQty());
        $this->assertIsFloat($cancelOrderInfo->getExecQty());
        $this->assertIsString($cancelOrderInfo->getTimeInForce());
        $this->assertIsString($cancelOrderInfo->getOrderType());
        $this->assertIsString($cancelOrderInfo->getSide());
    }
}