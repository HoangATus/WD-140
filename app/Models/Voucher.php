<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'start_date',
        'end_date',
        'type',
        'discount_amount',
        'discount_percentage',
        'max_discount',
        'quantity',
        'status',
        'usage_type'
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
