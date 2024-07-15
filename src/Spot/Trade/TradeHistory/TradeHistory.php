<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IGetEndpointInterface;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Response\TradeHistoryResponse;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Request\TradeHistoryRequest;

class TradeHistory extends PrivateEndpoint implements IGetEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/my-trades";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return TradeHistoryResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return TradeHistoryRequest::class;
    }
}