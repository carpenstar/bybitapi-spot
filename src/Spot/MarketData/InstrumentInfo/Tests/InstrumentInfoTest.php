<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoResponseItem;
use PHPUnit\Framework\TestCase;

class InstrumentInfoTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[{"name":"BTCUSDT","alias":"BTCUSDT","baseCoin":"BTC","quoteCoin":"USDT","basePrecision":"0.000001","quotePrecision":"0.00000001","minTradeQty":"0.00004","minTradeAmt":"1","maxTradeQty":"500","maxTradeAmt":"1200000","minPricePrecision":"0.01","category":"1","showStatus":"1","innovation":"0"},{"name":"ETHUSDT","alias":"ETHUSDT","baseCoin":"ETH","quoteCoin":"USDT","basePrecision":"0.00001","quotePrecision":"0.0000001","minTradeQty":"0.0005","minTradeAmt":"1","maxTradeQty":"100000000","maxTradeAmt":"1200000","minPricePrecision":"0.01","category":"1","showStatus":"1","innovation":"0"},{"name":"EOSUSDT","alias":"EOSUSDT","baseCoin":"EOS","quoteCoin":"USDT","basePrecision":"0.01","quotePrecision":"0.000001","minTradeQty":"0.01","minTradeAmt":"0.01","maxTradeQty":"90909.090909","maxTradeAmt":"10000","minPricePrecision":"0.0001","category":"1","showStatus":"1","innovation":"0"}]},"retExtInfo":{},"time":1683980087416}';
        ;
        $data = (new CurlResponseHandler())->build(json_decode($json, true), InstrumentInfoResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(InstrumentInfoResponse::class, $data->getResult());

        /** @var InstrumentInfoResponseItem $instrumentInfo */
        $instrumentInfo = current($data->getResult()->getInstrumentInfoList());

        $this->assertEquals('BTCUSDT', $instrumentInfo->getName());
        $this->assertEquals('BTCUSDT', $instrumentInfo->getAlias());
        $this->assertEquals('BTC', $instrumentInfo->getBaseCoin());
        $this->assertEquals('USDT', $instrumentInfo->getQuoteCoin());
        $this->assertEquals(0.000001, $instrumentInfo->getBasePrecision());
        $this->assertEquals(0.00000001, $instrumentInfo->getQuotePrecision());
        $this->assertEquals(0.00004, $instrumentInfo->getMinTradeQty());
        $this->assertEquals(1, $instrumentInfo->getMinTradeAmt());
        $this->assertEquals(500, $instrumentInfo->getMaxTradeQty());
        $this->assertEquals(1200000, $instrumentInfo->getMaxTradeAmt());
        $this->assertEquals(0.01, $instrumentInfo->getMinPricePrecision());
        $this->assertEquals(1, $instrumentInfo->getCategory());
        $this->assertEquals(1, $instrumentInfo->getShowStatus());
        $this->assertEquals(0, $instrumentInfo->getInnovation());
    }
}
