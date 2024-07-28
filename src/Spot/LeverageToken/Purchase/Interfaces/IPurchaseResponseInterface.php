<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Interfaces;

interface IPurchaseResponseInterface
{
    public function getAmount(): float;
    public function getId(): string;
    public function getLtCode(): string;
    public function getOrderAmount(): float;
    public function getOrderQuantity(): float;
    public function getOrderStatus(): int;
    public function getSerialNo(): string;
    public function getTimestamp(): \DateTime;
    public function getValueCoin(): string;
}
