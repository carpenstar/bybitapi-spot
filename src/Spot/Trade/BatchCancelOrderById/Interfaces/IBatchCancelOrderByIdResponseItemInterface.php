<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces;

interface IBatchCancelOrderByIdResponseItemInterface
{
    /**
     * Order ID
     */
    public function getOrderId(): int;

    /**
     * Error code
     */
    public function getCode(): string;
}