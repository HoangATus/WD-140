<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Voucher extends Model
{
    protected $fillable = [
        'code', 
        'discount_type', 
        'discount_value', 
        'discount_percent', 
        'max_discount_amount', 
        'quantity', 
        'start_date', 
        'end_date', 
        'is_active', 
        'is_public', 
        'usage_type',
        'min_order_amount',
    ];
    protected $dates = [
        'start_date',
        'end_date',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_voucher', 'voucher_id', 'user_id');
    }

}
