<?php

namespace SafeCrow\Model;

/**
 * Class User
 * @package SafeCrow\Model
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var \DateTime
     */
    private $registeredAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;

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
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return User
     */
    public function setEmail($email): User
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     * @return User
     */
    public function setPhone($phone): User
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegisteredAt(): \DateTime
    {
        return $this->registeredAt;
    }

    /**
     * @param \DateTime $registeredAt
     * @return User
     */
    public function setRegisteredAt(\DateTime $registeredAt): User
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }
}
