<?php

namespace App\Handler;

use App\Contracts\MessageCreator;
use App\Contracts\ServerCredentialsCreator;
use App\Contracts\TicketCreator;
use App\Http\Requests\StoreTicketRequest;
use App\Providers\TicketCreated;

class CreateTicketHandler
{
    public function __construct(
        private TicketCreator $ticket,
        private MessageCreator $message,
        private ServerCredentialsCreator $credential
    ) {
    }

    public function __invoke(StoreTicketRequest $request): void
    {
        $ticket = $this->ticket->create($request);
        $message = $this->message->create($request, $ticket);

        if ($request->filled(['ftp_login', 'ftp_password'])) {
            $this->credential->create($request, $message);
        }

        event(new TicketCreated($request->user()));
    }
}
