<?php

namespace FizzBuzz\Core;

interface OutputInterface
{
    public function write(string $data): void;
}
