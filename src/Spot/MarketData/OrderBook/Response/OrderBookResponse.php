<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response;

use Carpenstar\ByBitAPI\Core\Builders\ResponseDtoBuilder;
use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Core\Objects\Collection\EntityCollection;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookResponseInterface;

class OrderBookResponse extends AbstractResponse implements IOrderBookResponseInterface
{
    /**
     * Current time, unit in millisecond
     * @var \DateTime $time
     */
    protected \DateTime $time;

    /**
     * Bid price and quantity, with best bid prices ranked from top to bottom
     * @var EntityCollection $bids
     */
    protected EntityCollection $bids;

    /**
     * Ask price and quantity, with best ask prices ranked from top to bottom
     * @var EntityCollection $asks
     */
    protected EntityCollection $asks;

    /**
     * @param array $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        $bids = new EntityCollection();
        $asks = new EntityCollection();

        $this->setTime($data['time']);

        if (!empty($data['bids'])) {
            array_map(function ($bid) use ($bids) {
                $bids->push(ResponseDtoBuilder::make(OrderBookPriceItemResponse::class, $bid));
            }, $data['bids']);
        }

        if (!empty($data['asks'])) {
            array_map(function ($ask) use ($asks) {
                $asks->push(ResponseDtoBuilder::make(OrderBookPriceItemResponse::class, $ask));
            }, $data['asks']);
        }

        $this->setBids($bids);
        $this->setAsks($asks);
    }

    /**
     * @param string $time
     * @return OrderBookResponse
     * @throws \Exception
     */
    private function setTime(string $time): self
    {
        $this->time = DateTimeHelper::makeFromTimestamp($time);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime(): \DateTime
    {
        return $this->time;
    }

    /**
     * @param EntityCollection $asks
     * @return OrderBookResponse
     */
    private function setAsks(EntityCollection $asks): self
    {
        $this->asks = $asks;
        return $this;
    }

    /**
     * @return EntityCollection
     */
    public function getAsks(): EntityCollection
    {
        return $this->asks;
    }

    /**
     * @param EntityCollection $bids
     * @return OrderBookResponse
     */
    private function setBids(EntityCollection $bids): self
    {
        $this->bids = $bids;
        return $this;
    }

    /**
     * @return EntityCollection
     */
    public function getBids(): EntityCollection
    {
        return $this->bids;
    }
}
