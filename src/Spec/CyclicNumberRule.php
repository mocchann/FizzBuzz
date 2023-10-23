<?php

namespace FizzBuzz\Spec;

use FizzBuzz\Core\ReplaceRuleInterface;

class CyclicNumberRule implements ReplaceRuleInterface
{
    public function __construct(
        private int $base,
        private string $replacement
    ){}

    public function apply(string $carry, int $n): string
    {
        return $carry . $this->replacement;
    }

    public function match(string $carry, int $n): bool
    {
        return $n % $this->base === 0;
    }
}
