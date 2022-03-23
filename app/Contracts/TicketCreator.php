<?php

namespace App\Contracts;

use App\Models\Ticket;
use Illuminate\Http\Request;

interface TicketCreator
{
    public function create(Request $request): Ticket;
}
