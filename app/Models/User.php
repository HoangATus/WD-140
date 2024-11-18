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

    const ROLE_ADMIN = 'Admin';
    const ROLE_USER = 'User';
    protected $table = 'users'; // Tên bảng
    protected $primaryKey = 'user_id'; // Tên cột khóa chính
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_address',
        'user_phone_number',
        'points',
        'role',
        'is_banned',
        'banned_until'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_password' => 'hashed',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(NewComment::class, 'user_id');
    }

/**
 * 
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function vouchers()
{
    return $this->belongsToMany(Voucher::class, 'user_voucher', 'user_id', 'voucher_id');
}

    

}
