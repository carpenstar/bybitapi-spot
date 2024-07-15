<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline;

use Carpenstar\ByBitAPI\Core\Endpoints\PublicEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IGetEndpointInterface;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response\KlineResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Request\KlineRequest;

/**
 * https://bybit-exchange.github.io/docs/spot/public/kline
 */
class Kline extends PublicEndpoint implements IGetEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/public/quote/kline";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return KlineResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return KlineRequest::class;
    }
}