<?php

namespace App\Services;

use App\Contracts\ContentProcessor;
use App\Contracts\MessageCreator;
use App\Models\Message;
use App\Models\Ticket;
use App\Services\Processors\ObsceneWordProcess;
use App\Services\Processors\StripTagsProcessor;
use Illuminate\Http\Request;

class RequestMessageCreator implements MessageCreator
{
    public function __construct(private Message $message)
    {
    }

    public function create(Request $request, Ticket $ticket): Message
    {
       return $this->message->create([
            'ticket_id' => $ticket->id,
            'user_id' => $request->user()->id,
            'content' => $this->processContent($request->get('content'))
        ]);
    }

    private function processContent(string $content): string
    {
        foreach ($this->getProcessors() as $processor) {
            if ($processor instanceof ContentProcessor) {
                $content = (new $processor())->process($content);
            }
        }

        return $content;
    }

    private function getProcessors(): array
    {
        return [
            StripTagsProcessor::class,
            ObsceneWordProcess::class
        ];
    }
}
