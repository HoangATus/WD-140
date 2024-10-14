<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // Các hằng số cho trạng thái đơn hàng
    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELED = 'canceled';

    protected $fillable = [
        'user_id',
        'order_code',
        'name',
        'phone',
        'address',
        'notes',
        'total',
        'status',
        'payment_method',
        'cancellation_reason'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cancel()
    {
        if (in_array($this->status, [self::STATUS_PENDING, self::STATUS_CONFIRMED])) {
            $this->status = self::STATUS_CANCELED;
            $this->save();

            foreach ($this->items as $item) {
                $variant = $item->variant;
                if ($variant) {
                    $variant->quantity += $item->quantity;
                    $variant->save();
                }
            }

            return true;
        }

        return false;
    }
}
