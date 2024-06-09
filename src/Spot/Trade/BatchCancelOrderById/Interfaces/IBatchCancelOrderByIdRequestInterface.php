<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces;

interface IBatchCancelOrderByIdRequestInterface
{
    /**
     * Order ID, use commas to indicate multiple orderIds. Maximum of 100 ids.
     */
    public function setOrderIds(string $orderIds): self;
    public function getOrderIds(): string;

    /**
     * Order category.
     * 0：normal order by default;
     * 1：TP/SL order, Required for TP/SL order.
     */
    public function setOrderCategory(int $orderCategory): self;
    public function getOrderCategory(): int;
}