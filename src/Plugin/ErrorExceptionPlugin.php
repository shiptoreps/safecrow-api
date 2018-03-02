<?php
namespace SafeCrow\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SafeCrow\Exception\CustomErrorException;
use SafeCrow\Exception\NotFoundResultException;
use SafeCrow\Exception\UndefinedResultException;

class ErrorExceptionPlugin implements Plugin
{
    /**
     * @var int
     */
    const STATUS_OK = 200;

    /**
     * @var int
     */
    const STATUS_NOT_FOUND = 404;

    /**
     * @var int
     */
    const STATUS_ERROR = 418;


    /**
     * @param RequestInterface $request
     * @param callable         $next
     * @param callable         $first
     * @return Promise
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(function (ResponseInterface $response) {
            switch ($response->getStatusCode()) {
                case self::STATUS_OK:
                    return $response;
                case self::STATUS_NOT_FOUND:
                    throw new NotFoundResultException('Result not found.');
                case self::STATUS_ERROR:
                    $result = json_decode($response->getBody(), true);
                    $errors = reset($result['errors']);

                    if (\is_array($errors)) {
                        throw new CustomErrorException(reset($errors));
                    }

                    throw new CustomErrorException($errors);
            }

            throw new UndefinedResultException(sprintf('Undefined result. Response Status: %s.', $response->getStatusCode()));
        });
    }
}
