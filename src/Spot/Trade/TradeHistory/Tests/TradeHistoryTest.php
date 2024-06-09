<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Exceptions\SDKException;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Request\TradeHistoryRequest;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Response\TradeHistoryResponse;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\TradeHistory;
use PHPUnit\Framework\TestCase;

class TradeHistoryTest extends TestCase
{
    /**
     * Тестирование заполнения структуры ответа
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[{"symbol":"BTCUSDT","id":"1210346127973428992","orderId":"1210073515485572864","tradeId":"2100000000001769786","orderPrice":"20500","orderQty":"0.02","execFee":"0.00002","feeTokenId":"BTC","creatTime":"1659020488738","isBuyer": "0","isMaker":"0", "matchOrderId":"1210346015893229312","makerRebate":"0","executionTime":"1659020502026","blockTradeId":""},{"symbol":"BTCUSDT","id":"1208702504949264128","orderId":"1208702504731160320","tradeId":"2100000000001753197","orderPrice":"20240","orderQty":"0.009881","execFee":"0.000009881","feeTokenId":"BTC","creatTime":"1658824566874","isBuyer":"0","isMaker":"1","matchOrderId":"1208677465155702529","makerRebate":"0","executionTime":"1658824566893","blockTradeId":""}]}, "retExtMap": {},"retExtInfo": {},"time":1659084254366}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), TradeHistoryResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(TradeHistoryResponse::class, $data->getResult());

        $tradeHistory = $data->getResult();
        foreach ($tradeHistory->getTradeHistory() as $trade) {
            $this->assertIsString($trade->getSymbol());
            $this->assertIsInt($trade->getId());
            $this->assertIsInt($trade->getOrderId());
            $this->assertIsInt($trade->getTradeId());
            $this->assertIsFloat($trade->getOrderPrice());
            $this->assertIsFloat($trade->getOrderQty());
            $this->assertIsFloat($trade->getExecFee());
            $this->assertIsString($trade->getFeeTokenId());
            $this->assertInstanceOf(\DateTime::class, $trade->getCreatTime());
            $this->assertIsInt($trade->getIsBuyer());
            $this->assertIsInt($trade->getIsMaker());
            $this->assertIsInt($trade->getMatchOrderId());
            $this->assertIsInt($trade->getMakerRebate());
            $this->assertInstanceOf(\DateTime::class, $trade->getExecutionTime());
        }
    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws SDKException
     */
    public function testTradeHistoryEndpoint()
    {
        $bybit = (new BybitAPI())
            ->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ');

        $orderHistoryResponse = $bybit->privateEndpoint(TradeHistory::class, (new TradeHistoryRequest())->setSymbol('ETHUSDT'))->execute();

        $this->assertEquals(0, $orderHistoryResponse->getReturnCode());
        $this->assertEquals('OK', $orderHistoryResponse->getReturnMessage());
        $this->assertInstanceOf(TradeHistoryResponse::class, $orderHistoryResponse->getResult());

        $tradeInfoList = $orderHistoryResponse->getResult()->getTradeHistory();

        foreach ($tradeInfoList as $trade) {
            $this->assertIsString($trade->getSymbol());
            $this->assertIsInt($trade->getId());
            $this->assertIsInt($trade->getOrderId());
            $this->assertIsInt($trade->getTradeId());
            $this->assertIsFloat($trade->getOrderPrice());
            $this->assertIsFloat($trade->getOrderQty());
            $this->assertIsFloat($trade->getExecFee());
            $this->assertIsString($trade->getFeeTokenId());
            $this->assertInstanceOf(\DateTime::class, $trade->getCreatTime());
            $this->assertIsInt($trade->getIsBuyer());
            $this->assertIsInt($trade->getIsMaker());
            $this->assertIsInt($trade->getMatchOrderId());
            $this->assertIsInt($trade->getMakerRebate());
            $this->assertInstanceOf(\DateTime::class, $trade->getExecutionTime());
        }
    }
}