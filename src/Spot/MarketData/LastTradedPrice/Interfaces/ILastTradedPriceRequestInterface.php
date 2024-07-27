<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces;

interface ILastTradedPriceRequestInterface
{
    public function getSymbol(): string;
    public function setSymbol(string $symbol): self;
}
