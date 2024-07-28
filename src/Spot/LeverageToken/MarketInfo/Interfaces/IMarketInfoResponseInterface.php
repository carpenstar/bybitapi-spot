<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Interfaces;

interface IMarketInfoResponseInterface
{
    public function getBasket(): float;
    public function getCirculation(): float;
    public function getLeverage(): float;
    public function getLtCode(): string;
    public function getNav(): float;
    public function getNavTime(): \DateTime;
}
