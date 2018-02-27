<?php
namespace SafeCrow\Api;

use SafeCrow\Client;

/**
 * Interface ApiInterface
 * @package SafeCrow\Api
 */
interface ApiInterface
{
    /**
     * ApiInterface constructor.
     * @param Client $client
     */
    public function __construct(Client $client);
}
