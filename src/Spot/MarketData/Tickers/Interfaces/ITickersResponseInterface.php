<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces;

interface ITickersResponseInterface
{
    public function getTime(): \DateTime;
    public function getSymbol(): string;
    public function getBestAskPrice(): float;
    public function getLastTradedPrice(): float;
    public function getHighPrice(): float;
    public function getLowPrice(): float;
    public function getOpenPrice(): float;
    public function getBestBidPrice(): float;
    public function getTradingVolume(): float;
    public function getTradingQuoteVolume(): float;
}
