<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
  

    protected $fillable = ['title', 'slug', 'content', 'image', 'author', 'status', 'category_id', 'view_count'];

    public function category()
{
    return $this->belongsTo(NewsCategory::class, 'category_id');
}

}

