<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Tests;
use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\BatchCancelOrder;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Request\BatchCancelOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Response\BatchCancelOrderResponse;
use PHPUnit\Framework\TestCase;

class BatchCancelOrderTest extends TestCase
{

    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"success":"1"},"retExtInfo":{},"time":1718137773003}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), BatchCancelOrderResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(BatchCancelOrderResponse::class, $data->getResult());

        /** @var BatchCancelOrderResponse $cancelOrderInfo */
        $cancelOrderInfo = $data->getResult();
        $this->assertTrue($cancelOrderInfo->isSuccess());

    }

    /**
     * Тестирование эндпоинта на корректное исполнение
     * @return void
     * @throws \Carpenstar\ByBitAPI\Core\Exceptions\SDKException
     */
    public function testSuccessResultEndpoint()
    {
        $params = (new BatchCancelOrderRequest())->setSymbol('ETHUSDT');
        $bybit = (new BybitAPI())
            ->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ')
            ->privateEndpoint(BatchCancelOrder::class, $params)
            ->execute();

        $this->assertTrue($bybit->getResult()->isSuccess());
    }

}