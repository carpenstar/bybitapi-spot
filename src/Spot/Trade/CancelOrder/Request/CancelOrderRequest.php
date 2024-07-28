<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces\ICancelOrderRequestInterface;

class CancelOrderRequest extends AbstractParameters implements ICancelOrderRequestInterface
{
    /**
     * Order ID. Required if not passing orderLinkId
     * @var int $orderId
     */
    protected ?int $orderId = null;

    /**
     * Unique user-set order ID. Required if not passing orderId
     * @var string $orderLinkId
     */
    protected ?string $orderLinkId = null;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @var int $orderCategory
     */
    protected int $orderCategory;

    public function __construct()
    {
        $this->setRequiredBetweenField('orderId', 'orderLinkId');
    }

    /**
     * @param int $orderId
     * @return CancelOrderRequest
     */
    public function setOrderId(?int $orderId): self
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

    /**
     * @param string $orderLinkId
     * @return CancelOrderRequest
     */
    public function setOrderLinkId(?string $orderLinkId): self
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
     * @param int $orderCategory
     * @return CancelOrderRequest
     */
    public function setOrderCategory(?int $orderCategory): self
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
}
