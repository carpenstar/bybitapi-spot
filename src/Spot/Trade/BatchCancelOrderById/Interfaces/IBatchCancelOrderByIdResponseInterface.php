<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces;


interface IBatchCancelOrderByIdResponseInterface
{
    /**
     * List. If all success, it returns empty array
     * @return IBatchCancelOrderByIdResponseItemInterface[]
     */
    public function getErrorOrderList(): array;
}