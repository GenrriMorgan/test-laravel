<?php

namespace App\Services;

use App\Contracts\TicketCreator;
use App\Models\Ticket;
use Illuminate\Http\Request;

class RequestTicketCreator implements TicketCreator {
    public function __construct(private Ticket $ticket)
    {
    }

    public function create(Request $request): Ticket
    {
        return $this->ticket->create([
            'user_id'   =>  $request->user()->id,
            'subject'   =>  $request->get('subject'),
            'uid'       =>  uniqid('HTX-')
        ]);
    }
}
