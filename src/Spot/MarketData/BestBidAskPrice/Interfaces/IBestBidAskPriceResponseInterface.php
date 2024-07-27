<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces;

interface IBestBidAskPriceResponseInterface
{
    public function getSymbol(): string;
    public function getAskPrice(): float;
    public function getAskQty(): float;
    public function getBidPrice(): float;
    public function getBidQty(): float;
    public function getTime(): \DateTime;
}
