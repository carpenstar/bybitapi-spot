<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces;

interface IInstrumentInfoResponseInterface
{
    /**
     * @return  IInstrumentInfoResponseItemInterface[]
     */
    public function getInstrumentInfoList(): array;
}
