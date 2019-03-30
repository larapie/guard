<?php

namespace Larapie\Guard\Tests\Classes;

use Larapie\Guard\Abstracts\Guard;

class ThingIsNullGuard extends Guard
{
    protected $thing;

    protected $exception = ThingIsNullException::class;

    /**
     * ThingIsNullGuard constructor.
     * @param $thing
     */
    public function __construct($thing)
    {
        $this->thing = $thing;
    }

    public function condition(): bool
    {
        return $this->thing === null;
    }
}
