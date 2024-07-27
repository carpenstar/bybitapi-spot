<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\GetOrder\Interfaces;

interface IGetOrderResponseInterface
{
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
     * Order price
     * @return float
     */
    public function getOrderPrice(): float;

    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Account ID
     * @return int
     */
    public function getAccountId(): int;

    /**
     * Average filled price
     * @return float
     */
    public function getAvgPrice(): float;

    /**
     * Order created time in the match engine
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Total order quantity. For some historical data, it might less than 0, and that means it is not applicable
     * @return float
     */
    public function getCummulativeQuoteQty(): float;

    /**
     * Executed quantity
     * @return float
     */
    public function getExecQty(): float;

    /**
     * Is working. 0：valid, 1：invalid
     * @return int
     */
    public function getIsWorking(): int;

    /**
     * Reserved for order (if it's 0, it means that the funds corresponding to the order have been settled)
     * @return float
     */
    public function getLocked(): float;

    /**
     * Order quantity
     * @return float
     */
    public function getOrderQty(): float;

    /**
     * Order type
     * @return string
     */
    public function getOrderType(): string;

    /**
     * Order direction
     * @return string
     */
    public function getSide(): string;

    /**
     * Order status
     * @return string
     */
    public function getStatus(): string;

    /**
     * Stop price
     * @return float
     */
    public function getStopPrice(): float;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string
     */
    public function getTimeInForce(): string;

    /**
     * Last time order was updated
     * @return \DateTime
     */
    public function getUpdateTime(): \DateTime;
}
