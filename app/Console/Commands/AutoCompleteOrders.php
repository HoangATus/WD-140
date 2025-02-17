<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AutoCompleteOrders extends Command
{
    /**
     * Tên lệnh console.
     *
     * @var string
     */
    protected $signature = 'orders:auto-complete';

    /**
     * Mô tả lệnh console.
     *
     * @var string
     */
    protected $description = 'Tự động chuyển trạng thái đơn hàng thành "Hoàn Thành" sau 5 phút nếu khách hàng không xác nhận';

    /**
     * Khởi tạo lệnh.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Thực thi lệnh.
     */
    public function handle()
    {
        $fiveMinutesAgo = Carbon::now()->subMinutes(5);
    
        $orders = Order::where('status', Order::STATUS_DELIVERED)
                       ->where('updated_at', '<=', $fiveMinutesAgo)
                       ->get();
    
        foreach ($orders as $order) {
            $oldStatus = $order->status; 
            $order->status = Order::STATUS_COMPLETED; 
            $order->save(); 
    
            $userId = $order->user_id;
            $changedBy = $userId ?: 0;
    
            $order->statusChanges()->create([
                'old_status' => $oldStatus,
                'new_status' => Order::STATUS_COMPLETED,
                'notes' => 'Tự động chuyển trạng thái thành hoàn thành sau 5 phút',
                'changed_by' => $changedBy,
            ]);
        }
        Log::info('AutoCompleteOrders command executed successfully. Processed orders: ' . $orders->count());
    }
    
}
