<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;

interface IOrderBookResponseInterface
{
    public function getTime(): \DateTime;
    public function getAsks(): EntityCollection;
    public function getBids(): EntityCollection;
}
