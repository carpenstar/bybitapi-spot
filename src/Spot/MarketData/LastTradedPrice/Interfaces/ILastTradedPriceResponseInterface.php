<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces;

interface ILastTradedPriceResponseInterface
{
    public function getSymbol(): string;
    public function getPrice(): float;
}
