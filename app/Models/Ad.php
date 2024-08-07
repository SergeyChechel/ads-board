<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'is_verified',
        'reject_reason',
        'chat_id',
        'category_id',
        'manager_verificator_id',
        'location',
        'status',
        'meta_title',
        'meta_desc',
        'meta_keywords',
        'url',
        'relative_urls',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_verified' => 'boolean',
        'status' => 'integer',
    ];

    /**
     * Get the user that owns the ad.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the chats for the ad.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    /**
     * Get the category of the ad.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the manager verificator for the ad.
     */
    public function managerVerificator()
    {
        return $this->belongsTo(User::class, 'manager_verificator_id');
    }

    /**
     * Get the ad images for the ad.
     */
    public function adImages()
    {
        return $this->hasMany(AdImage::class);
    }

}

