<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('clients.contact');
    }

    public function sendEmail(Request $request)
{
    // Validate dữ liệu từ form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Lấy dữ liệu từ form
    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'messageContent' => $request->input('message'),
    ];

    // Gửi email
    Mail::send('clients.emails.contact', $data, function ($message) use ($data) {
        $message->from($data['email'], $data['name']) // Email khách hàng gửi đi
                ->to('hoangthanhtu135@gmail.com')    // Email của bạn
                ->subject('New Contact Form Submission');
        // Dự phòng nếu email khách hàng không hợp lệ
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }        
    });

    return back()->with('success', 'Thông tin của bạn đã được gửi thành công!');
}
}
