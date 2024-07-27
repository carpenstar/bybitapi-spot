<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Response\BatchCancelOrderResponse;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Request\BatchCancelOrderRequest;

class BatchCancelOrder extends PrivateEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::POST;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/cancel-orders";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return BatchCancelOrderResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return BatchCancelOrderRequest::class;
    }
}
