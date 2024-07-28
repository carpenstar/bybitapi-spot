<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces\ILastTradedPriceRequestInterface;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\LastTradedPrice;

class LastTradedPriceRequest extends AbstractParameters implements ILastTradedPriceRequestInterface
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
     * @return LastTradedPrice
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }
}
