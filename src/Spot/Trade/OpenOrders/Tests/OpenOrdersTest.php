<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Exceptions\SDKException;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersResponseItemInterface;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\OpenOrders;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Request\OpenOrdersRequest;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response\OpenOrdersResponse;
use PHPUnit\Framework\TestCase;

class OpenOrdersTest extends TestCase
{
    /**
     * Тестирование заполнения структуры ответа
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[{"accountId":"533287","symbol":"BTCUSDT","orderLinkId":"spotx004","orderId":"1210858291884732160","orderPrice":"23500","orderQty":"0.02","execQty":"0","cummulativeQuoteQty":"0","avgPrice":"0","status":"NEW","timeInForce":"GTC","orderType":"LIMIT_MAKER","side":"SELL","stopPrice":"0.0","icebergQty":"0.0","createTime":1659081556722,"updateTime":1659081556740,"isWorking":"1","blockTradeId":"","cancelType":"UNKNOWN","smpGroup":0,"smpOrderId":"","smpType":"None"}]},"retExtInfo": {},"time": 1659081570356}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), OpenOrdersResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(OpenOrdersResponse::class, $data->getResult());

        /** @var OpenOrdersResponse $orderInfo */
        $orderInfo = $data->getResult();
        foreach ($orderInfo->getOpenOrders() as $order) {
            $this->assertNotNull($order->getSide());
            $this->assertNotNull($order->getAccountId());
            $this->assertNotNull($order->getSymbol());
            $this->assertNotNull($order->getOrderLinkId());
            $this->assertNotNull($order->getOrderId());
            $this->assertNotNull($order->getOrderPrice());
            $this->assertNotNull($order->getOrderQty());
            $this->assertNotNull($order->getExecQty());
            $this->assertNotNull($order->getAvgPrice());
            $this->assertNotNull($order->getCummulativeQuoteQty());
            $this->assertNotNull($order->getStatus());
            $this->assertNotNull($order->getTimeInForce());
            $this->assertNotNull($order->getOrderType());
            $this->assertNotNull($order->getStopPrice());
            $this->assertNotNull($order->getCreateTime());
            $this->assertNotNull($order->getUpdateTime());
            $this->assertNotNull($order->getIsWorking());
        }
    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws SDKException
     */
    public function testCancelOrderEndpoint()
    {
        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ');

        $openOrdersResponse = $bybit->privateEndpoint(OpenOrders::class, (new OpenOrdersRequest())->setSymbol('ETHUSDT'))->execute();

        $this->assertEquals(0, $openOrdersResponse->getReturnCode());
        $this->assertEquals('OK', $openOrdersResponse->getReturnMessage());
        $this->assertInstanceOf(OpenOrdersResponse::class, $openOrdersResponse->getResult());

        $orderInfoList = $openOrdersResponse->getResult()->getOpenOrders();

        foreach ($orderInfoList as $order) {
            $this->assertIsInt($order->getOrderId());
            $this->assertIsString($order->getOrderLinkId());
            $this->assertIsString($order->getSymbol());
            $this->assertIsString($order->getStatus());
            $this->assertIsInt($order->getAccountId());
            $this->assertIsFloat($order->getOrderPrice());
            $this->assertInstanceOf(\DateTime::class, $order->getCreateTime());
            $this->assertIsFloat($order->getOrderQty());
            $this->assertIsFloat($order->getExecQty());
            $this->assertIsString($order->getTimeInForce());
            $this->assertIsString($order->getOrderType());
            $this->assertIsString($order->getSide());
        }
    }
}
