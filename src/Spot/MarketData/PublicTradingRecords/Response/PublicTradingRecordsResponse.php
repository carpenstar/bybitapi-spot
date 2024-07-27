<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\MarketData\PublicTradingRecords\Interfaces\IPublicTradingRecordsResponseInterface;

class PublicTradingRecordsResponse extends AbstractResponse implements IPublicTradingRecordsResponseInterface
{
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(PublicTradingRecordsResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    public function getRecords(): array
    {
        return $this->list->all();
    }
}
