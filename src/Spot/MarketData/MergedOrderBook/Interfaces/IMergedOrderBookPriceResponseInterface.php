<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookPriceResponseInterface
{
    /**
     * Price
     * @return float
     */
    public function getPrice(): float;

    /**
     * Quantity
     * @return float
     */
    public function getQuantity(): float;
}