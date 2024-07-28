<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryResponseInterface
{
    /**
     * @return ITradeHistoryResponseItemInterface[]
     */
    public function getTradeHistory(): array;
}
