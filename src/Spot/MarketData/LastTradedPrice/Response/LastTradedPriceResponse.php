<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Response;

use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Interfaces\ILastTradedPriceResponseInterface;

class LastTradedPriceResponse extends AbstractResponse implements ILastTradedPriceResponseInterface
{
    /**
     * Name of the trading pair
     * @var string $symbol
     */
    private string $symbol;

    /**
     * Last traded price
     * @var float
     */
    private float $price;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this
            ->setSymbol($data['symbol'])
            ->setPrice($data['price']);
    }

    /**
     * @param string $symbol
     * @return LastTradedPriceResponse
     */
    private function setSymbol(string $symbol): self
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
     * @param float $price
     * @return LastTradedPriceResponse
     */
    private function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}
