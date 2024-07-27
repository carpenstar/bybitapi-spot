<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces;

interface IOrderBookRequestInterface
{
    public function getSymbol(): string;
    public function setSymbol(string $symbol): self;
    public function getLimit(): int;
    public function setLimit(int $limit): self;
}
