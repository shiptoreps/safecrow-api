<?php
namespace SafeCrow\Model;

/**
 * Class Calculate
 * @package SafeCrow\Model
 */
class Calculate
{
    /**
     * @var int
     */
    private $price;

    /**
     * @var int|null
     */
    private $supplierServiceCost;

    /**
     * @var int|null
     */
    private $consumerServiceCost;

    /**
     * @var int|null
     */
    private $consumerCancellationCost;

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return Calculate
     */
    public function setPrice(int $price): Calculate
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSupplierServiceCost()
    {
        return $this->supplierServiceCost;
    }

    /**
     * @param int|null $supplierServiceCost
     * @return Calculate
     */
    public function setSupplierServiceCost(int $supplierServiceCost = null): Calculate
    {
        $this->supplierServiceCost = $supplierServiceCost;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getConsumerServiceCost()
    {
        return $this->consumerServiceCost;
    }

    /**
     * @param int|null $consumerServiceCost
     * @return Calculate
     */
    public function setConsumerServiceCost(int $consumerServiceCost = null): Calculate
    {
        $this->consumerServiceCost = $consumerServiceCost;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getConsumerCancellationCost()
    {
        return $this->consumerCancellationCost;
    }

    /**
     * @param int|null $consumerCancellationCost
     * @return Calculate
     */
    public function setConsumerCancellationCost(int $consumerCancellationCost = null): Calculate
    {
        $this->consumerCancellationCost = $consumerCancellationCost;

        return $this;
    }
}
