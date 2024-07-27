<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Interfaces;

interface IReedemResponseInterface
{
    public function getId(): string;
    public function getLtCode(): string;
    public function getOrderAmount(): float;
    public function getOrderQuantity(): float;
    public function getOrderStatus(): int;
    public function getQuantity(): float;
    public function getSerialNo(): string;
    public function getTimestamp(): \DateTime;
    public function getValueCoin(): string;
}
