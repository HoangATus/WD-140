<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewComment extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'user_id', 'comment', 'approved'];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
