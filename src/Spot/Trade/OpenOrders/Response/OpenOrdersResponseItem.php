<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersResponseItemInterface;

class OpenOrdersResponseItem extends AbstractResponse implements IOpenOrdersResponseItemInterface
{
    /**
     * Account ID
     * @var int accountId
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
     * Order price
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
     * Total order quantity. For some historical data, it might less than 0, and that means it is not applicable
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
     * @var \DateTime $createTime
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

    public function __construct(array $data)
    {
        $this
            ->setAccountId($data['accountId'])
            ->setSymbol($data['symbol'])
            ->setOrderLinkId($data['orderLinkId'])
            ->setOrderId($data['orderId'])
            ->setOrderPrice($data['orderPrice'])
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
            ->setTriggerPrice($data['triggerPrice'] ?? null);
    }

    /**
     * @param int $accountId
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @param string $createTime
     * @return OpenOrdersResponse
     */
    public function setCreateTime(string $createTime): self
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
     * @param string $updateTime
     * @return OpenOrdersResponse
     */
    public function setUpdateTime(string $updateTime): self
    {
        $this->updateTime = DateTimeHelper::makeFromTimestamp($updateTime);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateTime(): \DateTime
    {
        return $this->updateTime;
    }

    /**
     * @param int $isWorking
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
     * @return OpenOrdersResponse
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
