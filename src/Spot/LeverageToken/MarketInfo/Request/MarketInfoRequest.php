<?php
namespace Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Request;

use Carpenstar\ByBitAPI\Core\Objects\AbstractParameters;
use Carpenstar\ByBitAPI\Spot\LeverageToken\MarketInfo\Interfaces\IMarketInfoRequestInterface;

class MarketInfoRequest extends AbstractParameters implements IMarketInfoRequestInterface
{
    protected string $ltCode;

    public function setLtCode(string $ltCode): self
    {
        $this->ltCode = $ltCode;
        return $this;
    }

    public function getLtCode(): string
    {
        return $this->ltCode;
    }
}