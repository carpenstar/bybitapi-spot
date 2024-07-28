<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Interfaces;

interface IMarketInfoRequestInterface
{
    public function setLtCode(string $ltCode): IMarketInfoRequestInterface;
    public function getLtCode(): string;
}
