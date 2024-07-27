<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Interfaces;

interface IAllAssetInfoResponseItemInterface
{
    public function getLtCode(): string;
    public function getLtName(): string;
    public function getMaxPurchase(): float;
    public function getMinPurchase(): float;
    public function getMaxPurchaseDaily(): float;
    public function getMaxRedeem(): float;
    public function getMinRedeem(): float;
    public function getMaxRedeemDaily(): float;
    public function getPurchaseFeeRate(): float;
    public function getRedeemFeeRate(): float;
    public function getStatus(): string;
    public function getFundFee(): float;
    public function getFundFeeTime(): \DateTime;
    public function getManageFeeRate(): float;
    public function getManageFeeTime(): \DateTime;
    public function getTotal(): float;
    public function getNetValue(): float;
    public function getValue(): float;
}
