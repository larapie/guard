<?php

namespace Larapie\Guard\Abstracts;

use Larapie\Guard\Contracts\GuardContract;
use Larapie\Guard\Exceptions\ResolveFailedException;

/**
 * Class Guard
 * @package Larapie\Guard\Abstracts
 */
abstract class Guard implements GuardContract
{
    /**
     * @var string
     */
    protected $exception;

    /**
     * The exception that gets thrown when the condition is satisfied.
     *
     * @return \Throwable
     * @throws ResolveFailedException
     */
    public function exception(): \Throwable
    {
        return $this->resolveException($this->exception);
    }

    /**
     * @param $exception
     * @return \Throwable
     * @throws ResolveFailedException
     */
    protected function resolveException($exception) :\Throwable{
        if (is_string($exception) || !($exception instanceof \Throwable)) {
            try {
                $exception = new $exception;
            } catch (\Exception $e) {
                throw new ResolveFailedException("Could not resolve the string to an exception. It probably requires additional arguments. Try to pass it as an object");
            }
        }
        return $exception;
    }

}
