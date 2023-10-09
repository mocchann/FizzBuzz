<?php

namespace FizzBuzz\Core\ReplaceRuleInterface;

class CyclicNumberRule implements ReplaceRuleInterface
{
    function __construct(
        private int $base,
        private string $replacement
    )
    {}

    function replace(int $n): string
    {
        return ($n % $this->base == 0) ? $this->replacement : "";
    }
}
