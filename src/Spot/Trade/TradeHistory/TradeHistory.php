<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Response\TradeHistoryResponse;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Request\TradeHistoryRequest;

class TradeHistory extends PrivateEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

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
