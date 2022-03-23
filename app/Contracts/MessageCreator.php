<?php


namespace App\Contracts;

use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Http\Request;

interface MessageCreator
{
    public function create(Request $request, Ticket $ticket): Message;
}
