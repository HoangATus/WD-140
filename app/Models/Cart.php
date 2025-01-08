<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'variant_id',
        'product_name',
        'variant_name',
        'price',
        'quantity',
        'image',
        'stock',
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'attribute_color_id');
    }


    public function size()
    {
        return $this->belongsTo(AttributeSize::class, 'attribute_size_id');
    }
}
