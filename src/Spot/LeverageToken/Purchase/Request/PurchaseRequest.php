<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Interfaces\IPurchaseRequestInterface;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Purchase\Purchase;

class PurchaseRequest extends AbstractParameters implements IPurchaseRequestInterface
{
    /**
     * Abbreviation of the LT.
     * @var string $ltCode
     */
    protected string $ltCode;

    /**
     * Purchase amount
     * @var float $ltAmount
     */
    protected float $ltAmount;

    /**
     * Serial number. A kind of unique customised ID
     * @var string $serialNo
     */
    protected string $serialNo;

    /**
     * @return string
     */
    public function getLtCode(): string
    {
        return $this->ltCode;
    }

    /**
     * @param string $ltCode
     * @return Purchase
     */
    public function setLtCode(string $ltCode): self
    {
        $this->ltCode = $ltCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getLtAmount(): float
    {
        return $this->ltAmount;
    }

    /**
     * @param float $ltAmount
     * @return Purchase
     */
    public function setLtAmount(float $ltAmount): self
    {
        $this->ltAmount = $ltAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerialNo(): string
    {
        return $this->serialNo;
    }

    /**
     * @param string $serialNo
     * @return Purchase
     */
    public function setSerialNo(string $serialNo): self
    {
        $this->serialNo = $serialNo;
        return $this;
    }
}