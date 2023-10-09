<?php

namespace FizzBuzz\Core;

use PHPUnit\Framework\TestCase;

class CyclicNumberRuleTest extends TestCase
{
    function testReplace()
    {
        $rule = new CyclicNumberRule(3, "Fizz");
        $this->assertEquals("", $rule->replace(1));
        $this->assertEquals("Fizz", $rule->replace(3));
        $this->assertEquals("Fizz", $rule->replace(6));
    }
}
