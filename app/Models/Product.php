<?php

namespace App\Models;

use App\Models\Variant;
use App\Models\Category;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
}