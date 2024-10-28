<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng Đặt Thành Công!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        h3 {
            color: #555;
        }

        .order-details {
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            color: white;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-primary {
            background-color: #007bff;
        }

        .bg-info {
            background-color: #17a2b8;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-secondary {
            background-color: #6c757d;
        }

        .bg-light {
            background-color: #f8f9fa;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Đơn Hàng Đặt Thành Công!</h1>
        <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin chi tiết về đơn hàng của bạn:</p>

        <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
        <p><strong>Tên khách hàng:</strong> {{ $order->name }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        <p><strong>Địa chỉ giao hàng:</strong> {{ $order->address }}</p>
        <p><strong>Ghi chú:</strong> {{ $order->notes ?? 'Không có ghi chú' }}</p>

        <div class="order-details">
            <h2>Chi tiết đơn hàng:</h2>


            <table class="order-items" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 10px;">Hình ảnh</th>
                        <th style="border: 1px solid #ddd; padding: 10px;">Tên sản phẩm</th>
                        <th style="border: 1px solid #ddd; padding: 10px;">Biến thể</th>
                        <th style="border: 1px solid #ddd; padding: 10px;">Giá</th>
                        <th style="border: 1px solid #ddd; padding: 10px;">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 10px;">
                                <img src="{{ $item->image }}" alt="{{ $item->product_name }}"style="max-width: 100px;">

                            </td>

                            <td style="border: 1px solid #ddd; padding: 10px;">{{ $item->product_name }}</td>
                            <td style="border: 1px solid #ddd; padding: 10px;">{{ $item->variant_name }}</td>
                            <td style="border: 1px solid #ddd; padding: 10px;">
                                {{ number_format($item->price, 0, ',', '.') }} đ</td>
                            <td style="border: 1px solid #ddd; padding: 10px;">{{ $item->quantity }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div style="text-align: right; font-weight: bold; margin-top: 20px;">
                <p>Tổng tiền: {{ number_format($order->total, 0, ',', '.') }} VND</p>
            </div>
        </div>
      

        <h3>Chúng tôi sẽ sớm liên hệ với bạn để xác nhận đơn hàng và thời gian giao hàng.</h3>

    </div>
</body>

</html>
