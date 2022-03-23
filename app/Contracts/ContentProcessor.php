<?php

namespace App\Contracts;

interface ContentProcessor
{
    public function process(string $text): string
}
