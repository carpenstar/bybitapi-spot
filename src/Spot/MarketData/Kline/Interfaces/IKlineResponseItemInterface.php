<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineResponseItemInterface
{
    /**
     * Timestamp
     * @return \DateTime
     */
    public function getTime(): \DateTime;

    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Alias
     * @return string
     */
    public function getAlias(): string;

    /**
     * Close price
     * @return float
     */
    public function getClosePrice(): float;

    /**
     * High price
     * @return float
     */
    public function getHighPrice(): float;

    /**
     * Low price
     * @return float
     */
    public function getLowPrice(): float;

    /**
     * Open price
     * @return float
     */
    public function getOpenPrice(): float;

    /**
     * Trading volume
     * @return float
     */
    public function getTradingVolume(): float;
}