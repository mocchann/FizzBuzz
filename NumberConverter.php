<?php

namespace FizzBuzz\Core;

class NumberConverter
{
    /**
     * @param ReplaceRuleInterface[] $rules
     */
    function __construct(
        protected array $rules
    ){}

    function convert(int $n): string
    {
        $result = "";
        foreach ($this->rules as $rule) {
            $result .= $rule->replace($n);
        }

        return $result;
    }
}
