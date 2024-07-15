<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Interfaces\IAllAssetInfoResponseItemInterface;

class AllAssetInfoResponseItem extends AbstractResponse implements IAllAssetInfoResponseItemInterface
{
    /**
     * Abbreviation of the LT
     * @var string $ltCode
     */
    private string $ltCode;

    /**
     * Full name of the LT
     * @var string $ltName
     */
    private string $ltName;

    /**
     * Max. purchase amount per transaction
     * @var float $maxPurchase
     */
    private float $maxPurchase;

    /**
     * Min. purchase amount per transaction
     * @var float $minPurchase
     */
    private float $minPurchase;

    /**
     * Max. purchase amount per day
     * @var float $maxPurchaseDaily
     */
    private float $maxPurchaseDaily;

    /**
     * Max. redemption amount per transaction
     * @var float $maxRedeem
     */
    private float $maxRedeem;

    /**
     * Min. redemption amount per transaction
     * @var float $minRedeem
     */
    private float $minRedeem;

    /**
     * Max. redemption amount per day
     * @var float $maxRedeemDaily
     */
    private float $maxRedeemDaily;

    /**
     * Purchase fees
     * @var float $purchaseFeeRate
     */
    private float $purchaseFeeRate;

    /**
     * Redemption fees
     * @var float $redeemFeeRate
     */
    private float $redeemFeeRate;

    /**
     * Whether the LT can be purchased or redeemed
     * @var string $status
     */
    private string $status;

    /**
     * Funding fees charged daily to users who hold LT
     * @var float $fundFee
     */
    private float $fundFee;

    /**
     * Timestamps when funding fees are charged
     * @var \DateTime $fundFeeTime
     */
    private \DateTime $fundFeeTime;

    /**
     * Management fees
     * @var float $manageFeeRate
     */
    private float $manageFeeRate;

    /**
     * Timestamps when management fees are charged
     * @var \DateTime $manageFeeTime
     */
    private \DateTime $manageFeeTime;

    /**
     * Application upper limit
     * @var float $total
     */
    private float $total;

    /**
     * Net asset value
     * @var float $netValue
     */
    private float $netValue;

    private float $value;

    public function __construct(array $data)
    {
        $this->ltCode = $data['ltCode'];
        $this->ltName = $data['ltName'];
        $this->maxPurchase = $data['maxPurchase'];
        $this->minPurchase = $data['minPurchase'];
        $this->maxPurchaseDaily = $data['maxPurchaseDaily'];
        $this->maxRedeem = $data['maxRedeem'];
        $this->maxRedeemDaily = $data['maxRedeemDaily'];
        $this->purchaseFeeRate = $data['purchaseFeeRate'];
        $this->redeemFeeRate = $data['redeemFeeRate'];
        $this->status = $data['status'];
        $this->fundFee = $data['fundFee'];
        $this->fundFeeTime = DateTimeHelper::makeFromTimestamp($data['fundFeeTime']);
        $this->manageFeeRate = $data['manageFeeRate'];
        $this->manageFeeTime = DateTimeHelper::makeFromTimestamp($data['manageFeeTime']);
        $this->total = $data['total'];
        $this->netValue = $data['netValue'];
        $this->value = $data['value'];
        $this->minRedeem = $data['minRedeem'];
    }

    /**
     * @return string
     */
    public function getLtCode(): string
    {
        return $this->ltCode;
    }

    /**
     * @return string
     */
    public function getLtName(): string
    {
        return $this->ltName;
    }

    /**
     * @return float
     */
    public function getMaxPurchase(): float
    {
        return $this->maxPurchase;
    }


    /**
     * @return float
     */
    public function getMinPurchase(): float
    {
        return $this->minPurchase;
    }

    /**
     * @return float
     */
    public function getMaxPurchaseDaily(): float
    {
        return $this->maxPurchaseDaily;
    }

    /**
     * @return float
     */
    public function getMaxRedeem(): float
    {
        return $this->maxRedeem;
    }

    /**
     * @return float
     */
    public function getMinRedeem(): float
    {
        return $this->minRedeem;
    }

    /**
     * @return float
     */
    public function getMaxRedeemDaily(): float
    {
        return $this->maxRedeemDaily;
    }

    /**
     * @return float
     */
    public function getPurchaseFeeRate(): float
    {
        return $this->purchaseFeeRate;
    }

    /**
     * @return float
     */
    public function getRedeemFeeRate(): float
    {
        return $this->redeemFeeRate;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return float
     */
    public function getFundFee(): float
    {
        return $this->fundFee;
    }

    /**
     * @return \DateTime
     */
    public function getFundFeeTime(): \DateTime
    {
        return $this->fundFeeTime;
    }

    /**
     * @return float
     */
    public function getManageFeeRate(): float
    {
        return $this->manageFeeRate;
    }

    /**
     * @return \DateTime
     */
    public function getManageFeeTime(): \DateTime
    {
        return $this->manageFeeTime;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return float
     */
    public function getNetValue(): float
    {
        return $this->netValue;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}