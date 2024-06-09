<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Interfaces;

interface IPurchaseReedemHistoryResponseInterface
{
    public function getPurchaseHistory(): array;
}