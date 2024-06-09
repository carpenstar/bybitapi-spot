<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\Trade\OpenOrders\Interfaces\IOpenOrdersResponseInterface;

class OpenOrdersResponse extends AbstractResponse implements IOpenOrdersResponseInterface
{
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(OpenOrdersResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    public function getOpenOrders(): array
    {
        return $this->list->all();
    }
}