<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces;

interface IMergedOrderBookRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Precision of the merged orderbook, 1 means 1 digit
     * @param int $scale
     * @return self
     */
    public function setScale(int $scale): self;
    public function getScale(): int;

    /**
     * Limit for data size. [1, 200]. Default: 100
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;
}
