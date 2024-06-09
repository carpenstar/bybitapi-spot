<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces;

interface ITradeHistoryResponseItemInterface
{
    /**
     * Name of the trading pair
     * @return string
     */
    public function getSymbol(): string;

    /**
     * Irrelevant for API usage. This field reflects the "Transaction ID" from the Trade History section of the website
     * @return int
     */
    public function getId(): int;

    /**
     * Order ID
     * @return int
     */
    public function getOrderId(): int;

    /**
     * The ID for the trade
     * @return int
     */
    public function getTradeId(): int;

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
     * Trading fee (for a single fill)
     * @return float
     */
    public function getExecFee(): float;

    /**
     * Fee Token ID
     * @return string
     */
    public function getFeeTokenId(): string;

    /**
     * Order created time in the match engine
     * @return \DateTime
     */
    public function getCreatTime(): \DateTime;

    /**
     * 0：Buyer, 1：Seller
     * @return int
     */
    public function getIsBuyer(): int;

    /**
     * 0：Maker, 1：Taker
     * @return int
     */
    public function getIsMaker(): int;

    /**
     * Order ID of the opponent trader
     * @return int
     */
    public function getMatchOrderId(): int;

    /**
     * Maker rebate
     * @return int
     */
    public function getMakerRebate(): int;

    /**
     * Order execution time
     * @return \DateTime
     */
    public function getExecutionTime(): \DateTime;
}