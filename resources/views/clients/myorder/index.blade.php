{{-- resources/views/orders/index.blade.php --}}
@extends('clients.layouts.client')

@section('content')
<div class="container">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <h1>Đơn hàng của tôi</h1>

    @if ($orders->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                    <td>
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
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

     

    @else
        <p>Bạn chưa có đơn hàng nào.</p>
    @endif
    
</div>
@endsection
