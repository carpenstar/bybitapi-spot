<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces\ITickerRequestInterface;

class TickersRequest extends AbstractParameters implements ITickerRequestInterface
{
    /**
     * Name of the trading pair
     * @required false
     * @var string $symbol
     */
    protected string $symbol;

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return TickersRequest
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }
}
