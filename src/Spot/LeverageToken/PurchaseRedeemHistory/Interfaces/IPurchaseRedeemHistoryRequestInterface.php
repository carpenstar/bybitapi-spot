<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Interfaces;

interface IPurchaseRedeemHistoryRequestInterface
{
    public function getLtCode(): string;
    public function setLtCode(string $ltCode): self;
    public function getOrderId(): string;
    public function setOrderId(string $orderId): self;
    public function getStartTime(): \DateTime;
    public function setStartTime(\DateTime $startTime): self;
    public function getEndTime(): \DateTime;
    public function setEndTime(\DateTime $endTime): self;
    public function getLimit(): int;
    public function setLimit(int $limit): self;
    public function getOrderType(): int;
    public function setOrderType(int $orderType): self;
    public function getSerialNo(): string;
    public function setSerialNo(string $serialNo): self;
}
