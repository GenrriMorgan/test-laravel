<?php

namespace App\Services\Processors;

use App\Contracts\ContentProcessor;

class StripTagsProcessor implements ContentProcessor
{
    public function process(string $text): string
    {
        return strip_tags($text);
    }
}
