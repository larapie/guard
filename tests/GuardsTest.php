<?php

namespace Larapie\Guard\Tests;

use PHPUnit\Framework\TestCase;
use Larapie\Guard\Tests\Classes\ThingIsNullGuard;
use Larapie\Guard\Exceptions\ResolveFailedException;
use Larapie\Guard\Tests\Classes\BiggerThanException;
use Larapie\Guard\Tests\Classes\ThingIsNullException;
use Larapie\Guard\Tests\Classes\NumberIsBiggerThanGuard;
use Larapie\Guard\Tests\Classes\InvalidNumberIsBiggerThanGuard;

class GuardsTest extends TestCase
{
    public function testAGuardPasses()
    {
        guard(new ThingIsNullGuard('test'));
        $this->assertTrue(true);
    }

    public function testMultipleGuardsPass()
    {
        guard(new ThingIsNullGuard('test'), new ThingIsNullGuard(10));
        $this->assertTrue(true);
    }

    public function testGuardThrowsException()
    {
        $this->expectException(ThingIsNullException::class);
        guard(new ThingIsNullGuard(null));
    }

    public function testObjectExceptionOnGuard()
    {
        $this->expectException(BiggerThanException::class);
        guard(new NumberIsBiggerThanGuard(10, 5));
    }

    public function testResolveFailedException()
    {
        $this->expectException(ResolveFailedException::class);
        guard(new InvalidNumberIsBiggerThanGuard(10, 5));
    }
}
