<?php

namespace App\Models;

use App\Events\TransactionHasBeenCreated;
use App\Events\TransactionHasBeenRefunded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;



class Transaction extends Model
{
    /** @const пополнение счета */
    const TYPE_REFILL = 1;
    /** @const списание со счета */
    const TYPE_DEBIT = 2;
    /** @const Возвращаемая транзакция */
    const TYPE_REFUND = 3;

    use HasFactory;

    /**
     *
     * @return void
     */
    public static function boot() {
        parent::boot();

        self::creating(function ($transaction) {
            $transaction->setFields();
        });
        self::created(function ($transaction) {
            event(new TransactionHasBeenCreated($transaction));
        });
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'user_id', 'value', 'type', 'created_at',
    ];

    /**
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function refunded() {
        return $this->type === self::TYPE_REFUND;
    }

    public function refund() {
        $this->update(['type' => self::TYPE_REFUND]);
        event(new TransactionHasBeenRefunded($this));
    }

    private function setFields()
    {
        if($this->value > 0) {
            $this->type = self::TYPE_REFILL;
            $this->description = 'Пополнение ';
        } else {
            $this->type = self::TYPE_DEBIT;
            $this->description = 'Списание ';
        }

        $this->description .= ' на сумму ' . $this->value . ' '  . Lang::choice('рубль|рубля|рублей',
                $this->value, [], 'ru');
    }

}
