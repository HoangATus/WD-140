<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'slug',
        'product_code',
        'product_name',
        'product_image_url',
        'description',
        'is_active',
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function galleries() {
        return $this->hasMany(ProductGallery::class);
    }

    public function getStockStatusAttribute()
    {
        $totalQuantity = $this->variants->sum('quantity');

        if ($totalQuantity <= 0) {
            return 'Hết hàng';
        } elseif ($totalQuantity < 5) {
            return 'Sắp hết hàng';
        } else {
            return 'Còn hàng';
        }
    }
}
