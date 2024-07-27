<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Interfaces;

interface IReedemRequestInterface
{
    public function getLtCode(): string;
    public function setLtCode(string $ltCode): self;
    public function getLtQuantity(): float;
    public function setLtQuantity(float $ltQuantity): self;
    public function getSerialNo(): string;
    public function setSerialNo(string $serialNo): self;
}
