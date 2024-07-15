<?php
namespace Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Response;

use Carpenstar\ByBitAPI\Core\Objects\AbstractResponse;
use Carpenstar\ByBitAPI\Spot\MarketData\InstrumentInfo\Interfaces\IInstrumentInfoResponseItemInterface;

class InstrumentInfoResponseItem extends AbstractResponse implements IInstrumentInfoResponseItemInterface
{
    /**
     * Name of the trading pair
     * @var string $name
     */
    private string $name;

    /**
     * Alias
     * @var string $alias
     */
    private string $alias;

    /**
     * Base currency
     * @var string $baseCoin
     */
    private string $baseCoin;

    /**
     * Quote currency
     * @var string $quoteCoin
     */
    private string $quoteCoin;

    /**
     * Decimal precision (base currency)
     * @var float $basePrecision
     */
    private float $basePrecision;

    /**
     * Decimal precision (quote currency)
     * @var float $quotePrecision
     */
    private float $quotePrecision;

    /**
     * Min. order qty (Not valid for market buy orders)
     * @var float $minTradeQty
     */
    private float $minTradeQty;

    /**
     * Min. order value (Only valid for market buy orders)
     * @var float $minTradeAmt
     */
    private float $minTradeAmt;

    /**
     * Min. number of decimal places
     * @var float $minPricePrecision
     */
    private float $minPricePrecision;

    /**
     * Max. order qty (It is ignored when you place an order with order type LIMIT_MAK
     * @var float $maxTradeQty
     */
    private float $maxTradeQty;

    /**
     * Max. order value (It is ignored when you place an order with order type LIMIT_MAKER)
     * @var float $maxTradeAmt
     */
    private float $maxTradeAmt;

    /**
     * Category
     * @var int $category
     */
    private int $category;

    /**
     * Indicates that the price of this currency is relatively volatile
     * @var int $innovation
     */
    private int $innovation;

    /**
     * Indicates that the symbol open for trading
     * @var int $showStatus
     */
    private int $showStatus;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this
            ->setName($data['name'])
            ->setAlias($data['alias'])
            ->setBaseCoin($data['baseCoin'])
            ->setQuoteCoin($data['quoteCoin'])
            ->setBasePrecision($data['basePrecision'])
            ->setQuotePrecision($data['quotePrecision'])
            ->setMinTradeQty($data['minTradeQty'])
            ->setMinTradeAmt($data['minTradeAmt'])
            ->setMaxTradeQty($data['maxTradeQty'])
            ->setMaxTradeAmt($data['maxTradeAmt'])
            ->setMinPricePrecision($data['minPricePrecision'])
            ->setCategory($data['category'])
            ->setShowStatus($data['showStatus'])
            ->setInnovation($data['innovation']);
    }

    /**
     * @param string $name
     * @return $this
     */
    private function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $alias
     * @return $this
     */
    private function setAlias(string $alias): self
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $baseCoin
     * @return $this
     */
    private function setBaseCoin(string $baseCoin): self
    {
        $this->baseCoin = $baseCoin;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseCoin(): string
    {
        return $this->baseCoin;
    }

    /**
     * @param string $quoteCoin
     * @return $this
     */
    private function setQuoteCoin(string $quoteCoin): self
    {
        $this->quoteCoin = $quoteCoin;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuoteCoin(): string
    {
        return $this->quoteCoin;
    }

    /**
     * @param float $basePrecision
     * @return $this
     */
    private function setBasePrecision(float $basePrecision): self
    {
        $this->basePrecision = $basePrecision;
        return $this;
    }

    /**
     * @return float
     */
    public function getBasePrecision(): float
    {
        return $this->basePrecision;
    }

    /**
     * @param float $quotePrecision
     * @return $this
     */
    private function setQuotePrecision(float $quotePrecision): self
    {
        $this->quotePrecision = $quotePrecision;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuotePrecision(): float
    {
        return $this->quotePrecision;
    }

    /**
     * @param float $minTradeQty
     * @return $this
     */
    private function setMinTradeQty(float $minTradeQty): self
    {
        $this->minTradeQty = $minTradeQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinTradeQty(): float
    {
        return $this->minTradeQty;
    }

    /**
     * @param float $minTradeAmt
     * @return $this
     */
    private function setMinTradeAmt(float $minTradeAmt): self
    {
        $this->minTradeAmt = $minTradeAmt;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinTradeAmt(): float
    {
        return $this->minTradeAmt;
    }

    /**
     * @param float $maxTradeQty
     * @return $this
     */
    private function setMaxTradeQty(float $maxTradeQty): self
    {
        $this->maxTradeQty = $maxTradeQty;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaxTradeQty(): float
    {
        return $this->maxTradeQty;
    }

    /**
     * @param float $maxTradeAmt
     * @return $this
     */
    private function setMaxTradeAmt(float $maxTradeAmt): self
    {
        $this->maxTradeAmt = $maxTradeAmt;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxTradeAmt(): int
    {
        return $this->maxTradeAmt;
    }

    /**
     * @param float $minPricePrecision
     * @return $this
     */
    private function setMinPricePrecision(float $minPricePrecision): self
    {
        $this->minPricePrecision = $minPricePrecision;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinPricePrecision(): float
    {
        return $this->minPricePrecision;
    }

    /**
     * @param int $category
     * @return $this
     */
    private function setCategory(int $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $showStatus
     * @return $this
     */
    private function setShowStatus(int $showStatus): self
    {
        $this->showStatus = $showStatus;
        return $this;
    }

    /**
     * @return int
     */
    public function getShowStatus(): int
    {
        return $this->showStatus;
    }

    /**
     * @param int $innovation
     * @return $this
     */
    private function setInnovation(int $innovation): self
    {
        $this->innovation = $innovation;
        return $this;
    }

    /**
     * @return int
     */
    public function getInnovation(): int
    {
        return $this->innovation;
    }
}