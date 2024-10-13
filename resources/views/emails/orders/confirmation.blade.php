<!-- resources/views/emails/orders/confirmation.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Xác Nhận Đơn Hàng</title>
</head>
<body>
    <h1>Cảm Ơn Bạn Đã Đặt Hàng!</h1>
    <p>Đơn hàng của bạn đã được nhận và đang được xử lý.</p>

    <h3>Thông Tin Đơn Hàng:</h3>
    <p><strong>Mã Đơn Hàng:</strong> #{{ $order->id }}</p>
    <p><strong>Tên Người Nhận:</strong> {{ $order->name }}</p>
    <p><strong>Số Điện Thoại:</strong> {{ $order->phone }}</p>
    <p><strong>Địa Chỉ:</strong> {{ $order->address }}</p>
    @if ($order->notes)
        <p><strong>Ghi Chú:</strong> {{ $order->notes }}</p>
    @endif
    <p><strong>Ngày Đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Tổng Tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} ₫</p>

    <h3>Sản Phẩm Đã Đặt:</h3>
    <ul>
        @foreach ($order->items as $item)
            <li>{{ $item->product_name }} - {{ $item->variant_name }} x {{ $item->quantity }} - {{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫</li>
        @endforeach
    </ul>

    <p>Chúng tôi sẽ thông báo cho bạn khi đơn hàng của bạn được giao hàng.</p>

    <p>Trân trọng,<br>{{ config('app.name') }}</p>
</body>
</html>
