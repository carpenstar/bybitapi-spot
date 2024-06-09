<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IPostEndpointInterface;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Request\ReedemRequest;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Response\ReedemResponse;

class Reedem extends PrivateEndpoint implements IPostEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/redeem";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return ReedemResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return ReedemRequest::class;
    }
}