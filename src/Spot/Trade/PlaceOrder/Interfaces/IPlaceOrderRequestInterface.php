<?php
namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces;

interface IPlaceOrderRequestInterface
{
    /**
     * Name of the trading pair
     * @param string $symbol
     * @return self
     */
    public function setSymbol(string $symbol): self;
    public function getSymbol(): ?string;

    /**
     * Order type
     * @param string $orderType
     * @return self
     */
    public function setOrderType(string $orderType): self;
    public function getOrderType(): ?string;

    /**
     * Side. BUY, SELL
     * @param string $side
     * @return self
     */
    public function setSide(string $side): self;
    public function getSide(): ?string;

    /**
     * User-generated order ID
     * @param string $orderLinkId
     * @return self
     */
    public function setOrderLinkId(string $orderLinkId): self;
    public function getOrderLinkId(): ?string;

    /**
     * Order qty. When you place a MARKET BUY order, this param means quote amount. e.g., MARKET BUY BTCUSDT, orderQty should be 200 USDT
     * @param float $orderQty
     * @return self
     */
    public function setOrderQty(float $orderQty): self;
    public function getOrderQty(): ?string;

    /**
     * Order price. When the type field is MARKET, the price field is optional. When the type field is LIMIT or LIMIT_MAKER, the price field is required
     * @param float $orderPrice
     * @return self
     */
    public function setOrderPrice(float $orderPrice): self;
    public function getOrderPrice(): ?float;

    /**
     * Time in force
     * @param string $timeInForce
     * @return self
     */
    public function setTimeInForce(string $timeInForce): self;
    public function getTimeInForce(): ?string;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @param string $orderCategory
     * @return self
     */
    public function setOrderCategory(string $orderCategory): self;
    public function getOrderCategory(): ?string;

    /**
     * Trigger price. Used for TP/SL order
     * @param float $triggerPrice
     * @return self
     */
    public function setTriggerPrice(float $triggerPrice): self;
    public function getTriggerPrice(): ?float;
}