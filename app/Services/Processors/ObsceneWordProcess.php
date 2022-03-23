<?php

namespace App\Services\Processors;

use App\Contracts\ContentProcessor;
use Wkhooy\ObsceneCensorRus;

class ObsceneWordProcess implements ContentProcessor
{
    public function process( string $text ): string
    {
        return str_replace('*', '', ObsceneCensorRus::filterText($text));
    }
}
