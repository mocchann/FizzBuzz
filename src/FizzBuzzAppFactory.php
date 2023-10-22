<?php

namespace FizzBuzz;

use FizzBuzz\App\FizzBuzzSequencePrinter;
use FizzBuzz\Core\NumberConverter;
use FizzBuzz\Core\OutputInterface;
use FizzBuzz\Core\ReplaceRuleInterface;
use FizzBuzz\Spec\CyclicNumberRule;
use FizzBuzz\Spec\PassThroughRule;

class FizzBuzzAppFactory
{
    public function create(): FizzBuzzSequencePrinter
    {
        return new FizzBuzzSequencePrinter(
            $this->createFizzBuzz(),
            $this->createOutput()
        );
    }

    protected function createFizzBuzz(): NumberConverter
    {
        return new NumberConverter([
            $this->createFizzBuzz(),
            $this->createBuzzRule(),
            $this->createPassThroughRule(),
        ]);
    }

    protected function createFizzRule(): ReplaceRuleInterface
    {
        return new CyclicNumberRule(3, "Fizz");
    }

    protected function createBuzzRule(): ReplaceRuleInterface
    {
        return new CyclicNumberRule(5, "Buzz");
    }

    protected function createPassThroughRule(): ReplaceRuleInterface
    {
        return new PassThroughRule();
    }

    protected function createOutput(): OutputInterface
    {
        return new ConsoleOutput();
    }
}

class ConsoleOutput implements OutputInterface
{
    public function write(string $data): void
    {
        echo $data;
    }
}
