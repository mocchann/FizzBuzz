<?php

namespace FizzBuzz\Core\ReplaceRuleInterface;

class PassThroughRule implements ReplaceRuleInterface
{
    function replace(int $n): string
    {
        return (string)$n;
    }
}
