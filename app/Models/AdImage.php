<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ad_id',
        'pic_id',
        'title',
        'description',
        'file_path',
        'tags',
        'upload_date',
        'dimensions',
        'source',
        'status',
    ];

    /**
     * Get the ad that owns the image.
     */
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}

