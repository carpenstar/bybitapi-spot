<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Enums\EnumOrderType;
use Carpenstar\ByBitAPI\Core\Enums\EnumSide;
use Carpenstar\ByBitAPI\Core\Interfaces\IResponseInterface;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\BatchCancelOrderById;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Request\BatchCancelOrderByIdRequest;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Response\BatchCancelOrderByIdResponse;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Response\BatchCancelOrderByIdResponseItem;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\PlaceOrder;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Request\PlaceOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response\PlaceOrderResponse;
use PHPUnit\Framework\TestCase;

class BatchCancelOrderByIdTest extends TestCase
{
    /**
     * Тестирование заполнения структуры ответа
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[]},"retExtInfo":{},"time":1659080815222}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), BatchCancelOrderByIdResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(BatchCancelOrderByIdResponse::class, $data->getResult());

        $this->assertEmpty($data->getResult()->getErrorOrderList());

        $jsonPartialSuccess = '{"retCode":0,"retMsg":"","result":{"list":[{"orderId":"889208273689997824","code":"1139"}]},"time":1234567}';
        $data = (new CurlResponseHandler())->build(json_decode($jsonPartialSuccess, true), BatchCancelOrderByIdResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEmpty($data->getReturnMessage());
        $this->assertInstanceOf(BatchCancelOrderByIdResponse::class, $data->getResult());
        $this->assertEquals('889208273689997824', current($data->getResult()->getErrorOrderList())->getOrderId());
    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws \Carpenstar\ByBitAPI\Core\Exceptions\SDKException
     */
    public function testSuccessResultEndpoint()
    {
        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ');

        $params = (new PlaceOrderRequest())
            ->setSide(EnumSide::BUY)
            ->setOrderType(EnumOrderType::LIMIT)
            ->setOrderPrice(3000)
            ->setSymbol("ETHUSDT")
            ->setOrderQty(1);


        $idsList = [];
        for ($i = 0; $i < 3; $i++) {
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

            $idsList[] = $orderInfo->getOrderId();
        }

        $params = (new BatchCancelOrderByIdRequest())->setOrderIds(implode(',', $idsList));
        $batchCancelEndpoint = $bybit->privateEndpoint(BatchCancelOrderById::class, $params)->execute();
        $canceledInfo = $batchCancelEndpoint->getResult();

        $this->assertEquals('OK', $batchCancelEndpoint->getReturnMessage());
        $this->assertEmpty($canceledInfo->getErrorOrderList()); // Если все ордеры удалены, то будет возвращен пустой массив
    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws \Carpenstar\ByBitAPI\Core\Exceptions\SDKException
     */
    public function testPartialSuccessResultEndpoint()
    {
        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ');

        $params = (new PlaceOrderRequest())
            ->setSide(EnumSide::BUY)
            ->setOrderType(EnumOrderType::LIMIT)
            ->setOrderPrice(3000)
            ->setSymbol("ETHUSDT")
            ->setOrderQty(1);


        $idsList = [];
        for ($i = 0; $i < 2; $i++) {
            $placeOrderEndpoint = (new BybitAPI())->privateEndpoint(PlaceOrder::class, $params)->execute();

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

            $idsList[] = $orderInfo->getOrderId();
        }

        $fakeId = rand(0,100);
        $idsList[] = $fakeId;

        $params = (new BatchCancelOrderByIdRequest())->setOrderIds(implode(',', $idsList));

        $batchCancelEndpoint = $bybit->privateEndpoint(BatchCancelOrderById::class, $params)->execute();

        $canceledInfo = $batchCancelEndpoint->getResult();

        $this->assertEquals('OK', $batchCancelEndpoint->getReturnMessage());

        // Если все не все ордеры удалены, то будет возвращен массив с неудаленными заказами
        $this->assertNotEmpty($canceledInfo->getErrorOrderList());
        $this->assertEquals($fakeId, current($canceledInfo->getErrorOrderList())->getOrderId());
    }
}