<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces;

interface IKlineResponseInterface
{
    /**
     * @return IKlineResponseItemInterface[]
     */
    public function getKlineList(): array;
}
