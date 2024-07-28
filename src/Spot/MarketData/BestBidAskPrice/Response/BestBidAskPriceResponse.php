<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Interfaces\IBestBidAskPriceResponseInterface;

class BestBidAskPriceResponse extends AbstractResponse implements IBestBidAskPriceResponseInterface
{
    /**
     * Name of the trading pair
     * @var string $symbol
     */
    private string $symbol;

    /**
     * Best bid price
     * @var float $bidPrice
     */
    private float $bidPrice;

    /**
     * Bid quantity
     * @var float $bidQty
     */
    private float $bidQty;

    /**
     * Best ask price
     * @var float $askPrice
     */
    private float $askPrice;

    /**
     * Ask quantity
     * @var float $askQty
     */
    private float $askQty;

    /**
     * @var \DateTime $time
     */
    private \DateTime $time;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this
            ->setSymbol($data['symbol'])
            ->setTime($data['time'])
            ->setAskPrice($data['askPrice'])
            ->setBidPrice($data['bidPrice'])
            ->setBidQty($data['bidQty'])
            ->setAskQty($data['askQty']);
    }

    /**
     * @param string $symbol
     * @return $this
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
     * @param float $askPrice
     * @return BestBidAskPriceResponse
     */
    private function setAskPrice(float $askPrice): self
    {
        $this->askPrice = $askPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getAskPrice(): float
    {
        return $this->askPrice;
    }

    /**
     * @param float $askQty
     * @return BestBidAskPriceResponse
     */
    private function setAskQty(float $askQty): self
    {
        $this->askQty = $askQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getAskQty(): float
    {
        return $this->askQty;
    }

    /**
     * @param float $bidPrice
     * @return BestBidAskPriceResponse
     */
    private function setBidPrice(float $bidPrice): self
    {
        $this->bidPrice = $bidPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getBidPrice(): float
    {
        return $this->bidPrice;
    }

    /**
     * @param float $bidQty
     * @return BestBidAskPriceResponse
     */
    private function setBidQty(string $bidQty): self
    {
        $this->bidQty = $bidQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getBidQty(): float
    {
        return $this->bidQty;
    }

    /**
     * @param int $time
     * @return BestBidAskPriceResponse
     */
    private function setTime(int $time): self
    {
        $this->time = DateTimeHelper::makeFromTimestamp($time);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime(): \DateTime
    {
        return $this->time;
    }
}
