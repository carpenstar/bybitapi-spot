<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Response;

use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrder\Interfaces\IBatchCancelOrderResponseInterface;

class BatchCancelOrderResponse extends AbstractResponse implements IBatchCancelOrderResponseInterface
{
    /** @var bool $success */
    private bool $success;

    public function __construct(array $data)
    {
        $this->success = (bool) $data['success'];
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }
}