<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces;

interface IBatchCancelOrderResponseInterface
{
    /**
     * Batch cancel successfully or not. 0：fail, 1：success
     */
    public function isSuccess(): bool;
}