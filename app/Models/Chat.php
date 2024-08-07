<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'ad_id',
        'message',
        // Другие атрибуты, если есть
    ];

      /**
     * Get the user that owns the chat.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ad that owns the chat.
     */
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
