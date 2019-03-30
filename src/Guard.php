<?php

namespace Larapie\Guard;

use Larapie\Guard\Contracts\GuardContract;
use Larapie\Guard\Exceptions\ResolveFailedException;

/**
 * Class Guard.
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
    protected function resolveException($exception) :\Throwable
    {
        if (is_string($exception) || ! ($exception instanceof \Throwable)) {
            try {
                $exception = new $exception;
            } catch (\ArgumentCountError $e) {
                throw new ResolveFailedException();
            }
        }

        return $exception;
    }
}
