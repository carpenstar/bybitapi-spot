<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Limit for data size. [1, 1000]. Default: 1000
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * Chart interval
     * @param string $interval
     * @return self
     */
    public function setInterval(string $interval): self;
    public function getInterval(): string;

    /**
     * Start time, eq: Y-m-d H:i:s
     * @param int $startTime
     * @return self
     */
    public function setStartTime(int $startTime): self;
    public function getStartTime(): int;

    /**
     * End time, eq: H:i:s
     * @param int $endTime
     * @return self
     */
    public function setEndTime(int $endTime): self;
    public function getEndTime(): int;
}
