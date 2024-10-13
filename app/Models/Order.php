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
    const STATUS_FAILED = 'failed';
    public static $statuss = [
        'pending' => 'Chờ Xác Nhận',
        'confirmed' => 'Đã Xác Nhận',
        'shipped' => 'Đang Giao Hàng',
        'completed' => 'Đã Hoàn Thành',
        'canceled' => 'Đã Hủy',
        'failed' => 'Giao Hàng Thất Bại',
    ];

    public function getStatussAttribute()
    {
        return self::$statuss[$this->status] ?? $this->status;
    }
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
    public function statusChanges()
    {
        return $this->hasMany(OrderStatusChange::class);
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
    public function updateStatus($newStatus, $notes = null)
    {
        $oldStatus = $this->status;
        $this->status = $newStatus; 
        $this->save(); 

        $this->statusChanges()->create([
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'notes' => $notes,
            'changed_by' => auth()->id(), 
        ]);
    }
}
