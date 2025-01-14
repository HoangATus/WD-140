<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'variant_id', 'product_id', 'product_name', 'variant_name', 'price','price_import', 'quantity', 'image', 'rated'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id',);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}