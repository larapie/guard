<?php

namespace Larapie\Guard\Contracts;


interface GuardContract
{
    public function condition(): bool;

    public function exception(): \Throwable;
}
