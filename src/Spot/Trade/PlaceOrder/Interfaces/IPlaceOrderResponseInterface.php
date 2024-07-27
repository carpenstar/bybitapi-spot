<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces;

interface IPlaceOrderResponseInterface
{
    /**
     * Order ID
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * User-generated order ID
     * @return string|null
     */
    public function getOrderLinkId(): ?string;

    /**
     * Name of the trading pair
     * @return string|null
     */
    public function getSymbol(): ?string;

    /**
     * Order Creation Time
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Last traded price
     * @return float|null
     */
    public function getOrderPrice(): ?float;

    /**
     * Order quantity
     * @return float|null
     */
    public function getOrderQty(): ?float;

    /**
     * Order type
     * @return string|null
     */
    public function getOrderType(): ?string;

    /**
     * Side. BUY, SELL
     * @return string|null
     */
    public function getSide(): ?string;

    /**
     * Order status
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string|null
     */
    public function getTimeInForce(): ?string;

    /**
     * Account ID
     * @return string|null
     */
    public function getAccountId(): ?string;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order
     * @return int|null
     */
    public function getOrderCategory(): ?int;

    /**
     * Trigger price. TP/SL order has this field
     * @return float|null
     */
    public function getTriggerPrice(): ?float;
}
