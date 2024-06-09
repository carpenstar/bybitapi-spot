<?php
namespace Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Response\WalletBalanceResponse;
use Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Response\WalletBalanceResponseItem;
use PHPUnit\Framework\TestCase;

class WalletBalanceTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"balances":[{"coin":"EOS","coinId":"EOS","total":"2000","free":"2500","locked":"0"}]},"retExtInfo":{},"time":1683973704401}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), WalletBalanceResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(WalletBalanceResponse::class, $data->getResult());

        /** @var WalletBalanceResponseItem $balanceItem */
        $balanceItem = current($data->getResult()->getBalance());

        $this->assertEquals("EOS", $balanceItem->getCoin());
        $this->assertEquals("EOS", $balanceItem->getCoinId());
        $this->assertEquals(2000, $balanceItem->getTotal());
        $this->assertEquals(2500, $balanceItem->getFree());
        $this->assertEquals(0, $balanceItem->getLocked());
    }
}