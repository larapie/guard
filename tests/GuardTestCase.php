<?php

namespace Larapie\Guard\Tests;

use PHPUnit\Framework\TestCase;
use Larapie\Guard\Tests\Classes\ThingIsNullGuard;
use Larapie\Guard\Tests\Classes\ThingIsNullException;

class GuardTestCase extends TestCase
{
    public function testGuardPasses()
    {
        guard(new ThingIsNullGuard('test'), new ThingIsNullGuard(10));
        $this->assertTrue(true);
    }

    public function testGuardThrowsException()
    {
        $this->expectException(ThingIsNullException::class);
        guard(new ThingIsNullGuard(null));
    }
}
