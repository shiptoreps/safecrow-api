<?php

namespace SafeCrow\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

/**
 * Class AuthenticationPlugin
 * @package SafeCrow\Plugin
 */
class AuthenticationPlugin implements Plugin
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $secret;

    /**
     * AuthenticationPlugin constructor.
     * @param string $key
     * @param string $secret
     */
    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * @param RequestInterface $request
     * @param callable         $next
     * @param callable         $first
     * @return Promise
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        switch ($request->getMethod()) {
            case 'POST':
                $data = sprintf(
                    '%s%s%s%s',
                    $this->key,
                    'POST',
                    $request->getUri()->getPath(),
                    (string) $request->getBody()
                );
                break;
            case 'GET':
                $data = sprintf(
                    '%s%s%s%s',
                    $this->key,
                    'GET',
                    $request->getUri()->getPath(),
                    $request->getUri()->getQuery() ? '?'.$request->getUri()->getQuery() : null
                );
                break;
            default:
                throw new \LogicException('Invalid Method');
        }

        $password = hash_hmac('sha256', $data, $this->secret);

        $header = sprintf('Basic %s', base64_encode(sprintf('%s:%s', $this->key, $password)));

        $request = $request->withHeader('Authorization', $header);

        return $next($request);
    }
}
