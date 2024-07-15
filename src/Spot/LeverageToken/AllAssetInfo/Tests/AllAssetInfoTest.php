<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Tests;

use Carpenstar\ByBitAPI\Core\Response\CurlResponseHandler;
use Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Response\AllAssetInfoResponse;
use Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Response\AllAssetInfoResponseItem;
use PHPUnit\Framework\TestCase;

class AllAssetInfoTest extends TestCase
{
    /**
     * Тестирование сборки объекта ответа
     *
     * @return void
     */
    public function testBuildResponseData()
    {
        $json = '{"retCode":0,"retMsg":"OK","result":{"list":[{"fundFee":"21.79800315","fundFeeTime":1673366400000,"ltCode":"EOS2LUSDT","ltName":"Long EOS (2x Leverage)","manageFeeRate":"0.00005","manageFeeTime":1673398800000,"maxPurchase":"5000","maxPurchaseDaily":"200000","maxRedeem":"861","maxRedeemDaily":"20000","minPurchase":"100","minRedeem":"17","netValue":"3.781571076822412032","purchaseFeeRate":"0.0005","redeemFeeRate":"0.0005","status":"1","total":"5000000","value":"23624.848996419293002588635"}]},"retExtInfo":{},"time": 1673345413125}';
        $data = (new CurlResponseHandler())->build(json_decode($json, true), AllAssetInfoResponse::class);

        $this->assertEquals(0, $data->getReturnCode());
        $this->assertEquals('OK', $data->getReturnMessage());
        $this->assertInstanceOf(AllAssetInfoResponse::class, $data->getResult());

        /** @var AllAssetInfoResponseItem $assetInfo */
        $assetInfo = current($data->getResult()->getAssets());

        $this->assertInstanceOf(\DateTime::class, $assetInfo->getFundFeeTime());
        $this->assertInstanceOf(\DateTime::class, $assetInfo->getManageFeeTime());
        $this->assertEquals(21.79800315, $assetInfo->getFundFee());
        $this->assertEquals('EOS2LUSDT', $assetInfo->getLtCode());
        $this->assertEquals('Long EOS (2x Leverage)', $assetInfo->getLtName());
        $this->assertEquals(0.00005, $assetInfo->getManageFeeRate());
        $this->assertEquals(5000, $assetInfo->getMaxPurchase());
        $this->assertEquals(200000, $assetInfo->getMaxPurchaseDaily());
        $this->assertEquals(861, $assetInfo->getMaxRedeem());
        $this->assertEquals(20000, $assetInfo->getMaxRedeemDaily());
        $this->assertEquals(100, $assetInfo->getMinPurchase());
        $this->assertEquals(17, $assetInfo->getMinRedeem());
        $this->assertEquals(3.781571076822412032, $assetInfo->getNetValue());
        $this->assertEquals(0.0005, $assetInfo->getPurchaseFeeRate());
        $this->assertEquals(0.0005, $assetInfo->getRedeemFeeRate());
        $this->assertEquals(1, $assetInfo->getStatus());
        $this->assertEquals(5000000, $assetInfo->getTotal());
        $this->assertEquals(23624.848996419293002588635, $assetInfo->getValue());
    }
}