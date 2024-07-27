<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersRequestInterface;

class OpenOrdersRequest extends AbstractParameters implements IOpenOrdersRequestInterface
{
    /**
     * Name of the trading pair
     * @var string $symbol
     */
    protected string $symbol;

    /**
     * Specify orderId to return all the orders that orderId of which are smaller than
     * this particular one for pagination purpose
     * @var int $orderId
     */
    protected int $orderId;

    /**
     * Limit for data size. [1, 500]. Default: 500
     * @var int $limit
     */
    protected int $limit = 500;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @var int $orderCategory
     */
    protected int $orderCategory;

    /**
     * @param string $symbol
     * @return $this
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
     * @param int $orderId
     * @return OpenOrdersRequest
     */
    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $limit
     * @return OpenOrdersRequest
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $orderCategory
     * @return OpenOrdersRequest
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
