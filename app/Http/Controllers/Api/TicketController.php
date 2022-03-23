<?php

namespace App\Http\Controllers\Api;

use App\Handler\CreateTicketHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    public function create(StoreTicketRequest $request, CreateTicketHandler $handler)
    {
        try {
            $handler($request);

            return response()->json(['status' => 'Ok']);
        } catch (\Throwable $exception) {
            return response()->json(['status' => 'Error'], 400);
        }
    }
}
