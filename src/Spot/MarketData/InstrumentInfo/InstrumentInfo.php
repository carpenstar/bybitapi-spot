<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo;

use Carpenstar\ByBitAPI\Core\Endpoints\PublicEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Core\Objects\StubQueryBag;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoResponseItem;

/**
 * Get the spec of symbol information
 *
 * https://bybit-exchange.github.io/docs/spot/public/instrument
 */
class InstrumentInfo extends PublicEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/public/symbols";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return InstrumentInfoResponseItem::class;
    }

    protected function getRequestClassname(): string
    {
        return StubQueryBag::class;
    }
}
