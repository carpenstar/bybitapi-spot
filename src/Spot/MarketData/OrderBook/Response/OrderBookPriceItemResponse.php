<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Response;

use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\OrderBook\Interfaces\IOrderBookPriceResponseInterface;

class OrderBookPriceItemResponse extends AbstractResponse implements IOrderBookPriceResponseInterface
{
    /**
     * Price position value
     * @var float
     */
    private float $price;

    /**
     * Quantity position value
     * @var float
     */
    private float $quantity;


    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this
            ->setPrice($data[0])
            ->setQuantity($data[1]);
    }

    /**
     * @param float $price
     * @return $this
     */
    private function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $quantity
     * @return MergedOrderBookResponseItem
     */
    private function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
}
