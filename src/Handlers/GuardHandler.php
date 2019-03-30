<?php

namespace Larapie\Guard\Handlers;

use Larapie\Guard\Contracts\GuardContract;

class GuardHandler
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

    public function handle()
    {
        foreach ($this->guards as $guard) {
            if ($guard->condition()) {
                throw $guard->exception();
            }
        }
    }
}
