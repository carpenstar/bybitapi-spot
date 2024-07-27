<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Interfaces\IPurchaseReedemHistoryResponseInterface;

class PurchaseRedeemHistoryResponse extends AbstractResponse implements IPurchaseReedemHistoryResponseInterface
{
    private EntityCollection $list;

    public function __construct(array $data)
    {
        $list = new EntityCollection();

        if (!empty($data['list'])) {
            array_map(function ($item) use ($list) {
                $list->push(ResponseDtoBuilder::make(PurchaseRedeemHistoryResponseItem::class, $item));
            }, $data['list']);
        }

        $this->list = $list;
    }

    /**
     * @return PurchaseRedeemHistoryResponseItem[]
     */
    public function getPurchaseHistory(): array
    {
        return $this->list->all();
    }
}
