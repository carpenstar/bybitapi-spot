<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\LeverageToken\PurchaseRedeemHistory\Interfaces\IPurchaseReedemHistoryResponseItemInterface;

class PurchaseRedeemHistoryResponseItem extends AbstractResponse implements IPurchaseReedemHistoryResponseItemInterface
{
    /**
     * Actual purchase quantity of the ETP
     * @var float $amount
     */
    private float $amount;

    /**
     * Last update time of the order status
     * @var \DateTime $execTime
     */
    private \DateTime $execTime;

    /**
     * Trading fees
     * @var float $fee
     */
    private float $fee;

    /**
     * Abbreviation of the LT
     * @var string $ltCode
     */
    private string $ltCode;

    /**
     * Order ID
     * @var string $orderId
     */
    private string $orderId;

    /**
     * Order status. 1: Completed; 2: In progress; 3: Failed
     * @var int $orderStatus
     */
    private int $orderStatus;

    /**
     * Order time
     * @var \DateTime $orderTime
     */
    private \DateTime $orderTime;

    /**
     * Order type; 1. Purchase; 2. Redemption
     * @var int $orderType
     */
    private int $orderType;

    /**
     * Serial number
     * @var string $serialNo
     */
    private string $serialNo;

    /**
     * Filled value
     * @var float $value
     */
    private float $value;

    /**
     * Quote asset
     * @var string $valueCoin
     */
    private string $valueCoin;


    public function __construct(array $data)
    {
        $this->amount = (float) $data['amount'];
        $this->execTime = DateTimeHelper::makeFromTimestamp((int) $data['excTime']);
        $this->fee = (float) $data['fee'];
        $this->ltCode = $data['ltCode'];
        $this->orderId = $data['orderId'];
        $this->orderStatus = $data['orderStatus'];
        $this->orderTime = DateTimeHelper::makeFromTimestamp((int) $data['orderTime']);
        $this->orderType = $data['orderType'];
        $this->serialNo = $data['serialNo'];
        $this->value = (float) $data['value'];
        $this->valueCoin = $data['valueCoin'];
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return \DateTime
     */
    public function getExecTime(): \DateTime
    {
        return $this->execTime;
    }

    /**
     * @return float
     */
    public function getFee(): float
    {
        return $this->fee;
    }

    /**
     * @return string
     */
    public function getLtCode(): string
    {
        return $this->ltCode;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @return int
     */
    public function getOrderStatus(): int
    {
        return $this->orderStatus;
    }

    /**
     * @return \DateTime
     */
    public function getOrderTime(): \DateTime
    {
        return $this->orderTime;
    }

    /**
     * @return int
     */
    public function getOrderType(): int
    {
        return $this->orderType;
    }

    /**
     * @return string
     */
    public function getSerialNo(): string
    {
        return $this->serialNo;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getValueCoin(): string
    {
        return $this->valueCoin;
    }
}