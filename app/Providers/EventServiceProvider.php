<?php

namespace App\Providers;

use App\Events\TransactionHasBeenCreated;
use App\Events\TransactionHasBeenRefunded;
use App\Listeners\ChangeUserBalance;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
        TransactionHasBeenRefunded::class => [
            ChangeUserBalance::class
        ],
        TransactionHasBeenCreated::class => [
            ChangeUserBalance::class
        ]
    ];
}
