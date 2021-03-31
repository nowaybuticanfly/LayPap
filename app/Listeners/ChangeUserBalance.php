<?php

namespace App\Listeners;

use App\Events\Event;
use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeUserBalance implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }


    /**
     * @param Event $event
     */
    public function handle(Event $event)
    {
        $transaction = $event->transaction;
        if($transaction->type === Transaction::TYPE_REFUND) {
            $transaction->user->profile->changeBalance((-1) * $transaction->value);
        } else {
            $transaction->user->profile->changeBalance($transaction->value);
        }
    }
}
