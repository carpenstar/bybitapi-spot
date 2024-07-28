<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces;

interface IGetOrderRequestInterface
{
    /**
     * Order ID. Required if not passing orderLinkId
     */
    public function setOrderId(?string $orderId): self;
    public function getOrderId(): ?string;

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
    public function setOrderCategory(string $orderCategory): self;
    public function getOrderCategory(): string;
}
