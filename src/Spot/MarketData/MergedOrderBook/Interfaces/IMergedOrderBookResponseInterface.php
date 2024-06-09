<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;

interface IMergedOrderBookResponseInterface
{
    /**
     * Current time
     * @return \DateTime
     */
    public function getTime(): \DateTime;

    /**
     * Ask price and quantity, with best ask prices ranked from top to bottom
     * @return IMergedOrderBookPriceResponseInterface[]
     */
    public function getAsks(): EntityCollection;

    /**
     * Bid price and quantity, with best bid prices ranked from top to bottom
     * @return IMergedOrderBookPriceResponseInterface[]
     */
    public function getBids(): EntityCollection;

}