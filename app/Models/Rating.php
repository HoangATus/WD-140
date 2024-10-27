<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings'; // Tên bảng tương ứng trong cơ sở dữ liệu

    protected $fillable = [
        'user_id',
        'order_id',
        'customer_name',
        'product_id',
        'rating',
        'review_text',
        'review',
        'hidden',
    ];

    // Mối quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    // Mối quan hệ với Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}