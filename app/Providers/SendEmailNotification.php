<?php

namespace App\Providers;

use App\Mail\CreateTicketUserNotification;
use App\Providers\TicketCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\TicketCreated $event
     *
     * @return void
     */
    public function handle(TicketCreated $event)
    {
        Mail::to($event->user)->send(new CreateTicketUserNotification());
    }
}
