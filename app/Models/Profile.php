<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App\Models
 */
class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'balance',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function balance()
    {
        return $this->balance;
    }

    /**
     * @param int $value
     * @return void
     */
    public function changeBalance(int $value)
    {
        $this->update([
            'balance' => $this->balance += $value
        ]);
    }
}
