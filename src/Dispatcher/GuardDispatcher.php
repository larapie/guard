<?php

namespace Larapie\Guard\Dispatcher;

use Larapie\Guard\Contracts\GuardContract;

class GuardDispatcher
{
    /**
     * @var GuardContract[]
     */
    protected $guards = [];

    /**
     * GuardDispatcher constructor.
     * @param $guards
     */
    public function __construct(array $guards)
    {
        $this->guards = $guards;
    }

    public function dispatch()
    {
        foreach ($this->guards as $guard) {
            if ($guard->condition()) {
                throw $guard->exception();
            }
        }
    }
}
