<?php

namespace SafeCrow;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\UriFactoryDiscovery;
use Http\Message\RequestFactory;
use SafeCrow\Api\OrderApi;
use SafeCrow\Api\UserApi;
use SafeCrow\Plugin\ApiVersionPlugin;
use SafeCrow\Plugin\AuthenticationPlugin;

/**
 * Class Client
 * @package SafeCrow
 */
class Client
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var RequestFactory
     */
    protected $requestFactory;

    /**
     * @var Plugin[]
     */
    protected $plugins = [];

    /**
     * Client constructor.
     * @param HttpClient     $httpClient
     * @param RequestFactory $requestFactory
     */
    public function __construct(HttpClient $httpClient = null, RequestFactory $requestFactory = null)
    {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: MessageFactoryDiscovery::find();
    }

    /**
     * @return HttpMethodsClient
     */
    public function getHttpClient(): HttpMethodsClient
    {
        return new HttpMethodsClient(
            new PluginClient($this->httpClient, $this->plugins),
            $this->requestFactory
        );
    }

    /**
     * @param Config $config
     */
    public function authenticate(Config $config): void
    {
        $this
            ->addPlugin(new AddHostPlugin(UriFactoryDiscovery::find()->createUri($config->getUrl())))
            ->addPlugin(new HeaderDefaultsPlugin($config->getHeaders()))
            ->addPlugin(new ApiVersionPlugin())
            ->addPlugin(new AuthenticationPlugin($config->getKey(), $config->getSecret()));
    }

    /**
     * @return UserApi
     */
    public function getUserApi(): UserApi
    {
        return new UserApi($this);
    }

    /**
     * @return OrderApi
     */
    public function getOrderApi(): OrderApi
    {
        return new OrderApi($this);
    }

    /**
     * @param Plugin $plugin
     * @return Client
     */
    protected function addPlugin(Plugin $plugin): Client
    {
        $this->plugins[] = $plugin;

        return $this;
    }
}
