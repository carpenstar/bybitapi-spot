<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces\IBatchCancelOrderByIdRequestInterface;

class BatchCancelOrderByIdRequest extends AbstractParameters implements IBatchCancelOrderByIdRequestInterface
{
    /**
     * Order ID, use commas to indicate multiple orderIds. Maximum of 100 ids.
     * @var string $orderIds
     */
    protected string $orderIds;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @var int $orderCategory
     */
    protected int $orderCategory;

    /**
     * @param string $orderIds
     * @return BatchCancelOrderByIdRequest
     */
    public function setOrderIds(string $orderIds): self
    {
        $this->orderIds = $orderIds;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderIds(): string
    {
        return $this->orderIds;
    }

    /**
     * @param int $orderCategory
     * @return BatchCancelOrderByIdRequest
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