<?php

namespace Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Interfaces;

interface IWalletBalanceResponseInterfaces
{
    public function getBalance(): array;
}