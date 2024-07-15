<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Specify orderId to return all the orders that orderId of which are smaller than this particular one for pagination purpose
     * @param int $orderId
     * @return self
     */
    public function setOrderId(int $orderId): self;
    public function getOrderId(): int;

    /**
     * Limit for data size. [1, 500]. Default: 100
     * @param int $limit
     * @return self
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * The start string datetime, eq: Y-m-d H:i:s
     * @param string $dateTime
     * @return self
     */
    public function setStartTime(string $dateTime): self;
    public function getStartTime(): int;

    /**
     * The end string datetime, eq: Y-m-d H:i:s
     * @param string $endTime
     * @return self
     */
    public function setEndTime(string $endTime): self;
    public function getEndTime(): int;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @param int $orderCategory
     * @return self
     */
    public function setOrderCategory(int $orderCategory): self;
    public function getOrderCategory(): int;
}