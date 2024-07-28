<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Interfaces;

interface IPurchaseRequestInterface
{
    public function getLtCode(): string;
    public function setLtCode(string $ltCode): self;
    public function getLtAmount(): float;
    public function setLtAmount(float $ltAmount): self;
    public function getSerialNo(): string;
    public function setSerialNo(string $serialNo): self;
}
