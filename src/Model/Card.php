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
    private $holder;

    /**
     * @var string
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $expireAt;

    /**
     * @var \DateTime
     */
    private $createdAt;

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
    public function getExpireAt(): \DateTime
    {
        return $this->expireAt;
    }

    /**
     * @param \DateTime $expireAt
     * @return Card
     */
    public function setExpireAt(\DateTime $expireAt): Card
    {
        $this->expireAt = $expireAt;

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
}
