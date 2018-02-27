<?php
namespace SafeCrow\Model;

/**
 * Class Order
 * @package SafeCrow\Model
 */
class Order
{
    /**
     * @var string
     */
    const PAYER_CONSUMER = 'consumer';

    /**
     * @var string
     */
    const PAYER_SUPPLIER = 'supplier';

    /**
     * @var string
     */
    const PAYER_HALF = '50/50';

    /**
     * @var string
     */
    const STATUS_PENDING = 'pending';

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $consumerId;

    /**
     * @var int
     */
    private $supplierId;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $fee;

    /**
     * @var string
     */
    private $feePayer;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int|null
     */
    private $supplierPayoutMethodId;

    /**
     * @var int|null
     */
    private $consumerPayoutMethodId;

    /**
     * @var string|null
     */
    private $supplierPayoutMethodType;

    /**
     * @var string|null
     */
    private $consumerPayoutMethodType;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var array
     */
    private $extra = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Order
     */
    public function setId(int $id): Order
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getConsumerId(): int
    {
        return $this->consumerId;
    }

    /**
     * @param int $consumerId
     * @return Order
     */
    public function setConsumerId(int $consumerId): Order
    {
        $this->consumerId = $consumerId;

        return $this;
    }

    /**
     * @return int
     */
    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    /**
     * @param int $supplierId
     * @return Order
     */
    public function setSupplierId(int $supplierId): Order
    {
        $this->supplierId = $supplierId;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return Order
     */
    public function setPrice(int $price): Order
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getFee(): int
    {
        return $this->fee;
    }

    /**
     * @param int $fee
     * @return Order
     */
    public function setFee(int $fee): Order
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * @return string
     */
    public function getFeePayer(): string
    {
        return $this->feePayer;
    }

    /**
     * @param string $feePayer
     * @return Order
     */
    public function setFeePayer(string $feePayer): Order
    {
        $this->feePayer = $feePayer;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Order
     */
    public function setStatus(string $status): Order
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Order
     */
    public function setDescription(string $description): Order
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSupplierPayoutMethodId()
    {
        return $this->supplierPayoutMethodId;
    }

    /**
     * @param int|null $supplierPayoutMethodId
     * @return Order
     */
    public function setSupplierPayoutMethodId($supplierPayoutMethodId): Order
    {
        $this->supplierPayoutMethodId = $supplierPayoutMethodId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getConsumerPayoutMethodId()
    {
        return $this->consumerPayoutMethodId;
    }

    /**
     * @param int|null $consumerPayoutMethodId
     * @return Order
     */
    public function setConsumerPayoutMethodId($consumerPayoutMethodId): Order
    {
        $this->consumerPayoutMethodId = $consumerPayoutMethodId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSupplierPayoutMethodType()
    {
        return $this->supplierPayoutMethodType;
    }

    /**
     * @param string|null $supplierPayoutMethodType
     * @return Order
     */
    public function setSupplierPayoutMethodType($supplierPayoutMethodType): Order
    {
        $this->supplierPayoutMethodType = $supplierPayoutMethodType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConsumerPayoutMethodType()
    {
        return $this->consumerPayoutMethodType;
    }

    /**
     * @param string|null $consumerPayoutMethodType
     * @return Order
     */
    public function setConsumerPayoutMethodType($consumerPayoutMethodType): Order
    {
        $this->consumerPayoutMethodType = $consumerPayoutMethodType;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Order
     */
    public function setCreatedAt(\DateTime $createdAt): Order
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Order
     */
    public function setUpdatedAt(\DateTime $updatedAt): Order
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getExtra(): array
    {
        return $this->extra;
    }

    /**
     * @param array $extra
     * @return Order
     */
    public function setExtra(array $extra): Order
    {
        $this->extra = $extra;

        return $this;
    }
}
