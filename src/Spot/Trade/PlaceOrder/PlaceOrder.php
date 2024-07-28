<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Response\PlaceOrderResponse;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Request\PlaceOrderRequest;

/**
 * https://bybit-exchange.github.io/docs/spot/trade/place-order
 */
class PlaceOrder extends PrivateEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::POST;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/order";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return PlaceOrderResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return PlaceOrderRequest::class;
    }
}
