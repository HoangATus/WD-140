@extends('clients.layouts.client')

@section('content')
    <div class="container my-5">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <h1 class="text-center mb-4 font-weight-bold">Đơn hàng của tôi</h1>

        @if ($orders->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover shadow-sm rounded">
                    <thead class="thead-light">
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
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
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
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                        Xem Chi Tiết
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination (nếu có nhiều đơn hàng) -->
            {{ $orders->links('pagination::bootstrap-5') }}
        @else
            <div class="alert alert-info text-center">
                Bạn chưa có đơn hàng nào.
            </div>
        @endif
    </div>
@endsection
