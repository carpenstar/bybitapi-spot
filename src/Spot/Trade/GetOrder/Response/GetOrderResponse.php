<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces\IGetOrderResponseInterface;

class GetOrderResponse extends AbstractResponse implements IGetOrderResponseInterface
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
     * Time in force. E.q. EnumTimeInForce::GOOD_TILL_CANCELED
     * @var string $timeInForce
     */
    private string $timeInForce;

    /**
     * Order type
     * @var string $orderType
     */
    private string $orderType;

    /**
     * Order direction
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
     * Reserved for order (if it's 0, it means that the funds corresponding to the order have been settled)
     * @var float $locked
     */
    private float $locked;

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
            ->setLocked($data['locked']);
    }

    /**
     * @return string
     */
    public function getOrderLinkId(): string
    {
        return $this->orderLinkId;
    }

    /**
     * @param string $orderLinkId
     * @return GetOrderResponse
     */
    private function setOrderLinkId(string $orderLinkId): self
    {
        $this->orderLinkId = $orderLinkId;
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
     * @param int $orderId
     * @return GetOrderResponse
     */
    private function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
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
     * @param float $orderPrice
     * @return GetOrderResponse
     */
    private function setOrderPrice(float $orderPrice): self
    {
        $this->orderPrice = $orderPrice;
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
     * @param string $symbol
     * @return GetOrderResponse
     */
    private function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
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
     * @param int $accountId
     * @return GetOrderResponse
     */
    private function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;
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
     * @param float $avgPrice
     * @return GetOrderResponse
     */
    private function setAvgPrice(float $avgPrice): self
    {
        $this->avgPrice = $avgPrice;
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
     * @param string $createTime
     * @return GetOrderResponse
     */
    private function setCreateTime(string $createTime): self
    {
        $this->createTime = DateTimeHelper::makeFromTimestamp($createTime);
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
     * @param float $cummulativeQuoteQty
     * @return GetOrderResponse
     */
    private function setCummulativeQuoteQty(float $cummulativeQuoteQty): self
    {
        $this->cummulativeQuoteQty = $cummulativeQuoteQty;
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
     * @param float $execQty
     * @return GetOrderResponse
     */
    private function setExecQty(float $execQty): self
    {
        $this->execQty = $execQty;
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
     * @param int $isWorking
     * @return GetOrderResponse
     */
    private function setIsWorking(int $isWorking): self
    {
        $this->isWorking = $isWorking;
        return $this;
    }

    /**
     * @return float
     */
    public function getLocked(): float
    {
        return $this->locked;
    }

    /**
     * @param float $locked
     * @return GetOrderResponse
     */
    private function setLocked(float $locked): self
    {
        $this->locked = $locked;
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
     * @param float $orderQty
     * @return GetOrderResponse
     */
    private function setOrderQty(float $orderQty): self
    {
        $this->orderQty = $orderQty;
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
     * @param string $orderType
     * @return GetOrderResponse
     */
    private function setOrderType(string $orderType): self
    {
        $this->orderType = $orderType;
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
     * @param string $side
     * @return GetOrderResponse
     */
    private function setSide(string $side): self
    {
        $this->side = $side;
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
     * @param string $status
     * @return GetOrderResponse
     */
    private function setStatus(string $status): self
    {
        $this->status = $status;
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
     * @param float $stopPrice
     * @return GetOrderResponse
     */
    private function setStopPrice(float $stopPrice): self
    {
        $this->stopPrice = $stopPrice;
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
     * @param string $timeInForce
     * @return GetOrderResponse
     */
    private function setTimeInForce(string $timeInForce): self
    {
        $this->timeInForce = $timeInForce;
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
     * @param string $updateTime
     * @return GetOrderResponse
     */
    private function setUpdateTime(string $updateTime): self
    {
        $this->updateTime = DateTimeHelper::makeFromTimestamp($updateTime);
        return $this;
    }
}
