<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Interfaces\IMarketInfoResponseInterface;

class MarketInfoResponse extends AbstractResponse implements IMarketInfoResponseInterface
{
    /**
     * Total position value = basket value * total circulation
     * @var float $basket
     */
    private float $basket;

    /**
     * Circulating supply in the secondary market
     * @var float $circulation
     */
    private float $circulation;

    /**
     * Real Leverage calculated by last traded price.
     * @var float $leverage
     */
    private float $leverage;

    /**
     * Abbreviation of the LT
     * @var string $ltCode
     */
    private string $ltCode;

    /**
     * Net asset value
     * @var float $nav
     */
    private float $nav;

    /**
     * Update time for net asset value
     * @var \DateTime $navTime
     */
    private \DateTime $navTime;

    public function __construct(array $data)
    {
        $this->basket = (float) $data['basket'];
        $this->leverage = (float) $data['leverage'];
        $this->nav = (float) $data['nav'];
        $this->circulation = (float) $data['circulation'];
        $this->navTime = DateTimeHelper::makeFromTimestamp($data['navTime']);
        $this->ltCode = $data['ltCode'];
    }

    /**
     * @return float
     */
    public function getBasket(): float
    {
        return $this->basket;
    }

    /**
     * @return float
     */
    public function getCirculation(): float
    {
        return $this->circulation;
    }

    /**
     * @return float
     */
    public function getLeverage(): float
    {
        return $this->leverage;
    }

    /**
     * @return string
     */
    public function getLtCode(): string
    {
        return $this->ltCode;
    }

    /**
     * @return float
     */
    public function getNav(): float
    {
        return $this->nav;
    }

    /**
     * @return \DateTime
     */
    public function getNavTime(): \DateTime
    {
        return $this->navTime;
    }
}
