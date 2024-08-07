<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'amount',
        'comment',
    ];

    /**
     * Get the user that owns the balance.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

