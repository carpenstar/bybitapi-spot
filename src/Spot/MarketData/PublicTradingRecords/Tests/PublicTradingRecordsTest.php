<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Tests;

use Carpenstar\ByBitAPI\BybitAPI;
use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Builders\ResponseHandlerBuilder;
use Carpenstar\ByBitAPI\Core\Builders\RestBuilder;
use Carpenstar\ByBitAPI\Core\Enums\EnumOutputMode;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseDto;
use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Overrides\TestPublicTradingRecords;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\PublicTradingRecords;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Request\PublicTradingRecordsRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Response\PublicTradingRecordsResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Response\PublicTradingRecordsResponseItem;
use PHPUnit\Framework\TestCase;

class PublicTradingRecordsTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[{"price":"26822.93","time":1683984799441,"qty":"0.000336","isBuyerMaker":1,"type":"0"},{"price":"26822.93","time":1683984799749,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.93","time":1683984800267,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.93","time":1683984801045,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984801819,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984802595,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984803370,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984803430,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26822.72","time":1683984804148,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984804430,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26822.72","time":1683984804923,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984805427,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26820.45","time":1683984805496,"qty":"0.000242","isBuyerMaker":0,"type":"0"},{"price":"26822.72","time":1683984805698,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984806472,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984807250,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984807427,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26822.72","time":1683984808031,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984808434,"qty":"0.000261","isBuyerMaker":0,"type":"0"},{"price":"26822.72","time":1683984808807,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984809582,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984809845,"qty":"0.001","isBuyerMaker":0,"type":"0"},{"price":"26822.72","time":1683984810358,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984810874,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984811387,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984811433,"qty":"0.000298","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984811516,"qty":"0.000242","isBuyerMaker":0,"type":"0"},{"price":"26822.72","time":1683984811901,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984812415,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984812932,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26822.72","time":1683984813447,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.45","time":1683984813455,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26820.46","time":1683984813961,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.31","time":1683984814440,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26820.46","time":1683984814475,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984814990,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.31","time":1683984815440,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26820.46","time":1683984815507,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984816023,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.31","time":1683984816430,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26820.46","time":1683984816539,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.31","time":1683984816841,"qty":"0.000354","isBuyerMaker":0,"type":"0"},{"price":"26820.46","time":1683984817056,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.31","time":1683984817430,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26820.46","time":1683984817568,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984818348,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984819136,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984819916,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984820698,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.31","time":1683984821432,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26820.46","time":1683984821470,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984822251,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26820.46","time":1683984823027,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.31","time":1683984823434,"qty":"0.000373","isBuyerMaker":0,"type":"0"},{"price":"26819.32","time":1683984823799,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.32","time":1683984824571,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.32","time":1683984825349,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.32","time":1683984826123,"qty":"0.000037","isBuyerMaker":1,"type":"0"},{"price":"26819.32","time":1683984826445,"qty":"0.000205","isBuyerMaker":1,"type":"0"},{"price":"26817.46","time":1683984826525,"qty":"0.000298","isBuyerMaker":0,"type":"0"}]},"retExtInfo":{},"time":1683984826883}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), PublicTradingRecordsResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(PublicTradingRecordsResponse::class, $data->getResult());

        /** @var PublicTradingRecordsResponseItem $tradingRecords */
        $tradingRecords = current($data->getResult()->getRecords());

        $this->assertInstanceOf(\DateTime::class, $tradingRecords->getTime());
        $this->assertEquals(26822.93, $tradingRecords->getPrice());
        $this->assertEquals(0.000336, $tradingRecords->getQuantity());
        $this->assertEquals(true, $tradingRecords->getIsBuyerMaker());
        $this->assertEquals(0, $tradingRecords->getType());
    }
}
