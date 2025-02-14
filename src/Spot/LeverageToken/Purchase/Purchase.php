<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Request\PurchaseRequest;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Response\PurchaseResponse;

class Purchase extends PrivateEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::POST;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/purchase";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return PurchaseResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return PurchaseRequest::class;
    }
}
