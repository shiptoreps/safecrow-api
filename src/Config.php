<?php

namespace SafeCrow;

/**
 * Class Config
 * @package SafeCrow
 */
class Config
{
    /**
     * @var string
     */
    const URL_PROD = 'https://www.safecrow.ru';

    /**
     * @var string
     */
    const URL_DEV = 'https://dev.safecrow.ru';

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var bool
     */
    private $dev;

    /**
     * @var array
     */
    private $headers;

    /**
     * Config constructor.
     * @param string $key
     * @param string $secret
     * @param bool   $dev
     */
    public function __construct(string $key, string $secret, bool $dev = true)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->dev = $dev;
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @return bool
     */
    public function isDev(): bool
    {
        return $this->dev;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->isDev() ? self::URL_DEV : self::URL_PROD;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
