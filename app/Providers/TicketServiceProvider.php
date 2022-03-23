<?php

namespace App\Providers;

use App\Contracts\MessageCreator;
use App\Contracts\ServerCredentialsCreator;
use App\Contracts\TicketCreator;
use App\Services\RequestMessageCreator;
use App\Services\RequestServerCredentialsCreator;
use App\Services\RequestTicketCreator;
use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{
    public $bindings = [
        TicketCreator::class            => RequestTicketCreator::class,
        MessageCreator::class           => RequestMessageCreator::class,
        ServerCredentialsCreator::class => RequestServerCredentialsCreator::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
