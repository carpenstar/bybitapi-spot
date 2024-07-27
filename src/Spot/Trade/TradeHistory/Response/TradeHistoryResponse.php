<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces\ITradeHistoryResponseInterface;

class TradeHistoryResponse extends AbstractResponse implements ITradeHistoryResponseInterface
{
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(TradeHistoryResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    public function getTradeHistory(): array
    {
        return $this->list->all();
    }
}
