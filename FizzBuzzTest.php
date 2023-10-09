<?php

namespace FizzBuzz;

use FizzBuzz\Core\NumberConverter;
use FizzBuzz\Spec\PassThroughRule;
use FizzBuzz\Spec\CyclicNumberRule;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    function testFizzBuzz()
    {
        $fizzBuzz = new NumberConverter([
            new CyclicNumberRule(3, "Fizz"),
            new CyclicNumberRule(5, "Buzz"),
            new PassThroughRule(),
        ]);

        $this->assertEquals("1", $fizzBuzz->convert(1));
        $this->assertEquals("2", $fizzBuzz->convert(2));
        $this->assertEquals("Fizz", $fizzBuzz->convert(3));
    }
}
