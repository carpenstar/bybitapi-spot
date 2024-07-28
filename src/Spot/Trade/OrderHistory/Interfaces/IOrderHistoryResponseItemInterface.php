<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\OrderHistory\Interfaces;

interface IOrderHistoryResponseItemInterface
{
    /**
     * Account ID
     * @return int
     */
    public function getAccountId(): int;

    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * User-generated order ID
     * @return string
     */
    public function getOrderLinkId(): string;

    /**
     * Order ID
     * @return int
     */
    public function getOrderId(): int;

    /**
     * Last traded price
     * @return float
     */
    public function getOrderPrice(): float;

    /**
     * Order quantity
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Executed quantity
     * @return float
     */
    public function getExecQty(): float;

    /**
     * Total order quantity
     * @return float
     */
    public function getCummulativeQuoteQty(): float;

    /**
     * Average filled price
     * @return float
     */
    public function getAvgPrice(): float;

    /**
     * Order status
     * @return string
     */
    public function getStatus(): string;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string
     */
    public function getTimeInForce(): string;

    /**
     * Order type
     * @return string
     */
    public function getOrderType(): string;

    /**
     * Side. BUY, SELL
     * @return string
     */
    public function getSide(): string;

    /**
     * Stop price
     * @return float
     */
    public function getStopPrice(): float;

    /**
     * Order created time in the match engine
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Last time order was updated
     * @return \DateTime
     */
    public function getUpdateTime(): \DateTime;

    /**
     * Is working. 0：valid, 1：invalid
     * @return int
     */
    public function getIsWorking(): int;

    /**
     * Order category. 0：normal order; 1：TP/SL order. TP/SL order has this field
     * @return int
     */
    public function getOrderCategory(): int;

    /**
     * Trigger price. TP/SL order has this field
     * @return float|null
     */
    public function getTriggerPrice(): ?float;
}
