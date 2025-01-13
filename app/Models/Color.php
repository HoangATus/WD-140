<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        // 'quantity',
    ];

    public function variants()
    {
        return $this->hasMany(Variant::class, 'attribute_color_id');
    }

    public function products()
{
    return $this->hasMany(Product::class, 'color_id');
}
}
