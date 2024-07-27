<?php

namespace Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Overrides;

use Carpenstar\ByBitAPI\Core\Traits\OverrideExecuteTrait;
use Carpenstar\ByBitAPI\Spot\Account\WalletBalance\WalletBalance;

final class TestWalletBalance extends WalletBalance
{
    use OverrideExecuteTrait;
}
