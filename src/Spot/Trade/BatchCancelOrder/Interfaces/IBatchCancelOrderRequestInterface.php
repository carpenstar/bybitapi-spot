<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces;

interface IBatchCancelOrderRequestInterface
{
    /**
     * Name of the trading pair
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Side. BUY, SELL
     * @var string $side
     */
    public function setSide(string $side): self;
    public function getSide(): string;

    /**
     * Order type. LIMIT in default. It allows multiple types, separated by comma, e.a LIMIT,LIMIT_MAKER
     * @var string $orderTypes
     */
    public function setOrderTypes(string $orderTypes): self;
    public function getOrderTypes(): string;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * See at Carpenstar\ByBitAPI\Core\Enums\EnumOrderCategory
     */
    public function setOrderCategory(int $orderCategory): self;
    public function getOrderCategory(): int;
}