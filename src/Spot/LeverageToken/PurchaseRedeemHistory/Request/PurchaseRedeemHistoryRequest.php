<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Interfaces\IPurchaseRedeemHistoryRequestInterface;

class PurchaseRedeemHistoryRequest extends AbstractParameters implements IPurchaseRedeemHistoryRequestInterface
{
    /**
     * Abbreviation of the LT.
     * @var string $ltCode
     */
    protected string $ltCode;

    /**
     * Order ID
     * @var string $orderId
     */
    protected string $orderId;

    /**
     * Start timestamp
     * @var \DateTime $startTime
     */
    protected \DateTime $startTime;

    /**
     * End timestamp
     * @var \DateTime $endTime
     */
    protected \DateTime $endTime;

    /**
     * Limit for data size. [1, 500]. Default: 100
     * @var int $limit = 100;
     */
    protected int $limit;

    /**
     * Order type; 1: Purchase; 2: Redeem
     * @var int $orderType
     */
    protected int $orderType;

    /**
     * Serial number
     * @var string $serialNo
     */
    protected string $serialNo;

    /**
     * @return string
     */
    public function getLtCode(): string
    {
        return $this->ltCode;
    }

    /**
     * @param string $ltCode
     * @return PurchaseRedeemHistoryRequest
     */
    public function setLtCode(string $ltCode): self
    {
        $this->ltCode = $ltCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return PurchaseRedeemHistoryRequest
     */
    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime(): \DateTime
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $startTime
     * @return PurchaseRedeemHistoryRequest
     */
    public function setStartTime(\DateTime $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTime(): \DateTime
    {
        return $this->endTime;
    }

    /**
     * @param \DateTime $endTime
     * @return PurchaseRedeemHistoryRequest
     */
    public function setEndTime(\DateTime $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return PurchaseRedeemHistoryRequest
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderType(): int
    {
        return $this->orderType;
    }

    /**
     * @param int $orderType
     * @return PurchaseRedeemHistoryRequest
     */
    public function setOrderType(int $orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerialNo(): string
    {
        return $this->serialNo;
    }

    /**
     * @param string $serialNo
     * @return PurchaseRedeemHistoryRequest
     */
    public function setSerialNo(string $serialNo): self
    {
        $this->serialNo = $serialNo;
        return $this;
    }
}
