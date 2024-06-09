<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IPostEndpointInterface;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Response\BatchCancelOrderByIdResponse;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Request\BatchCancelOrderByIdRequest;

class BatchCancelOrderById extends PrivateEndpoint implements  IPostEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/cancel-orders-by-ids";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return BatchCancelOrderByIdResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return BatchCancelOrderByIdRequest::class;
    }
}