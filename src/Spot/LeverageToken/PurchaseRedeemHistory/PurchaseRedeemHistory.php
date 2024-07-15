<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IGetEndpointInterface;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Request\PurchaseRedeemHistoryRequest;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Response\PurchaseRedeemHistoryResponseItem;

class PurchaseRedeemHistory extends PrivateEndpoint implements IGetEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/record";
    }

    protected function getResponseClassnameByCondition(): string
    {
        return PurchaseRedeemHistoryResponseItem::class;
    }

    protected function getRequestClassname(): string
    {
        return PurchaseRedeemHistoryRequest::class;
    }
}