<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook;

use Carpenstar\ByBitAPI\Core\Endpoints\PublicEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Response\MergedOrderBookResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\MergedOrderBook\Request\MergedOrderBookRequest;

/**
 * https://bybit-exchange.github.io/docs/spot/public/merge-depth
 */
class MergedOrderBook extends PublicEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/public/quote/depth/merged";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return MergedOrderBookResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return MergedOrderBookRequest::class;
    }
}
