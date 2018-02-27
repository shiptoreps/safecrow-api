<?php

namespace SafeCrow\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

/**
 * Class ApiVersionPlugin
 * @package SafeCrow\Plugin
 */
class ApiVersionPlugin implements Plugin
{
    /**
     * @param RequestInterface $request
     * @param callable         $next
     * @param callable         $first
     * @return Promise
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request->withUri($request->getUri()->withPath('/api/v3'.$request->getUri()->getPath())));
    }
}
