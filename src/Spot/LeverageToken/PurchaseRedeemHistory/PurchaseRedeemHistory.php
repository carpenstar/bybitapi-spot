<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Enums\EnumHttpMethods;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Request\PurchaseRedeemHistoryRequest;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Response\PurchaseRedeemHistoryResponseItem;

class PurchaseRedeemHistory extends PrivateEndpoint
{
    public function getEndpointRequestMethod(): string
    {
        return EnumHttpMethods::GET;
    }

    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/record";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return PurchaseRedeemHistoryResponseItem::class;
    }

    protected function getRequestClassname(): string
    {
        return PurchaseRedeemHistoryRequest::class;
    }
}
