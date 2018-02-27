<?php
namespace SafeCrow\Model;

/**
 * Class Card
 * @package SafeCrow\Model
 */
class Card
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $binding;

    /**
     * @var string
     */
    private $holder;

    /**
     * @var string
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $expirationAt;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var int
     */
    private $userId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Card
     */
    public function setId(int $id): Card
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getBinding(): string
    {
        return $this->binding;
    }

    /**
     * @param string $binding
     * @return Card
     */
    public function setBinding(string $binding): Card
    {
        $this->binding = $binding;

        return $this;
    }

    /**
     * @return string
     */
    public function getHolder(): string
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     * @return Card
     */
    public function setHolder(string $holder): Card
    {
        $this->holder = $holder;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Card
     */
    public function setNumber(string $number): Card
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationAt(): \DateTime
    {
        return $this->expirationAt;
    }

    /**
     * @param \DateTime $expirationAt
     * @return Card
     */
    public function setExpirationAt(\DateTime $expirationAt): Card
    {
        $this->expirationAt = $expirationAt;

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
     * @return Card
     */
    public function setStatus(string $status): Card
    {
        $this->status = $status;

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
     * @return Card
     */
    public function setCreatedAt(\DateTime $createdAt): Card
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
     * @return Card
     */
    public function setUpdatedAt(\DateTime $updatedAt): Card
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return Card
     */
    public function setUserId(int $userId): Card
    {
        $this->userId = $userId;

        return $this;
    }
}
