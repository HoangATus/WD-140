<?php
namespace App\Models;

use App\Mail\OrderStatusChanged;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELED = 'canceled';

    public static $statuss = [
        'pending' => 'Chờ Xác Nhận',
        'confirmed' => 'Đã Xác Nhận',
        'shipped' => 'Đang Giao Hàng',
        'delivered' => 'Giao Hàng Thành Công',
        'completed' => 'Đã Hoàn Thành',
        'failed' => 'Giao Hàng Thất Bại',
        'canceled' => 'Đã Hủy',
    ];
    public static $payment = [
        'pending' => 'Chờ Thanh Toán',
        'paid' => 'Đã Thanh Toán',
    ];
    public function getStatussAttribute()
    {
        return self::$statuss[$this->status] ?? $this->status;
    }
    public function getPaymentAttribute()
    {
        return self::$payment[$this->payment_status] ?? $this->payment_status;
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
        'payment_status', 
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

    public function cancel($reason = null)
    {
        if (in_array($this->status, [self::STATUS_PENDING, self::STATUS_CONFIRMED])) {
            $oldStatus = $this->status; 
            $this->status = self::STATUS_CANCELED;
            $this->cancellation_reason = $reason; 
            $this->save();

         

            $this->statusChanges()->create([
                'old_status' => $oldStatus,
                'new_status' => self::STATUS_CANCELED,
                'notes' => $reason, 
                'changed_by' => auth()->id(), 
            ]);
            

            return true;
        }

        return false;
    }

    // public function updateStatus($newStatus, $notes = null)
    // {
    //     $oldStatus = $this->status;
    
    //     if ($newStatus === self::STATUS_FAILED) {
    //         foreach ($this->orderItems as $orderItem) {
    //             $variant = Variant::find($orderItem->variant_id);
    //             if ($variant) {
    //                 $variant->quantity += $orderItem->quantity; 
    //             }
    //         }
    //     }
    
    //     $this->status = $newStatus;
    //     $this->save();
    
    //     $this->statusChanges()->create([
    //         'old_status' => $oldStatus,
    //         'new_status' => $newStatus,
    //         'notes' => $notes,
    //         //'changed_by' => auth()->id(),
    //         'changed_by' => auth()->id() ?? 0, 
    //     ]);
    // }
    public function updateStatus($newStatus, $notes = null)
    {
        $oldStatus = $this->status;
    
        if ($newStatus === self::STATUS_FAILED) {
            $this->load('orderItems.variant');
            foreach ($this->orderItems as $orderItem) {
                $variant = $orderItem->variant;
                if ($variant) {
                    $variant->quantity += $orderItem->quantity;
                    $variant->save(); 
                }
            }
        }
        $this->status = $newStatus;     
        $this->updated_at = now();
        $this->save();
        $this->statusChanges()->create([
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'notes' => $notes,
            'changed_by' => auth()->id() ?? 0,
        ]);
    
       
        if ($this->user) { 
            Mail::to($this->user->user_email)
                ->cc('cc@example.com')   
                ->bcc('bcc@example.com') 
                ->send(new OrderStatusChanged($this, $newStatus, $notes)); 
        } else {
            Log::warning('Không tìm thấy người dùng cho đơn hàng: ' . $this->id);
        }
    }
    
}