<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IGetEndpointInterface;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Response\GetOrderResponse;
use Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Request\GetOrderRequest;

/**
 * https://bybit-exchange.github.io/docs/spot/trade/get-order
 */
class GetOrder extends PrivateEndpoint implements IGetEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/order";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return GetOrderResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return GetOrderRequest::class;
    }
}