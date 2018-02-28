<?php

namespace SafeCrow\Api;

use Psr\Http\Message\ResponseInterface;
use SafeCrow\Client;
use SafeCrow\DataTransformer\DataTransformerInterface;

/**
 * Class AbstractApi
 * @package SafeCrow\Api
 */
class AbstractApi implements ApiInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * AbstractApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $path
     * @param array  $parameters
     * @return ResponseInterface
     * @throws \Http\Client\Exception
     */
    protected function get(string $path, array $parameters = []): ResponseInterface
    {
        return $this->client->getHttpClient()->get($path.'?'.http_build_query($parameters));
    }

    /**
     * @param string $path
     * @param array  $parameters
     * @return ResponseInterface
     */
    protected function post(string $path, array $parameters = []): ResponseInterface
    {
        return $this->client->getHttpClient()->post($path, [], $parameters ? json_encode($parameters) : null);
    }

    /**
     * @param string $path
     * @param array  $parameters
     * @return ResponseInterface
     */
    protected function path(string $path, array $parameters = []): ResponseInterface
    {
        return $this->client->getHttpClient()->patch($path, [], $parameters ? json_encode($parameters) : null);
    }

    /**
     * @param string $path
     * @param array  $parameters
     * @return ResponseInterface
     */
    protected function put(string $path, array $parameters = []): ResponseInterface
    {
        return $this->client->getHttpClient()->put($path, [], json_encode($parameters));
    }

    /**
     * @param string $path
     * @param array  $parameters
     * @return ResponseInterface
     */
    protected function delete(string $path, array $parameters = []): ResponseInterface
    {
        return $this->client->getHttpClient()->get($path.'?'.http_build_query($parameters));
    }

    /**
     * @param ResponseInterface        $response
     * @param DataTransformerInterface $dataTransformer
     * @return mixed
     */
    protected function getResult(ResponseInterface $response, DataTransformerInterface $dataTransformer)
    {
        $result = json_decode($response->getBody(), true);

        return $dataTransformer->transform($result);
    }

    /**
     * @param ResponseInterface        $response
     * @param DataTransformerInterface $dataTransformer
     * @return array
     */
    protected function getArrayResult(ResponseInterface $response, DataTransformerInterface $dataTransformer): array
    {
        $results = (array) json_decode($response->getBody(), true);

        return array_map(function ($result) use ($dataTransformer) {
            return $dataTransformer->transform($result);
        }, $results);
    }

    /**
     * @param ResponseInterface $response
     * @param string            $field
     * @return string
     */
    protected function getSingleResult(ResponseInterface $response, string $field): string
    {
        $results = (array) json_decode($response->getBody(), true);

        return $results[$field];
    }
}
