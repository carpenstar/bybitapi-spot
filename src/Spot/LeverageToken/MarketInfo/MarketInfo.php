<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo;

use Carpenstar\ByBitAPI\Core\Endpoints\PublicEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Request\MarketInfoRequest;
use Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Response\MarketInfoResponse;

class MarketInfo extends PublicEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/reference";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return MarketInfoResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return MarketInfoRequest::class;
    }
}
