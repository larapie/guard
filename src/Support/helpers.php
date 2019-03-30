<?php

if (!function_exists('guard')) {
    function guard(\Larapie\Guard\Contracts\GuardContract ...$guards) :void
    {
        (new \Larapie\Guard\Dispatcher\GuardDispatcher($guards))->dispatch();
    }
}
