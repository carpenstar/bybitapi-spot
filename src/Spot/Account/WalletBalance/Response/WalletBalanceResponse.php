<?php

namespace Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Interfaces\IWalletBalanceResponseInterfaces;

class WalletBalanceResponse extends AbstractResponse implements IWalletBalanceResponseInterfaces
{
    /** @var WalletBalanceResponseItem[] $balance */
    private EntityCollection $balance;

    public function __construct(array $data)
    {
        $balance = new EntityCollection();

        if (!empty($data['balances'])) {
            array_map(function ($item) use ($balance) {
                $balance->push(ResponseDtoBuilder::make(WalletBalanceResponseItem::class, $item));
            }, $data['balances']);
        }

        $this->balance = $balance;
    }

    public function getBalance(): array
    {
        return $this->balance->all();
    }
}
