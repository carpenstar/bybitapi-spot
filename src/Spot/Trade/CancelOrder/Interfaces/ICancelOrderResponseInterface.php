<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\CancelOrder\Interfaces;

interface ICancelOrderResponseInterface
{
    /**
     * Order ID
     * @return int|null
     */
    public function getOrderId(): ?int;

    /**
     * User-generated order ID
     * @return string
     */
    public function getOrderLinkId(): string;

    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Order status
     * @return string
     */
    public function getStatus(): string;

    /**
     * Account ID
     * @return int
     */
    public function getAccountId(): ?int;

    /**
     * Order price
     * @return float|null
     */
    public function getOrderPrice(): ?float;

    /**
     * Order Creation Time
     * @return \DateTime
     */
    public function getCreateTime(): \DateTime;

    /**
     * Order quantity
     * @return float|null
     */
    public function getOrderQty(): ?float;

    /**
     * Executed quantity
     * @return float|null
     */
    public function getExecQty(): ?float;

    /**
     * Time in force
     * https://www.bybit.com/en-US/help-center/bybitHC_Article?language=en_US&id=000001044
     * @return string|null
     */
    public function getTimeInForce(): ?string;

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
}
