<?php

namespace Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\Trade\TradeHistory\Interfaces\ITradeHistoryResponseItemInterface;

class TradeHistoryResponseItem extends AbstractResponse implements ITradeHistoryResponseItemInterface
{
    /**
     * Name of the trading pair
     * @var string $symbol
     */
    private string $symbol;

    /**
     * Irrelevant for API usage. This field reflects the "Transaction ID" from the Trade History section of the website
     * @var int $id
     */
    private int $id;

    /**
     * Order ID
     * @var int $orderId
     */
    private int $orderId;

    /**
     * The ID for the trade
     * @var int $tradeId
     */
    private int $tradeId;

    /**
     * Last traded price
     * @var float $orderPrice
     */
    private float $orderPrice;

    /**
     * Order quantity
     * @var float $orderQty
     */
    private float $orderQty;

    /**
     * Trading fee (for a single fill)
     * @var float $execFee
     */
    private float $execFee;

    /**
     * Fee Token ID
     * @var string $feeTokenId
     */
    private string $feeTokenId;

    /**
     * Order created time in the match engine
     * @var \DateTime $creatTime
     */
    private \DateTime $creatTime;

    /**
     * 0：Buyer, 1：Seller
     * @var int $isBuyer
     */
    private int $isBuyer;

    /**
     * 0：Maker, 1：Taker
     * @var int $isMaker
     */
    private int $isMaker;

    /**
     * Order ID of the opponent trader
     * @var int $matchOrderId
     */
    private int $matchOrderId;

    /**
     * Maker rebate
     * @var int $makerRebate
     */
    private int $makerRebate;

    /**
     * Order execution time
     * @var \DateTime $executionTime
     */
    private \DateTime $executionTime;

    public function __construct(array $data)
    {
        $this
            ->setOrderId($data['orderId'])
            ->setOrderQty($data['orderQty'])
            ->setSymbol($data['symbol'])
            ->setOrderPrice($data['orderPrice'])
            ->setCreatTime($data['creatTime'])
            ->setExecFee($data['execFee'])
            ->setExecutionTime($data['executionTime'])
            ->setFeeTokenId($data['feeTokenId'])
            ->setIsBuyer($data['isBuyer'])
            ->setIsMaker($data['isMaker'])
            ->setMakerRebate($data['makerRebate'])
            ->setMatchOrderId($data['matchOrderId'])
            ->setTradeId($data['tradeId'])
            ->setId($data['id']);
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return TradeHistoryResponseItem
     */
    private function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return TradeHistoryResponseItem
     */
    private function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderQty(): float
    {
        return $this->orderQty;
    }

    /**
     * @param float $orderQty
     * @return TradeHistoryResponseItem
     */
    private function setOrderQty(float $orderQty): self
    {
        $this->orderQty = $orderQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderPrice(): float
    {
        return $this->orderPrice;
    }

    /**
     * @param float $orderPrice
     * @return TradeHistoryResponseItem
     */
    private function setOrderPrice(float $orderPrice): self
    {
        $this->orderPrice = $orderPrice;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatTime(): \DateTime
    {
        return $this->creatTime;
    }

    /**
     * @param int $creatTime
     * @return TradeHistoryResponseItem
     */
    private function setCreatTime(int $creatTime): self
    {
        $this->creatTime = DateTimeHelper::makeFromTimestamp($creatTime);
        return $this;
    }

    /**
     * @return float
     */
    public function getExecFee(): float
    {
        return $this->execFee;
    }

    /**
     * @param float $execFee
     * @return TradeHistoryResponseItem
     */
    private function setExecFee(float $execFee): self
    {
        $this->execFee = $execFee;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExecutionTime(): \DateTime
    {
        return $this->executionTime;
    }

    /**
     * @param int $executionTime
     * @return TradeHistoryResponseItem
     */
    private function setExecutionTime(int $executionTime): self
    {
        $this->executionTime = DateTimeHelper::makeFromTimestamp($executionTime);
        return $this;
    }

    /**
     * @return string
     */
    public function getFeeTokenId(): string
    {
        return $this->feeTokenId;
    }

    /**
     * @param string $feeTokenId
     * @return TradeHistoryResponseItem
     */
    private function setFeeTokenId(string $feeTokenId): self
    {
        $this->feeTokenId = $feeTokenId;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TradeHistoryResponseItem
     */
    private function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsBuyer(): int
    {
        return $this->isBuyer;
    }

    /**
     * @param int $isBuyer
     * @return TradeHistoryResponseItem
     */
    private function setIsBuyer(int $isBuyer): self
    {
        $this->isBuyer = $isBuyer;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsMaker(): int
    {
        return $this->isMaker;
    }

    /**
     * @param int $isMaker
     * @return TradeHistoryResponseItem
     */
    private function setIsMaker(int $isMaker): self
    {
        $this->isMaker = $isMaker;
        return $this;
    }

    /**
     * @return int
     */
    public function getMakerRebate(): int
    {
        return $this->makerRebate;
    }

    /**
     * @param int $makerRebate
     * @return TradeHistoryResponseItem
     */
    private function setMakerRebate(int $makerRebate): self
    {
        $this->makerRebate = $makerRebate;
        return $this;
    }

    /**
     * @return int
     */
    public function getMatchOrderId(): int
    {
        return $this->matchOrderId;
    }

    /**
     * @param int $matchOrderId
     * @return TradeHistoryResponseItem
     */
    private function setMatchOrderId(int $matchOrderId): self
    {
        $this->matchOrderId = $matchOrderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTradeId(): int
    {
        return $this->tradeId;
    }

    /**
     * @param int $tradeId
     * @return TradeHistoryResponseItem
     */
    private function setTradeId(int $tradeId): self
    {
        $this->tradeId = $tradeId;
        return $this;
    }
}
