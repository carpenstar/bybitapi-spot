<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\Kline\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response\InstrumentInfoResponseItem;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineResponseInterface;
use Carpenstar\ByBitAPI\Spot\MarketData\Kline\Interfaces\IKlineResponseItemInterface;

class KlineResponse extends AbstractResponse implements IKlineResponseInterface
{
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(KlineResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    public function getKlineList(): array
    {
        return $this->list->all();
    }
}