@extends('clients.layouts.client')

@section('content')
<div class="container">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <h1>Chi tiết đơn hàng: {{ $order->order_code }}</h1>

    <div class="card mb-4">
        <div class="card-header">
            Thông tin đơn hàng
        </div>
        <div class="card-body">
            <p><strong>Tên:</strong> {{ $order->name }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
            <p><strong>Ghi chú:</strong> {{ $order->notes ?? 'Không có' }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} VNĐ</p>
            <p><strong>Trạng thái:</strong>
                @if ($order->status == 'pending')
                    <span class="badge badge-warning">Chờ xử lý</span>
                @elseif ($order->status == 'confirmed')
                    <span class="badge badge-info">Đã xác nhận</span>
                @elseif ($order->status == 'shipped')
                    <span class="badge badge-primary">Đang giao hàng</span>
                @elseif ($order->status == 'completed')
                    <span class="badge badge-success">Hoàn thành</span>
                @elseif ($order->status == 'canceled')
                    <span class="badge badge-danger">Đã hủy</span>
                @endif
            </p>
            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
            <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <h3>Danh sách sản phẩm</h3>
    @if ($orderItems->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Phiên Bản</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $item)
                <tr>
                    <td><img src="{{ $item->image }}" alt="{{ $item->product_name }}" width="50"></td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->variant_name }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VNĐ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Không có sản phẩm trong đơn hàng này.</p>
    @endif

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
</div>
@endsection
