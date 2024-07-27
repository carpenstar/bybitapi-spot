<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Response\MarketInfoResponse;
use PHPUnit\Framework\TestCase;

class MarketInfoTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"basket":"230666.700009559600667216","circulation":"24999.840207851103706443","leverage": "2.302545313639639446","ltCode":"EOS2L","nav":"3.790797803797135639","navTime":1673346095226},"retExtInfo":{},"time":1673346095239}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), MarketInfoResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(MarketInfoResponse::class, $data->getResult());

        /** @var MarketInfoResponse $marketInfo */
        $marketInfo = $data->getResult();

        $this->assertInstanceOf(\DateTime::class, $marketInfo->getNavTime());
        $this->assertEquals(230666.700009559600667216, $marketInfo->getBasket());
        $this->assertEquals(24999.840207851103706443, $marketInfo->getCirculation());
        $this->assertEquals(2.302545313639639446, $marketInfo->getLeverage());
        $this->assertEquals('EOS2L', $marketInfo->getLtCode());
        $this->assertEquals(3.790797803797135639, $marketInfo->getNav());
    }
}
