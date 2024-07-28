<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces\IBatchCancelOrderByIdResponseInterface;
use Carpenstar\ByBitAPI\Spot\Trade\BatchCancelOrderById\Interfaces\IBatchCancelOrderByIdResponseItemInterface;

/**
 * Notice:  If all success, it will be empty
 */
class BatchCancelOrderByIdResponse extends AbstractResponse implements IBatchCancelOrderByIdResponseInterface
{
    /** @var EntityCollection $list */
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(BatchCancelOrderByIdResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    /**
     * Object. If all success, it returns empty array
     * @return IBatchCancelOrderByIdResponseItemInterface[]
     */
    public function getErrorOrderList(): array
    {
        return $this->list->all();
    }
}
