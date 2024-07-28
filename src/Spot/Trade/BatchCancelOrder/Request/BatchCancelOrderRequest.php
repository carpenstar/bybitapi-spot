<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces\IBatchCancelOrderRequestInterface;

class BatchCancelOrderRequest extends AbstractParameters implements IBatchCancelOrderRequestInterface
{
    /**
     * Name of the trading pair
     * @var string $symbol
     */
    protected string $symbol;

    /**
     * Side. BUY, SELL
     * @var string $side
     */
    protected string $side;

    /**
     * Order type. LIMIT in default. It allows multiple types, separated by comma, e.a LIMIT,LIMIT_MAKER
     * @var string $orderTypes
     */
    protected string $orderTypes;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @var int $orderCategory
     */
    protected int $orderCategory;

    /**
     * @param string $symbol
     * @return BatchCancelOrderRequest
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $side
     * @return BatchCancelOrderRequest
     */
    public function setSide(string $side): self
    {
        $this->side = $side;
        return $this;
    }

    /**
     * @return string
     */
    public function getSide(): string
    {
        return $this->side;
    }

    /**
     * @param string $orderTypes
     * @return BatchCancelOrderRequest
     */
    public function setOrderTypes(string $orderTypes): self
    {
        $this->orderTypes = $orderTypes;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderTypes(): string
    {
        return $this->orderTypes;
    }

    /**
     * @param int $orderCategory
     * @return BatchCancelOrderRequest
     */
    public function setOrderCategory(int $orderCategory): self
    {
        $this->orderCategory = $orderCategory;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderCategory(): int
    {
        return $this->orderCategory;
    }
}
