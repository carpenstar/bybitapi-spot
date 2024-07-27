<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Interfaces\IAllAssetInfoResponseInterface;
use Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Interfaces\IAllAssetInfoResponseItemInterface;

class AllAssetInfoResponse extends AbstractResponse implements IAllAssetInfoResponseInterface
{
    /** @var IAllAssetInfoResponseItemInterface $list */
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(AllAssetInfoResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    public function getAssets(): array
    {
        return $this->list->all();
    }
}
