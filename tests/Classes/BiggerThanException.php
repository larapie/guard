<?php

namespace Larapie\Guard\Tests\Classes;

use Exception;

class BiggerThanException extends Exception
{
    public function __construct($number, $biggerThan)
    {
        parent::__construct("number $number cannot be bigger than $biggerThan");
    }
}
