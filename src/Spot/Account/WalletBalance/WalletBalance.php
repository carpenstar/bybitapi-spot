<?php
namespace Carpenstar\ByBitAPI\Spot\Account\WalletBalance;

use Carpenstar\ByBitAPI\Core\Endpoints\PrivateEndpoint;
use Carpenstar\ByBitAPI\Core\Interfaces\IGetEndpointInterface;
use Carpenstar\ByBitAPI\Core\Objects\StubQueryBag;
use Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Response\WalletBalanceResponse;

/**
 * https://bybit-exchange.github.io/docs/spot/wallet
 */
class WalletBalance extends PrivateEndpoint implements IGetEndpointInterface
{
    protected function getEndpointUrl(): string
    {
        return "/spot/v3/private/account";
    }

    protected function getRequestClassname(): string
    {
        return StubQueryBag::class;
    }

    protected function getResponseClassnameByCondition(array &$apiData = null): string
    {
        return WalletBalanceResponse::class;
    }
}