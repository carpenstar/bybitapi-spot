<?php

namespace Carpenstar\ByBitAPI\Spot\LeverageToken\AllAssetInfo\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;

class AllAssetInfoRequest extends AbstractParameters
{
    /**
     * Abbreviation of the LT.
     * @var string $ltCode
     */
    protected string $ltCode;

    /**
     * @return string
     */
    public function getLtCode(): string
    {
        return $this->ltCode;
    }

    /**
     * @param string $ltCode
     * @return AllAssetInfoRequest
     */
    public function setLtCode(string $ltCode): self
    {
        $this->ltCode = $ltCode;
        return $this;
    }
}
