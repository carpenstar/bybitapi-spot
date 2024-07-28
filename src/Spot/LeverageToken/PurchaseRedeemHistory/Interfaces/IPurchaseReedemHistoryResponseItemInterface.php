<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Interfaces;

interface IPurchaseReedemHistoryResponseItemInterface
{
    public function getAmount(): float;
    public function getExecTime(): \DateTime;
    public function getFee(): float;
    public function getLtCode(): string;
    public function getOrderId(): string;
    public function getOrderStatus(): int;
    public function getOrderTime(): \DateTime;
    public function getOrderType(): int;
    public function getSerialNo(): string;
    public function getValue(): float;
    public function getValueCoin(): string;
}
