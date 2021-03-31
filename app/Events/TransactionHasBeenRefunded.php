<?php

namespace App\Events;

use App\Models\Transaction;

/**
 * Class TransactionHasBeenRefunded
 * @package App\Events
 */
class TransactionHasBeenRefunded extends Event
{

    /**
     * @var Transaction
     */
    public $transaction;

    /**
     * Create a new event instance.
     *
     * @param Transaction$transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
}
