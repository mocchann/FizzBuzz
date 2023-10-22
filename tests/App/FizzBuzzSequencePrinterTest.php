<?php

namespace FizzBuzz\App;

use FizzBuzz\Core\NumberConverter;
use FizzBuzz\Core\OutputInterface;
use PHPUnit\Framework\TestCase;

class FizzBuzzSequencePrinterTest extends TestCase
{
    public function testPrintNone(): void
    {
        $conveter = $this->createMock(NumberConverter::class);
        $conveter->expects($this->never())->method('convert');
        $output = $this->createMock(OutputInterface::class);
        $output->expects($this->never())->method('write');

        $printer = new FizzBuzzSequencePrinter($conveter, $output);
        $printer->printRange(0, -1);
    }

    public function testPrint1To3(): void
    {
        $conveter = $this->createMock(NumberConverter::class);
        $conveter->expects($this->exactly(3))
            ->method('convert')
            ->will($this->returnValueMap([1, "1"], [2, "2"], [3, "Fizz"]));

        $output = $this->createMock(OutputInterface::class);
        $output->expects($this->exactly(3))
            ->method('write')
            ->withConsecutive(["1 1\n"], ["2 2\n"], ["3 Fizz\n"]);

        $printer = new FizzBuzzSequencePrinter($conveter, $output);
        $printer->printRange(1, 3);
    }
}
