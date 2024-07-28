<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Response;

use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces\IBatchCancelOrderByIdResponseItemInterface;

class BatchCancelOrderByIdResponseItem extends AbstractResponse implements IBatchCancelOrderByIdResponseItemInterface
{
    /**
     * Order ID
     * @var int $orderId
     */
    private int $orderId;

    /**
     * Error code
     * @var string $code;
     */
    private string $code;

    public function __construct(array $data)
    {
        $this->orderId = $data['orderId'];
        $this->code = $data['code'];
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }
}
