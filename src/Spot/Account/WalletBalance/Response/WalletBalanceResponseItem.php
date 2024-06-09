<?php

namespace Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Response;

use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Interfaces\IWalletBalanceResponseInterfaces;
use Carpenstar\ByBitAPI\Spot\Account\WalletBalance\Interfaces\IWalletBalanceResponseItemInterfaces;

class WalletBalanceResponseItem extends AbstractResponse implements IWalletBalanceResponseItemInterfaces
{
    /**
     * Coin
     * @var string $coin
     */
    private string $coin;

    /**
     * Coin ID
     * @var string $coinId
     */
    private string $coinId;

    /**
     * Total equity
     * @var float
     */
    private float $total;

    /**
     * Available balance
     * @var float
     */
    private float $free;

    /**
     * Reserved for orders
     * @var bool
     */
    private bool $locked;

    public function __construct(array $data)
    {
        $this->coin = $data['coin'];
        $this->coinId = $data['coinId'];
        $this->free = $data['free'];
        $this->total = $data['total'];
        $this->locked = $data['locked'];
    }

    /**
     * @return string
     */
    public function getCoin(): string
    {
        return $this->coin;
    }

    /**
     * @return string
     */
    public function getCoinId(): string
    {
        return $this->coinId;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return float
     */
    public function getFree(): float
    {
        return $this->free;
    }

    /**
     * @return bool
     */
    public function getLocked(): bool
    {
        return $this->locked;
    }
}