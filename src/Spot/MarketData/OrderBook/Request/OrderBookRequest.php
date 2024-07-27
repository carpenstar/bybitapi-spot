<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookRequestInterface;

class OrderBookRequest extends AbstractParameters implements IOrderBookRequestInterface
{
    /**
     * Symbol
     * @required true
     * @var string $symbol
     */
    protected string $symbol;

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
     * @param string $symbol
     * @return $this
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
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
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }
}
