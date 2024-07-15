<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return ITradeHistoryRequestInterface
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): string;

    /**
     * Order ID
     * @param int $orderId
     * @return ITradeHistoryRequestInterface
     */
    public function setOrderId(int $orderId): self;
    public function getOrderId(): int;

    /**
     * End datetime, eq Y-m-d H:i:s
     * @param int $endTime
     * @return ITradeHistoryRequestInterface
     */
    public function setEndTime(int $endTime): self;
    public function getEndTime(): int;

    /**
     * Start datetime, eq Y-m-d H:i:s
     * @param int $startTime
     * @return ITradeHistoryRequestInterface
     */
    public function setStartTime(int $startTime): self;
    public function getStartTime(): int;

    /**
     * Default value is 50, max 50
     * @param int $limit
     * @return ITradeHistoryRequestInterface
     */
    public function setLimit(int $limit): self;
    public function getLimit(): int;

    /**
     * Query smaller than the trade ID
     * @param int $toTradeId
     * @return ITradeHistoryRequestInterface
     */
    public function setToTradeId(int $toTradeId): self;
    public function getToTradeId(): int;

    /**
     * Query greater than the trade ID
     * @param int $fromTradeId
     * @return ITradeHistoryRequestInterface
     */
    public function setFromTradeId(int $fromTradeId): self;
    public function getFromTradeId(): int;
}