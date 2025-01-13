@extends('clients.layouts.client')

@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Đơn Hàng Của Tôi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi Tiết Đơn Hàng #{{ $order->id }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="order-details-section">
        <div class="container">
            <h2>Chi Tiết Đơn Hàng #{{ $order->id }}</h2>

            <div class="order-info mb-4">
                <h4>Thông Tin Giao Hàng</h4>
                <p><strong>Tên Người Nhận:</strong> {{ $order->name }}</p>
                <p><strong>Số Điện Thoại:</strong> {{ $order->phone }}</p>
                <p><strong>Địa Chỉ:</strong> {{ $order->address }}</p>
                @if ($order->notes)
                    <p><strong>Ghi Chú:</strong> {{ $order->notes }}</p>
                @endif
                <p><strong>Ngày Đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Trạng Thái:</strong> <span
                        class="badge badge-pill badge-info">{{ ucfirst($order->status) }}</span></p>
            </div>

            <div class="order-items mb-4">
                <h4>Sản Phẩm Đã Đặt</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Biến Thể</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->image }}" alt="{{ $item->product_name }}" width="60">
                                </td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->variant_name }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="order-summary mb-4">
                <h4>Tổng Tiền Đơn Hàng</h4>
                <p><strong>Tổng Tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} ₫</p>
            </div>

            @if (in_array($order->status, [\App\Models\Order::STATUS_PENDING, \App\Models\Order::STATUS_CONFIRMED]))
                <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy Đơn Hàng</button>
                </form>
            @endif
        </div>
    </section>

    @include('clients.blocks.assets.js')
@endsection
