<?php

use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth.token'], 'prefix' => 'tickets'], function() {
    Route::post('/', [TicketController::class, 'create'])->name('tickets.create');
});
