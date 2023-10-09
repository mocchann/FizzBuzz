<?php

namespace FizzBuzz\Core;

use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
    function testConvertWithUnmatchedFizzBuzzAndConstantRule()
    {
        $fizzBuzz = new NumberConverter([
            $this->createMockRule(
                expectedNumber: 1,
                replacement: ""
            ),// 1なのでFizzの代わりに""
            $this->createMockRule(
                expectedNumber: 1,
                replacement: ""
            ),// 1なのでBuzzの代わりに""
            $this->createMockRule(
                expectedNumber: 1,
                replacement: "1"
            ),// 1を"1"にする
        ]);

        $this->assertEquals("1", $fizzBuzz->convert(1));
    }

    function testConvertWithFizzBuzzRules()
    {
        $fizzBuzz = new NumberConverter([
            // 1を受け取りFizzになるモック
            $this->createMockRule(
                expectedNumber: 1,
                replacement: "Fizz"
            ),
            // 1を受け取りBuzzになるモック
            $this->createMock(
                expectedNumber: 1,
                replacement: "Buzz"
            )
        ]);
        $this->assertEquals("FizzBuzz", $fizzBuzz->convert(1));
    }

    private function createMockRule(
        int $expectedNumber,
        string $replacement
    ): ReplaceRuleInterface
    {
        $rule = $this->createMock(ReplaceRuleInterface::class);
        $rule->expects($this->atLeastOnce())
            ->method('replace')
            ->with($expectedNumber)
            ->willReturn($replacement);
        return $rule;
    }

    function testConvertWithSingleRule()
    {
        $rule = $this->createMock(ReplaceRuleInterface::class);
        $rule->expects($this->atLeastOnce())
        ->method('replace')
        ->with(1)
        ->willReturn("Replaced");
        
        $fizzBuzz = new NumberConverter([$rule]);
        $this->assertEquals("Replaced", $fizzBuzz->convert(1));
    }

    function testConvertWithEmptyRules()
    {
        $fizzBuzz = new NumberConverter([]);
        $this->assertEquals("", $fizzBuzz->convert(1));
    }
}
