<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces\IPlaceOrderResponseInterface;

class PlaceOrderResponse extends AbstractResponse implements IPlaceOrderResponseInterface
{
    /**
     * Order ID
     * @var int $orderId
     */
    private ?int $orderId;

    /**
     * User-generated order ID
     * @var string $orderLinkId
     */
    private ?string $orderLinkId;

    /**
     * Name of the trading pair
     * @var string $symbol
     */
    private ?string $symbol;

    /**
     * Order Creation Time
     * @var \DateTime $createTime
     */
    private \DateTime $createTime;

    /**
     * Last traded price
     * @var float $orderPrice
     */
    private ?float $orderPrice;

    /**
     * Order quantity
     * @var float $orderQty
     */
    private ?float $orderQty;

    /**
     * Order type
     * @var string $orderType
     */
    private ?string $orderType;

    /**
     * Side. BUY, SELL
     * @var string $side
     */
    private ?string $side;

    /**
     * Order status
     * @var string $status
     */
    private ?string $status;

    /**
     * Time in force
     * @var string $timeInForce
     */
    private ?string $timeInForce;

    /**
     * Account ID
     * @var string $accountId
     */
    private ?string $accountId;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order
     * @var int $orderCategory
     */
    private ?int $orderCategory;

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
            ->setOrderId($data['orderId'] ?? null)
            ->setOrderLinkId($data['orderLinkId'] ?? null)
            ->setSymbol($data['symbol'] ?? null)
            ->setCreateTime($data['createTime'] ?? null)
            ->setOrderPrice($data['orderPrice'] ?? null)
            ->setOrderQty($data['orderQty'] ?? null)
            ->setOrderType($data['orderType'] ?? null)
            ->setSide($data['side'] ?? null)
            ->setStatus($data['status'] ?? null)
            ->setTimeInForce($data['timeInForce'] ?? null)
            ->setAccountId($data['accountId'] ?? null)
            ->setOrderCategory($data['orderCategory'] ?? null)
            ->setTriggerPrice($data['triggerPrice'] ?? null);
    }

    /**
     * @param int $orderId
     * @return $this
     */
    private function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    private function setOrderLinkId(?string $orderLinkId): self
    {
        $this->orderLinkId = $orderLinkId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderLinkId(): ?string
    {
        return $this->orderLinkId;
    }

    /**
     * @param string $symbol
     * @return $this
     */
    private function setSymbol(?string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * @param int $createTime
     * @return $this
     */
    private function setCreateTime(?string $createTime): self
    {
        if (!empty($createTime)) {
            $this->createTime = DateTimeHelper::makeFromTimestamp($createTime);
        }
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
     * @param float $orderPrice
     * @return PlaceOrderResponse
     */
    public function setOrderPrice(?float $orderPrice): self
    {
        $this->orderPrice = $orderPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderPrice(): ?float
    {
        return $this->orderPrice;
    }

    /**
     * @param float $orderQty
     * @return PlaceOrderResponse
     */
    private function setOrderQty(?float $orderQty): self
    {
        $this->orderQty = $orderQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderQty(): ?float
    {
        return $this->orderQty;
    }

    /**
     * @param string|null $orderType
     * @return $this
     */
    private function setOrderType(?string $orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderType(): ?string
    {
        return $this->orderType;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return PlaceOrderResponse
     */
    private function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param string $side
     * @return PlaceOrderResponse
     */
    private function setSide(?string $side): self
    {
        $this->side = $side;
        return $this;
    }

    /**
     * @return string
     */
    public function getSide(): ?string
    {
        return $this->side;
    }

    /**
     * @param string $timeInForce
     * @return PlaceOrderResponse
     */
    private function setTimeInForce(?string $timeInForce): self
    {
        $this->timeInForce = $timeInForce;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeInForce(): ?string
    {
        return $this->timeInForce;
    }

    /**
     * @param string $accountId
     * @return PlaceOrderResponse
     */
    private function setAccountId(?string $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    /**
     * @param int $orderCategory
     * @return PlaceOrderResponse
     */
    public function setOrderCategory(?int $orderCategory): self
    {
        $this->orderCategory = $orderCategory;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderCategory(): ?int
    {
        return $this->orderCategory;
    }

    /**
     * @param float $triggerPrice
     * @return PlaceOrderResponse
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