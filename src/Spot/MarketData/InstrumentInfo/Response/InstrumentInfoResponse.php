<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces\IInstrumentInfoResponseInterface;

class InstrumentInfoResponse extends AbstractResponse implements IInstrumentInfoResponseInterface
{
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(InstrumentInfoResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    public function getInstrumentInfoList(): array
    {
        return $this->list->all();
    }
}
