<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\LeverageToken\Redeem\Interfaces\IReedemRequestInterface;

class ReedemRequest extends AbstractParameters implements IReedemRequestInterface
{
    /**
     * Abbreviation of the LT.
     * @var string $ltCode
     */
    protected string $ltCode;

    /**
     * Redeem quantity
     * @var float $ltQuantity
     */
    protected float $ltQuantity;

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
     * @return ReedemRequest
     */
    public function setLtCode(string $ltCode): self
    {
        $this->ltCode = $ltCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getLtQuantity(): float
    {
        return $this->ltQuantity;
    }

    /**
     * @param float $ltQuantity
     * @return ReedemRequest
     */
    public function setLtQuantity(float $ltQuantity): self
    {
        $this->ltQuantity = $ltQuantity;
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
     * @return ReedemRequest
     */
    public function setSerialNo(string $serialNo): self
    {
        $this->serialNo = $serialNo;
        return $this;
    }
}