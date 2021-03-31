<?php

namespace App\Events;

use App\Models\Transaction;

class TransactionHasBeenCreated extends Event
{

    public $transaction;

    /**
     * Create a new event instance.
     *
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
}
