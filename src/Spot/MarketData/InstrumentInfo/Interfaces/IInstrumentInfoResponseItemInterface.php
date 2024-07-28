<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces;

interface IInstrumentInfoResponseItemInterface
{
    /**
     * Name of the trading pair
     * @return string
     */
    public function getName(): string;

    /**
     * Alias
     * @return string
     */
    public function getAlias(): string;

    /**
     * Base currency
     * @return string
     */
    public function getBaseCoin(): string;

    /**
     * Quote currency
     * @return string
     */
    public function getQuoteCoin(): string;

    /**
     * Decimal precision (base currency)
     * @return float
     */
    public function getBasePrecision(): float;

    /**
     * Decimal precision (quote currency)
     * @return float
     */
    public function getQuotePrecision(): float;

    /**
     * Min. order qty (Not valid for market buy orders)
     * @return float
     */
    public function getMinTradeQty(): float;

    /**
     * Min. order value (Only valid for market buy orders)
     * @return float
     */
    public function getMinTradeAmt(): float;

    /**
     * Max. order qty (It is ignored when you place an order with order type LIMIT_MAKER)
     * @return float
     */
    public function getMaxTradeQty(): float;

    /**
     * Max. order value (It is ignored when you place an order with order type LIMIT_MAKER)
     * @return int
     */
    public function getMaxTradeAmt(): int;

    /**
     * Min. number of decimal places
     * @return float
     */
    public function getMinPricePrecision(): float;

    /**
     * Category
     * @return int
     */
    public function getCategory(): int;

    /**
     * 1 indicates that the price of this currency is relatively volatile
     * @return int
     */
    public function getShowStatus(): int;

    /**
     * 1 indicates that the symbol open for trading
     * @return int
     */
    public function getInnovation(): int;
}
