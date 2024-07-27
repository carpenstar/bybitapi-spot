<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces;

interface IBestBidAskPriceRequestInterface
{
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;
}
