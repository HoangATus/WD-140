<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $newStatus;
    public $notes;

    public function __construct(Order $order, $newStatus, $notes = null)
    {
        $this->order = $order;
        $this->newStatus = $newStatus;
        $this->notes = $notes; 
    }

    public function build()
    {
        return $this->subject('Cập nhật trạng thái đơn hàng của bạn')  
                    ->to($this->order->user->user_email)  
                    ->cc('cc@example.com')           
                    ->bcc('bcc@example.com')         
                    ->view('emails.order-status-changed')
                    ->with([
                        'orderCode' => $this->order->order_code,
                        'newStatus' => $this->order->newStatus, 
                        'totalPrice' => $this->order->total,
                        'notes' => $this->notes, 
                        'orderItems' => $this->order->items, 
                    ]);
    }
}
