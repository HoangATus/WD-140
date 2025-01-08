<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_code',
        'attribute_color_id',
        'attribute_size_id',
        'variant_listed_price',
        'variant_sale_price',
        'variant_import_price',
        'quantity',
        'image',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'attribute_color_id');
    }
    public function size()
    {
        return $this->belongsTo(AttributeSize::class, 'attribute_size_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
