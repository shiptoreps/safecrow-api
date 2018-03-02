<?php
namespace SafeCrow\Model;

/**
 * Class Setting
 * @package SafeCrow\Model
 */
class Setting
{
    /**
     * @var string
     */
    private $callbackUrl;

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     * @return Setting
     */
    public function setCallbackUrl(string $callbackUrl): Setting
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }
}
