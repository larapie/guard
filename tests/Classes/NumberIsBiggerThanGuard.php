<?php

namespace Larapie\Guard\Tests\Classes;

use Larapie\Guard\Abstracts\Guard;

class NumberIsBiggerThanGuard extends Guard
{
    protected $number;

    protected $biggerThanNumber;

    public function __construct(int $number, int $biggerThan)
    {
        $this->number = $number;
        $this->biggerThanNumber = $biggerThan;
    }

    public function condition(): bool
    {
        return $this->number > $this->biggerThanNumber;
    }

    public function exception(): \Throwable
    {
        return new BiggerThanException($this->number,$this->biggerThanNumber);
    }
}
