<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces;

interface ITickerRequestInterface
{
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;
}
