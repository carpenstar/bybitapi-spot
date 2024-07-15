<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Response;

use Carpenstar\ByBitAPI\Core\Helpers\DateTimeHelper;
use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Interfaces\IPurchaseResponseInterface;

class PurchaseResponse extends AbstractResponse implements IPurchaseResponseInterface
{
    /**
     * Actual purchase value of the LT
     * @var float $amount
     */
    private float $amount;

    /**
     * Transaction ID
     * @var string $id
     */
    private string $id;

    /**
     * Abbreviation of the LT
     * @var string $ltCode
     */
    private string $ltCode;

    /**
     * Order value of the LT
     * @var float $orderAmount
     */
    private float $orderAmount;

    /**
     * Order quantity of the LT
     * @var float $orderQuantity
     */
    private float $orderQuantity;

    /**
     * Order status. 1: Completed; 2: In progress; 3: Failed
     * @var int $orderStatus
     */
    private int $orderStatus;

    /**
     * Serial number
     * @var string $serialNo
     */
    private string $serialNo;

    /**
     * Timestamp
     * @var \DateTime $timestamp
     */
    private \DateTime $timestamp;

    /**
     * Quote asset
     * @var string $valueCoin
     */
    private string $valueCoin;

    public function __construct(array $data)
    {
        $this->timestamp = DateTimeHelper::makeFromTimestamp($data['timestamp']);
        $this->id = $data['id'];
        $this->amount = (float) $data['amount'];
        $this->ltCode = $data['ltCode'];
        $this->orderAmount = (float) $data['orderAmount'];
        $this->orderQuantity = (float) $data['orderQuantity'];
        $this->orderStatus = $data['orderStatus'];
        $this->serialNo = $data['serialNo'];
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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getOrderAmount(): float
    {
        return $this->orderAmount;
    }

    /**
     * @return float
     */
    public function getOrderQuantity(): float
    {
        return $this->orderQuantity;
    }

    /**
     * @return int
     */
    public function getOrderStatus(): int
    {
        return $this->orderStatus;
    }

    /**
     * @return string
     */
    public function getSerialNo(): string
    {
        return $this->serialNo;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getValueCoin(): string
    {
        return $this->valueCoin;
    }
}