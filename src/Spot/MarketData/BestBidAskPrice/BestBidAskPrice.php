<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice;

use Carpenstar\ByBitAPI\Core\Endpoints\PublicEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Response\BestBidAskPriceResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\BestBidAskPrice\Request\BestBidAskPriceRequest;

/**
 * https://bybit-exchange.github.io/docs/spot/public/bid-ask
 */
class BestBidAskPrice extends PublicEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/public/quote/ticker/bookTicker";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return BestBidAskPriceResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return BestBidAskPriceRequest::class;
    }
}
