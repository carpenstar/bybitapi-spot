<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces\IBestBidAskPriceRequestInterface;

class BestBidAskPriceRequest extends AbstractParameters implements IBestBidAskPriceRequestInterface
{
    /**
     * Name of the trading pair
     * @required true
     * @var string $symbol
     */
    protected string $symbol;

    /**
     * @param string $symbol
     * @return BestBidAskPriceRequest
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
}