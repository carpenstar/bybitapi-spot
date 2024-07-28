<?php

namespace Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\Tickers\Interfaces\ITickersResponseInterface;

class TickersResponse extends AbstractResponse implements ITickersResponseInterface
{
    /**
     * Current timestamp
     * @var \DateTime $t
     */
    private \DateTime $t;

    /**
     * Name of the trading pair
     * @var string $s
     */
    private string $s;

    /**
     * Last traded price
     * @var float $lp
     */
    private float $lp;

    /**
     * High price
     * @var float $h
     */
    private float $h;

    /**
     * Low price
     * @var float $l
     */
    private float $l;

    /**
     * Open price
     * @var float $o
     */
    private float $o;

    /**
     * Best bid price
     * @var float $bp
     */
    private float $bp;

    /**
     * Best ask price
     * @var float $ap
     */
    private float $ap;

    /**
     * Trading volume
     * @var float $v
     */
    private float $v;

    /**
     * Trading quote volume
     * @var float $qv
     */
    private float $qv;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this
            ->setT($data['t'])
            ->setS($data['s'])
            ->setLp($data['lp'])
            ->setH($data['h'])
            ->setL($data['l'])
            ->setO($data['o'])
            ->setBp($data['bp'])
            ->setAp($data['ap'])
            ->setV($data['v'])
            ->setQv($data['qv']);
    }

    /**
     * @param int $timestamp
     * @return TickersResponse
     */
    private function setT(int $timestamp): self
    {
        $this->t = DateTimeHelper::makeFromTimestamp($timestamp);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime(): \DateTime
    {
        return $this->t;
    }

    /**
     * @param string $s
     * @return TickersResponse
     */
    private function setS(string $s): self
    {
        $this->s = $s;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->s;
    }

    /**
     * @param float $ap
     */
    private function setAp(float $ap): self
    {
        $this->ap = $ap;
        return $this;
    }

    /**
     * Best ask price
     * @return float
     */
    public function getBestAskPrice(): float
    {
        return $this->ap;
    }

    /**
     * @param float $lp
     * @return TickersResponse
     */
    private function setLp(float $lp): self
    {
        $this->lp = $lp;
        return $this;
    }

    /**
     * Last traded price
     * @return float
     */
    public function getLastTradedPrice(): float
    {
        return $this->lp;
    }

    /**
     * @param float $h
     * @return TickersResponse
     */
    private function setH(float $h): self
    {
        $this->h = $h;
        return $this;
    }

    /**
     * High price
     * @return int
     */
    public function getHighPrice(): float
    {
        return $this->h;
    }

    /**
     * @param float $l
     * @return TickersResponse
     */
    private function setL(float $l): self
    {
        $this->l = $l;
        return $this;
    }

    /**
     * Low price
     * @return float
     */
    public function getLowPrice(): float
    {
        return $this->l;
    }

    /**
     * @param float $o
     * @return TickersResponse
     */
    private function setO(float $o): self
    {
        $this->o = $o;
        return $this;
    }

    /**
     * Open price
     * @return float
     */
    public function getOpenPrice(): float
    {
        return $this->o;
    }

    /**
     * @param float $bp
     * @return TickersResponse
     */
    private function setBp(float $bp): self
    {
        $this->bp = $bp;
        return $this;
    }

    /**
     * Best bid price
     * @return float
     */
    public function getBestBidPrice(): float
    {
        return $this->bp;
    }

    /**
     * @param float $v
     * @return TickersResponse
     */
    private function setV(float $v): self
    {
        $this->v = $v;
        return $this;
    }

    /**
     * Trading volume
     * @return float
     */
    public function getTradingVolume(): float
    {
        return $this->v;
    }

    /**
     * @param float $qv
     * @return TickersResponse
     */
    private function setQv(float $qv): self
    {
        $this->qv = $qv;
        return $this;
    }

    /**
     * Trading quote volume
     * @return float
     */
    public function getTradingQuoteVolume(): float
    {
        return $this->qv;
    }
}
