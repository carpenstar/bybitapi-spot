<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Enums\EnumOrderType;
use Carpenstar\ByBitAPI\Core\Enums\EnumSide;
use Carpenstar\ByBitAPI\Core\Exceptions\SDKException;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\PlaceOrder;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Request\PlaceOrderRequest;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response\PlaceOrderResponse;
use PHPUnit\Framework\TestCase;

class PlaceOrderTest extends TestCase
{
    private static string $placeOrderResponse = '{"retCode":0,"retMsg":"OK","result":{"orderId":"1477137337600322304","orderLinkId":"64c7ef2bdf040","symbol":"BTCUSDT","createTime":"1690824492584","orderPrice":"1000","orderQty":"0.001","orderType":"LIMIT","side":"BUY","status":"NEW","timeInForce":"GTC","accountId":"1111837","execQty":"0","orderCategory":0,"smpType":"None"},"retExtInfo":{},"time":1690824492593}';

    /**
     * Тестирование размещения ордера по рынку на покупку
     * @return void
     * @throws SDKException
     */
    public function testPlaceBuyMarketOrderEndpoint()
    {
        $params = (new PlaceOrderRequest())
            ->setSide(EnumSide::BUY)
            ->setOrderType(EnumOrderType::MARKET)
            ->setSymbol("ETHUSDT")
            ->setOrderQty(3500); // Если покупка по рынку, то это свойство эквивалент USDT


        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ')
            ->privateEndpoint(PlaceOrder::class, $params)
            ->execute();

        /** @var PlaceOrderResponse $orderInfo */
        $orderInfo = $bybit->getResult();

        $this->assertNotEmpty($orderInfo->getOrderId());
        $this->assertNotEmpty($orderInfo->getOrderLinkId());
        $this->assertEquals('ETHUSDT', $orderInfo->getSymbol());
        $this->assertInstanceOf(\DateTime::class, $orderInfo->getCreateTime());
        $this->assertTrue($orderInfo->getOrderPrice() == 0);
        $this->assertTrue($orderInfo->getOrderQty() == 3500);
        $this->assertEquals(strtoupper(EnumOrderType::MARKET), $orderInfo->getOrderType());
        $this->assertEquals(strtoupper(EnumSide::BUY), $orderInfo->getSide());
        $this->assertEquals('NEW', $orderInfo->getStatus());
        $this->assertEquals('GTC', $orderInfo->getTimeInForce());
        $this->assertNotEmpty($orderInfo->getAccountId());
        $this->assertEmpty($orderInfo->getTriggerPrice());
    }

    /**
     * Тестирование размещения лимитного ордера на покупку
     * @return void
     * @throws SDKException
     */
    public function testPlaceBuyLimitOrderEndpoint()
    {
        $params = (new PlaceOrderRequest())
            ->setSide(EnumSide::BUY)
            ->setOrderType(EnumOrderType::LIMIT)
            ->setOrderPrice(3000)
            ->setSymbol("ETHUSDT")
            ->setOrderQty(1);


        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ')
            ->privateEndpoint(PlaceOrder::class, $params)
            ->execute();

        /** @var PlaceOrderResponse $orderInfo */
        $orderInfo = $bybit->getResult();

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
    }

    /**
     * Тестирование размещения рыночного ордера на покупку
     * @return void
     * @throws SDKException
     */
    public function testPlaceSellMarketOrderEndpoint()
    {
        $params = (new PlaceOrderRequest())
            ->setSide(EnumSide::SELL)
            ->setOrderType(EnumOrderType::MARKET)
            ->setSymbol("ETHUSDT")
            ->setOrderQty(1); // При продаже по рынку, это свойство отвечает за количество токенов


        $bybit = (new BybitAPI())->setCredentials('https://api-testnet.bybit.com', 'fL02oi5qo8i2jDxlum', 'Ne1EE35XTprIWrId9vGEAc1ZYJTmodA4qFzZ')
            ->privateEndpoint(PlaceOrder::class, $params)
            ->execute();

        /** @var PlaceOrderResponse $orderInfo */
        $orderInfo = $bybit->getResult();

        $this->assertNotEmpty($orderInfo->getOrderId());
        $this->assertNotEmpty($orderInfo->getOrderLinkId());
        $this->assertEquals('ETHUSDT', $orderInfo->getSymbol());
        $this->assertInstanceOf(\DateTime::class, $orderInfo->getCreateTime());
        $this->assertTrue($orderInfo->getOrderPrice() == 0);
        $this->assertTrue($orderInfo->getOrderQty() == 1);
        $this->assertEquals(strtoupper(EnumOrderType::MARKET), $orderInfo->getOrderType());
        $this->assertEquals(strtoupper(EnumSide::SELL), $orderInfo->getSide());
        $this->assertEquals('NEW', $orderInfo->getStatus());
        $this->assertEquals('GTC', $orderInfo->getTimeInForce());
        $this->assertNotEmpty($orderInfo->getAccountId());
        $this->assertEmpty($orderInfo->getTriggerPrice());
    }
}
