<?php
namespace Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Interfaces;

interface IWalletBalanceResponseItemInterfaces
{
    public function getCoin(): string;
    public function getCoinId(): string;
    public function getTotal(): float;
    public function getFree(): float;
    public function getLocked(): bool;
}