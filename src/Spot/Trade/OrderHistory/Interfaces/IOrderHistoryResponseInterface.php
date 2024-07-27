<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryResponseInterface
{
    /**
     * @return IOrderHistoryResponseItemInterface[]
     */
    public function getOrderHistory(): array;
}
