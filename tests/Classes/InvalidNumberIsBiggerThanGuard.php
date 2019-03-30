<?php

namespace Larapie\Guard\Tests\Classes;

use Larapie\Guard\Guard;

class InvalidNumberIsBiggerThanGuard extends Guard
{
    protected $number;

    protected $biggerThanNumber;

    protected $exception = BiggerThanException::class;

    public function __construct(int $number, int $biggerThan)
    {
        $this->number = $number;
        $this->biggerThanNumber = $biggerThan;
    }

    public function condition(): bool
    {
        return $this->number > $this->biggerThanNumber;
    }
}
