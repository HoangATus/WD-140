@extends('clients.layouts.client')

@section('content')
    <div class="container my-5">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <h1 class="text-center mb-4 font-weight-bold">Đơn Hàng Của Tôi</h1>

        @if ($orders->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered shadow-sm rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Ngày Đặt</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
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
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-clock"></i> Chờ xử lý
                                        </span>
                                    @elseif ($order->status == 'confirmed')
                                        <span class="badge bg-info text-white">
                                            <i class="fas fa-check-circle"></i> Đã xác nhận
                                        </span>
                                    @elseif ($order->status == 'shipped')
                                        <span class="badge bg-primary text-white">
                                            <i class="fas fa-truck"></i> Đang giao hàng
                                        </span>
                                    @elseif ($order->status == 'completed')
                                        <span class="badge bg-success text-white">
                                            <i class="fas fa-thumbs-up"></i> Hoàn thành
                                        </span>
                                        @elseif ($order->status == 'failed')
                                        <span class="badge bg-secondary">Giao Hàng Thất Bại</span>
                                    @elseif ($order->status == 'canceled')
                                        <span class="badge bg-danger text-white">
                                            <i class="fas fa-times-circle"></i> Đã hủy
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if (in_array($order->payment_method, ['online']) && $order->payment_status == 'pending' && $order->status != 'canceled')
                                    <a href="{{ route('clients.retryPayment', $order->id) }}" class="btn btn-warning me-3"
                                       style="font-size: 14px; padding: 8px 16px; border-radius: 8px;">
                                        Thanh Toán Lại
                                    </a>
                                @endif                                
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> Xem Chi Tiết
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
            <!-- Pagination (nếu có nhiều đơn hàng) -->
            <div class="d-flex justify-content-center">
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="alert alert-info text-center">
                Bạn chưa có đơn hàng nào.
            </div>
        @endif
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        
@endsection
