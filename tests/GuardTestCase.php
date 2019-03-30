<?php

namespace Larapie\Guard\Tests;

use Larapie\Guard\Tests\Classes\ThingIsNullException;
use Larapie\Guard\Tests\Classes\ThingIsNullGuard;
use PHPUnit\Framework\TestCase;

class GuardTestCase extends TestCase
{
    public function testGuardPasses(){
        guard(new ThingIsNullGuard("test"), new ThingIsNullGuard(10));
        $this->assertTrue(true);
    }

    public function testGuardThrowsException(){
        $this->expectException(ThingIsNullException::class);
        guard(new ThingIsNullGuard(null));
    }

}