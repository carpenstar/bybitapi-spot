<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookPriceResponseInterface
{
    public function getPrice(): float;
    public function getQuantity(): float;
}
