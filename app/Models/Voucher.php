<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'discount_percent',
        'max_discount_amount',
        'start_date',
        'end_date',
        'is_public',
        'is_active',
    ];
    protected $dates = [
        'start_date',
        'end_date',
    ];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_voucher', 'voucher_id', 'user_id');
    }
}
