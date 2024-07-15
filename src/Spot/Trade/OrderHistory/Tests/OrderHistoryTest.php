<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Tests;


use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Exceptions\SDKException;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\OrderHistory;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Request\OrderHistoryRequest;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response\OrderHistoryResponse;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response\OrderHistoryResponseItem;
use PHPUnit\Framework\TestCase;

class OrderHistoryTest extends TestCase
{
    static private string $orderHistoryResponse = '{"retCode":0,"retMsg":"OK","result":{"list":[{"accountId":"533287","symbol":"BTCUSDT","orderLinkId":"spotx003","orderId":"1210856408331857664","orderPrice":"23800","orderQty":"0.02","execQty":"0","cummulativeQuoteQty":"0","avgPrice":"0","status":"REJECTED","timeInForce":"GTC","orderType":"LIMIT_MAKER","side":"BUY","stopPrice":"0.0","icebergQty":"0.0","createTime":1659081332185,"updateTime":1659081332225,"isWorking":"1","blockTradeId":"","cancelType":"UNKNOWN","smpGroup":0,"smpOrderId":"","smpType":"None"}]},"retExtInfo":{},"time":1659082630638}';

    /**
     * Тестирование заполнения структуры ответа
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[{"accountId":"533287","symbol":"BTCUSDT","orderLinkId":"spotx004","orderId":"1210858291884732160","orderPrice":"23500","orderQty":"0.02","execQty":"0","cummulativeQuoteQty":"0","avgPrice":"0","status":"NEW","timeInForce":"GTC","orderType":"LIMIT_MAKER","side":"SELL","stopPrice":"0.0","icebergQty":"0.0","createTime":1659081556722,"updateTime":1659081556740,"isWorking":"1","blockTradeId":"","cancelType":"UNKNOWN","smpGroup":0,"smpOrderId":"","smpType":"None"}]},"retExtInfo": {},"time": 1659081570356}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), OrderHistoryResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(OrderHistoryResponse::class, $data->getResult());

        $orderInfo = $data->getResult();
        foreach ($orderInfo->getOrderHistory() as $order) {
            $this->assertIsInt($order->getAccountId());
            $this->assertIsString($order->getSymbol());
            $this->assertIsString($order->getOrderLinkId());
            $this->assertIsInt($order->getOrderId());
            $this->assertIsFloat($order->getOrderPrice());
            $this->assertIsFloat($order->getOrderQty());
            $this->assertIsFloat($order->getExecQty());
            $this->assertIsFloat($order->getCummulativeQuoteQty());
            $this->assertIsFloat($order->getAvgPrice());
            $this->assertIsString($order->getStatus());
            $this->assertIsString($order->getTimeInForce());
            $this->assertIsString($order->getOrderType());
            $this->assertIsString($order->getSide());
            $this->assertIsFloat($order->getStopPrice());
            $this->assertInstanceOf(\DateTime::class, $order->getCreateTime());
            $this->assertInstanceOf(\DateTime::class, $order->getUpdateTime());
            $this->assertIsInt($order->getIsWorking());
            $this->assertIsInt($order->getOrderCategory());
            if (!is_null($order->getTriggerPrice())) {
                $this->assertIsFloat($order->getTriggerPrice());
            }
        }
    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws SDKException
     */
    public function testOrderHistoryEndpoint()
    {
        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ');

        $orderHistoryResponse = $bybit->privateEndpoint(OrderHistory::class, (new OrderHistoryRequest())->setSymbol('ETHUSDT'))->execute();

        $this->assertEquals(0, $orderHistoryResponse->getReturnCode());
        $this->assertEquals('OK', $orderHistoryResponse->getReturnMessage());
        $this->assertInstanceOf(OrderHistoryResponse::class, $orderHistoryResponse->getResult());

        $orderInfoList = $orderHistoryResponse->getResult()->getOrderHistory();

        foreach ($orderInfoList as $order) {
            $this->assertIsInt($order->getAccountId());
            $this->assertIsString($order->getSymbol());
            $this->assertIsString($order->getOrderLinkId());
            $this->assertIsInt($order->getOrderId());
            $this->assertIsFloat($order->getOrderPrice());
            $this->assertIsFloat($order->getOrderQty());
            $this->assertIsFloat($order->getExecQty());
            $this->assertIsFloat($order->getCummulativeQuoteQty());
            $this->assertIsFloat($order->getAvgPrice());
            $this->assertIsString($order->getStatus());
            $this->assertIsString($order->getTimeInForce());
            $this->assertIsString($order->getOrderType());
            $this->assertIsString($order->getSide());
            $this->assertIsFloat($order->getStopPrice());
            $this->assertInstanceOf(\DateTime::class, $order->getCreateTime());
            $this->assertInstanceOf(\DateTime::class, $order->getUpdateTime());
            $this->assertIsInt($order->getIsWorking());
            $this->assertIsInt($order->getOrderCategory());
            if (!is_null($order->getTriggerPrice())) {
                $this->assertIsFloat($order->getTriggerPrice());
            }
        }
    }
}