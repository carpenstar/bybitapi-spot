<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook;

use Carpenstar\ByBitAPI\Core\Endpoints\PublicEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IGetEndpointInterface;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response\OrderBookResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Request\OrderBookRequest;

/**
 * https://bybit-exchange.github.io/docs/spot/public/depth
 */
class OrderBook extends PublicEndpoint implements IGetEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/public/quote/depth";
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return OrderBookResponse::class;
    }

    protected function getRequestClassname(): string
    {
        return OrderBookRequest::class;
    }
}