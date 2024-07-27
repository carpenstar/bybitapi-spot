<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces;

interface ICancelOrderRequestInterface
{
    /**
     * Order ID. Required if not passing orderLinkId
     */
    public function setOrderId(?int $orderId): self;
    public function getOrderId(): ?int;

    /**
     * Unique user-set order ID. Required if not passing orderId
     */
    public function setOrderLinkId(?string $orderLinkId): self;
    public function getOrderLinkId(): ?string;

    /**
     * Order category.
     * 0：normal order by default;
     * 1：TP/SL order, Required for TP/SL order.
     */
    public function setOrderCategory(?int $orderCategory): self;
    public function getOrderCategory(): int;
}
