<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Interfaces;

interface IPublicTradingRecordsResponseInterface
{
    /**
     * @return IPublicTradingRecordsResponseItemInterface[]
     */
    public function getRecords(): array;
}
