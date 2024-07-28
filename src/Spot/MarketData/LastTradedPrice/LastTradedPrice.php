<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice;

use Carpenstar\ByBitAPI\Core\Endpoints\PublicEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Request\LastTradedPriceRequest;
use Carpenstar\ByBitAPI\Spot\MarketData\LastTradedPrice\Response\LastTradedPriceResponse;

/**
 * https://bybit-exchange.github.io/docs/spot/public/last-price
 */
class LastTradedPrice extends PublicEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/public/quote/ticker/price";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return LastTradedPriceResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return LastTradedPriceRequest::class;
    }
}
