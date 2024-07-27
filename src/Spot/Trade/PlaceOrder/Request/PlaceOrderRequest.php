<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Request;

use Carpenstar\ByBitAPI\Core\Enums\EnumOrderType;
use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\Trade\PlaceOrder\Interfaces\IPlaceOrderRequestInterface;

/**
 * Warning: Do not use the duplicate orderLinkId in normal order & TP/SL order
 */
class PlaceOrderRequest extends AbstractParameters implements IPlaceOrderRequestInterface
{
    /**
     * Name of the trading pair
     * @var string $symbol
     * @required true
     */
    protected string $symbol;

    /**
     * Order type
     * @var string $orderType
     * @required true
     */
    protected string $orderType = EnumOrderType::MARKET;

    /**
     * Side. BUY, SELL
     * @var string $side
     * @required true
     */
    protected string $side;

    /**
     * User-generated order ID
     * @var string $orderLinkId
     * @required false
     */
    protected string $orderLinkId;

    /**
     * Order price. When the type field is MARKET, the price field is optional.
     * When the type field is LIMIT or LIMIT_MAKER, the price field is required
     * @var float $orderPrice
     * @required false
     */
    protected float $orderPrice;

    /**
     * Time in force. E.q. EnumTimeInForce::GOOD_TILL_CANCELED
     * @var string $timeInForce
     * @required false
     */
    protected string $timeInForce;

    /**
     * Order qty. When you place a MARKET BUY order, this param means quote amount. e.g.,
     * MARKET BUY BTCUSDT, orderQty should be 200 USDT
     * @var float $orderQty
     * @required true
     */
    protected float $orderQty;

    /**
     * Order category. 0：normal order by default; 1：TP/SL order, Required for TP/SL order.
     * @var string
     * @required false
     */
    protected string $orderCategory;

    /**
     * Trigger price. Used for TP/SL order
     * @var float $triggerPrice
     * @required false
     */
    protected float $triggerPrice;

    /**
     * @param string $symbol
     * @return $this
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * @param string $orderType
     * @return $this
     */
    public function setOrderType(string $orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderType(): ?string
    {
        return $this->orderType;
    }

    /**
     * @param string $side
     * @return $this
     */
    public function setSide(string $side): self
    {
        $this->side = $side;
        return $this;
    }

    /**
     * @return string
     */
    public function getSide(): ?string
    {
        return $this->side;
    }

    /**
     * @param string $orderLinkId
     * @return $this
     */
    public function setOrderLinkId(string $orderLinkId): self
    {
        $this->orderLinkId = $orderLinkId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderLinkId(): ?string
    {
        return $this->orderLinkId;
    }

    /**
     * @param float $orderQty
     * @return $this
     */
    public function setOrderQty(float $orderQty): self
    {
        $this->orderQty = $orderQty;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderQty(): ?string
    {
        return $this->orderQty;
    }

    /**
     * @param float $orderPrice
     * @return $this
     */
    public function setOrderPrice(float $orderPrice): self
    {
        $this->orderPrice = $orderPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderPrice(): ?float
    {
        return $this->orderPrice;
    }

    /**
     * @param string $timeInForce
     * @return $this
     */
    public function setTimeInForce(string $timeInForce): self
    {
        $this->timeInForce = $timeInForce;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeInForce(): ?string
    {
        return $this->timeInForce;
    }

    /**
     * @param string $orderCategory
     * @return PlaceOrderRequest
     */
    public function setOrderCategory(string $orderCategory): self
    {
        $this->orderCategory = $orderCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderCategory(): ?string
    {
        return $this->orderCategory;
    }

    /**
     * @param float $triggerPrice
     * @return PlaceOrderRequest
     */
    public function setTriggerPrice(float $triggerPrice): self
    {
        $this->triggerPrice = $triggerPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getTriggerPrice(): ?float
    {
        return $this->triggerPrice;
    }
}
