<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Request;

use Carpenstar\ByBitAPI\Core\Enums\EnumIntervals;
use Carpenstar\ByBitAPI\Core\Helpers\StringHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineRequestInterface;

class KlineRequest extends AbstractParameters implements IKlineRequestInterface
{
    /**
     * Name of the trading pair
     * @required true
     * @var string $symbol
     */
    protected string $symbol;

    /**
     * Chart interval. See list intervals in
     * @required true
     * @var string $interval
     */
    protected string $interval = EnumIntervals::MINUTE1;

    /**
     * Limit for data size. [1, 1000]. Default: 1000
     * @required false
     * @var int $limit
     */
    protected int $limit = 1000;

    /**
     * Start time (ms)
     * @required false
     * @var int $startTime
     */
    protected int $startTime;

    /**
     * End time (ms)
     * @required false
     * @var int $endTime
     */
    protected int $endTime;

    /**
     * @param string $symbol
     * @return KlineRequestEntity
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param int $limit
     * @return KlineRequestEntity
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param string $interval
     * @return KlineRequestEntity
     */
    public function setInterval(string $interval): self
    {
        $this->interval = StringHelper::clearInterval($interval) . "m";
        return $this;
    }

    /**
     * @return string
     */
    public function getInterval(): string
    {
        return $this->interval;
    }

    /**
     * @param int $startTime
     * @return KlineRequestEntity
     */
    public function setStartTime(int $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * @param int $endTime
     * @return KlineRequestEntity
     */
    public function setEndTime(int $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getEndTime(): int
    {
        return $this->endTime;
    }
}
