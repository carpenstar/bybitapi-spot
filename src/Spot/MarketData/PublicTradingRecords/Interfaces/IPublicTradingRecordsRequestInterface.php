<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Interfaces;

interface IPublicTradingRecordsRequestInterface
{
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;
    public function setLimit(int $limit): self;
    public function getLimit(): int;
}
