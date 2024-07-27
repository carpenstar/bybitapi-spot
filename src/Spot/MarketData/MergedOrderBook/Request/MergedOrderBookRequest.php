<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Interfaces\IMergedOrderBookRequestInterface;

class MergedOrderBookRequest extends AbstractParameters implements IMergedOrderBookRequestInterface
{
    /**
     * Name of the trading pair
     * @required true
     * @var string $symbol
     */
    protected string $symbol;

    /**
     * Precision of the merged orderbook, 1 means 1 digit
     * @required false
     * @var int $scale
     */
    protected int $scale = 1;

    /**
     * Limit for data size. [1, 200]. Default: 100
     * @required false
     * @var int $limit
     */
    protected int $limit = 100;

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * Name of the trading pair
     * @param string $symbol
     * @return MergedOrderBookRequest
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return int
     */
    public function getScale(): int
    {
        return $this->scale;
    }

    /**
     * Precision of the merged orderbook, 1 means 1 digit
     * @param int $scale
     * @return MergedOrderBookRequest
     */
    public function setScale(int $scale): self
    {
        $this->scale = $scale;
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
     * Limit for data size. [1, 200]. Default: 100
     * @param int $limit
     * @return MergedOrderBookRequest
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }
}