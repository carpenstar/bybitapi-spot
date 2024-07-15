<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces\IOrderHistoryResponseItemInterface;

class OrderHistoryResponseItem extends AbstractResponse implements IOrderHistoryResponseItemInterface
{
    /**
     * Account ID
     * @var int $accountId
     */
    private int $accountId;

    /**
     * Name of the trading pair
     * @var string $symbol
     */
    private string $symbol;

    /**
     * User-generated order ID
     * @var string $orderLinkId
     */
    private string $orderLinkId;

    /**
     * Order ID
     * @var int $orderId
     */
    private int $orderId;

    /**
     * Last traded price
     * @var float $orderPrice
     */
    private float $orderPrice;

    /**
     * Order quantity
     * @var float $orderQty
     */
    private float $orderQty;

    /**
     * Executed quantity
     * @var float $execQty
     */
    private float $execQty;

    /**
     * Total order quantity
     * @var float $cummulativeQuoteQty
     */
    private float $cummulativeQuoteQty;

    /**
     * Average filled price
     * @var float $avgPrice
     */
    private float $avgPrice;

    /**
     * Order status
     * @var string $status
     */
    private string $status;

    /**
     * Time in force
     * @var string $timeInForce
     */
    private string $timeInForce;

    /**
     * Order type
     * @var string $orderType
     */
    private string $orderType;

    /**
     * Side. BUY, SELL
     * @var string $side
     */
    private string $side;

    /**
     * Stop price
     * @var float $stopPrice
     */
    private float $stopPrice;

    /**
     * Order created time in the match engine
     * @var \DateTime $createTime;
     */
    private \DateTime $createTime;

    /**
     * Last time order was updated
     * @var \DateTime $updateTime
     */
    private \DateTime $updateTime;

    /**
     * Is working. 0：valid, 1：invalid
     * @var int $isWorking
     */
    private int $isWorking;

    /**
     * Order category. 0：normal order; 1：TP/SL order. TP/SL order has this field
     * @var int $orderCategory
     */
    private int $orderCategory;

    /**
     * Trigger price. TP/SL order has this field
     * @var float $triggerPrice
     */
    private ?float $triggerPrice;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this
            ->setAccountId($data['accountId'])
            ->setSymbol($data['symbol'])
            ->setOrderLinkId($data['orderLinkId'])
            ->setOrderId($data['orderId'])
            ->setOrderId($data['orderPrice'])
            ->setOrderQty($data['orderQty'])
            ->setExecQty($data['execQty'])
            ->setCummulativeQuoteQty($data['cummulativeQuoteQty'])
            ->setAvgPrice($data['avgPrice'])
            ->setStatus($data['status'])
            ->setTimeInForce($data['timeInForce'])
            ->setOrderType($data['orderType'])
            ->setSide($data['side'])
            ->setStopPrice($data['stopPrice'])
            ->setCreateTime($data['createTime'])
            ->setUpdateTime($data['updateTime'])
            ->setIsWorking($data['isWorking'])
            ->setOrderCategory($data['orderCategory'] ?? 0)
            ->setOrderPrice($data['orderPrice'])
            ->setTriggerPrice($data['triggerPrice'] ?? null);
    }

    /**
     * @param int $accountId
     * @return OrderHistoryResponse
     */
    public function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->accountId;
    }

    /**
     * @param string $symbol
     * @return OrderHistoryResponse
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $orderLinkId
     * @return OrderHistoryResponse
     */
    public function setOrderLinkId(string $orderLinkId): self
    {
        $this->orderLinkId = $orderLinkId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderLinkId(): string
    {
        return $this->orderLinkId;
    }

    /**
     * @param int $orderId
     * @return OrderHistoryResponse
     */
    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param float $orderPrice
     * @return OrderHistoryResponse
     */
    public function setOrderPrice(float $orderPrice): self
    {
        $this->orderPrice = $orderPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderPrice(): float
    {
        return $this->orderPrice;
    }

    /**
     * @param float $orderQty
     * @return OrderHistoryResponse
     */
    public function setOrderQty(float $orderQty): self
    {
        $this->orderQty = $orderQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderQty(): float
    {
        return $this->orderQty;
    }

    /**
     * @param float $execQty
     * @return OrderHistoryResponse
     */
    public function setExecQty(float $execQty): self
    {
        $this->execQty = $execQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getExecQty(): float
    {
        return $this->execQty;
    }

    /**
     * @param float $cummulativeQuoteQty
     * @return OrderHistoryResponse
     */
    public function setCummulativeQuoteQty(float $cummulativeQuoteQty): self
    {
        $this->cummulativeQuoteQty = $cummulativeQuoteQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getCummulativeQuoteQty(): float
    {
        return $this->cummulativeQuoteQty;
    }

    /**
     * @param float $avgPrice
     * @return OrderHistoryResponse
     */
    public function setAvgPrice(float $avgPrice): self
    {
        $this->avgPrice = $avgPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getAvgPrice(): float
    {
        return $this->avgPrice;
    }

    /**
     * @param string $status
     * @return OrderHistoryResponse
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $timeInForce
     * @return OrderHistoryResponse
     */
    public function setTimeInForce(string $timeInForce): self
    {
        $this->timeInForce = $timeInForce;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeInForce(): string
    {
        return $this->timeInForce;
    }

    /**
     * @param string $orderType
     * @return OrderHistoryResponse
     */
    public function setOrderType(string $orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderType(): string
    {
        return $this->orderType;
    }

    /**
     * @param string $side
     * @return OrderHistoryResponse
     */
    public function setSide(string $side): self
    {
        $this->side = $side;
        return $this;
    }

    /**
     * @return string
     */
    public function getSide(): string
    {
        return $this->side;
    }

    /**
     * @param float $stopPrice
     * @return OrderHistoryResponse
     */
    public function setStopPrice(float $stopPrice): self
    {
        $this->stopPrice = $stopPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getStopPrice(): float
    {
        return $this->stopPrice;
    }

    /**
     * @param int $createTime
     * @return OrderHistoryResponse
     */
    public function setCreateTime(int $createTime): self
    {
        $this->createTime = DateTimeHelper::makeFromTimestamp($createTime);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime
    {
        return $this->createTime;
    }

    /**
     * @param int $updateTime
     * @return OrderHistoryResponse
     */
    public function setUpdateTime(int $updateTime): self
    {
        $this->updateTime = DateTimeHelper::makeFromTimestamp($updateTime);
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdateTime(): \DateTime
    {
        return $this->updateTime;
    }

    /**
     * @param int $isWorking
     * @return OrderHistoryResponse
     */
    public function setIsWorking(int $isWorking): self
    {
        $this->isWorking = $isWorking;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsWorking(): int
    {
        return $this->isWorking;
    }

    /**
     * @param int $orderCategory
     * @return OrderHistoryResponse
     */
    public function setOrderCategory(int $orderCategory): self
    {
        $this->orderCategory = $orderCategory;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderCategory(): int
    {
        return $this->orderCategory;
    }

    /**
     * @param float $triggerPrice
     * @return OrderHistoryResponse
     */
    public function setTriggerPrice(?float $triggerPrice): self
    {
        $this->triggerPrice = $triggerPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getTriggerPrice(): ?float
    {
        return $this->triggerPrice;
    }
}