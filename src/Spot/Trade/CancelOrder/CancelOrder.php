<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Response\CancelOrderResponse;
use Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Request\CancelOrderRequest;

/**
 * https://bybit-exchange.github.io/docs/spot/trade/cancel
 */
class CancelOrder extends PrivateEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::POST;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/cancel-order";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return CancelOrderResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return CancelOrderRequest::class;
    }
}
