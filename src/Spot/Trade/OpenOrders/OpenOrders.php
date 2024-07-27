<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response\OpenOrdersResponse;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Request\OpenOrdersRequest;

class OpenOrders extends PrivateEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/open-orders";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return OpenOrdersResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return OpenOrdersRequest::class;
    }
}
