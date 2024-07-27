<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;

class OrderHistoryResponse extends AbstractResponse
{
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(OrderHistoryResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    public function getOrderHistory(): array
    {
        return $this->list->all();
    }
}
