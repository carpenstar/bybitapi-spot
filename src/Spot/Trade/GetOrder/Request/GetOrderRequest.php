<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces\IGetOrderRequestInterface;

class GetOrderRequest extends AbstractParameters implements IGetOrderRequestInterface
{
    /**
     * Order ID. Required if not passing orderLinkId
     * @var string $orderId
     */
    protected string $orderId;

    /**
     * Unique user-set order ID. Required if not passing orderId
     * @var string $orderLinkId
     */
    protected string $orderLinkId;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @var string $orderCategory
     */
    protected string $orderCategory;

    public function __construct()
    {
        $this->setRequiredBetweenField('orderId', 'orderLinkId');
    }

    /**
     * @param null|string $orderId
     * @return GetOrderRequest
     */
    public function setOrderId(?string $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param null|string $orderLinkId
     * @return GetOrderRequest
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
     * @param string $orderCategory
     * @return GetOrderRequest
     */
    public function setOrderCategory(string $orderCategory): self
    {
        $this->orderCategory = $orderCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderCategory(): string
    {
        return $this->orderCategory;
    }
}
