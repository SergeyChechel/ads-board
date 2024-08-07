<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'lastname',
        'middlename',
        'birthday',
        'email_verified_at',
        'role_id',
        'address',
        'phone',
        'status',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    /**
     * Get the ads for the user.
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

        /**
     * Get the chats for the user.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

        /**
     * Get the balance record associated with the user.
     */
    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

        /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
