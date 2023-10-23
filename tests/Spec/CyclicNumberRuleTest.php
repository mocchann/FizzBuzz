<?php

namespace FizzBuzz\Core;

use FizzBuzz\Spec\CyclicNumberRule;
use PHPUnit\Framework\TestCase;

class CyclicNumberRuleTest extends TestCase
{
    public function testApply()
    {
        $rule = new CyclicNumberRule(0, "Buzz");
        $this->assertEquals("Buzz", $rule->apply("", 0));
        $this->assertEquals("FizzBuzz", $rule->apply("Fizz", 0));
    }

    public function testMatch()
    {
        $rule = new CyclicNumberRule(3, "");
        $this->assertFalse($rule->match("", 1));
        $this->assertTrue($rule->match("", 3));
        $this->assertTrue($rule->match("", 6));
    }
}
