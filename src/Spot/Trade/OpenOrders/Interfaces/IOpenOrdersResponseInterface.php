<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces;

use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response\OpenOrdersResponseItem;

interface IOpenOrdersResponseInterface
{
    /**
     * List of open orders
     * @return OpenOrdersResponseItem[]
     */
    public function getOpenOrders(): array;
}
