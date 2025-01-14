@extends('admins.layouts.admin')

@section('title')
    Quản lý Tài khoản
@endsection

@section('content')
    <div class="container">
        <h1>Chi Tiết Đơn Hàng #{{ $order->order_code }}</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h4>#1. Thông Tin Đơn Hàng</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label>Mã Đơn Hàng</label>
                        <input type="text" class="form-control" value="{{ $order->order_code }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Phương thức thanh toán</label>
                        <input type="text" class="form-control" value=" {{ $order->payment_method }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Trạng Thái Thanh Toán</label>
                        <input type="text" class="form-control" value="{{ $order->payment }}" readonly>

                    </div>
                    <div class="col-md-6 mt-3">
                        <label>Tên Khách Hàng</label>
                        <input type="text" class="form-control" value="{{ $order->name }}" readonly>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label>Điện Thoại</label>
                        <input type="text" class="form-control" value="{{ $order->phone }}" readonly>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" value="{{ $order->address }}" readonly>
                    </div>
                </div>
            </div>
        </div>


    <div class="card mb-4">
        <div class="card-header">
            <h4>#2. Thông Tin Sản Phẩm</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Biến Thể</th>
                        <th>Số Lượng</th>
                        <th>Giá Bán</th>
                        <th>Tổng tiền hàng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $index => $item)
                        <tr align="center">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->variant_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                            <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-3 offset-md-9">
                    <div class="d-flex justify-content-between">
                        <span><b>Tổng tiền hàng:</b></span>
                        <span class="fw-bold"> {{ number_format($order->orderItems->sum(function($item) { return $item->price * $item->quantity; }), 0, ',', '.') }} VND
                            </span>
                    </div>
            
                    @if(!empty($order->points_discount) && $order->points_discount > 0)
                    <div class="d-flex justify-content-between">
                        <span><b>Điểm thưởng:</b></span>
                        <span class="text-danger">-{{ number_format($order->points_discount, 0, ',', '.') }} VNĐ</span>
                    </div>
                    @endif
            
                    @if(!empty($order->voucher_discount) && $order->voucher_discount > 0)
                    <div class="d-flex justify-content-between">
                        <span><b>Mã giảm giá:</b></span>
                        <span class="text-danger">-{{ number_format($order->voucher_discount, 0, ',', '.') }} VNĐ</span>
                    </div>
                    @endif
            
                    <div class="d-flex justify-content-between">
                        <span><b>Thành tiền:</b></span>
                        <span class="fw-bold">{{ number_format($order->total) }} VNĐ</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h4>#3. Lịch Sử Thay Đổi Trạng Thái</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Trạng Thái Thay Đổi</th>
                            <th>Ghi Chú</th>
                            <th>Người Thay Đổi</th>
                            <th>Thời Gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->statusChanges as $key => $statusChange)
                            <tr align="center">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ \App\Models\Order::$statuss[$statusChange->old_status] ?? $statusChange->old_status }}
                                    -->
                                    {{ \App\Models\Order::$statuss[$statusChange->new_status] ?? $statusChange->new_status }}
                                </td>
                                <td>{{ $statusChange->notes }}</td>
                                <td>
                                    @if ($statusChange->changed_by == 0)
                                        Hệ Thống
                                    @else
                                        @if ($statusChange->user)
                                            @if ($statusChange->user->role == 'User')
                                                KH: {{ $statusChange->user->user_name }}
                                            @elseif ($statusChange->user->role == 'Admin')
                                                AD: {{ $statusChange->user->user_name }}
                                            @else
                                                {{ $statusChange->user->user_name }}
                                            @endif
                                        @else
                                            Hệ Thống
                                        @endif
                                    @endif
                                </td>

                                <td>{{ $statusChange->created_at->format('H:i d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>



        <div class="card mb-4">
            <div class="card-header">
                <h4>#4. Thay Đổi Trạng Thái Đơn Hàng</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admins.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Trạng Thái</label>
                        <select name="status" id="status" class="form-control">
                            @if ($order->status == 'pending')
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ Xác Nhận
                                </option>
                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã Xác Nhận
                                </option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Đã Hủy
                                </option>
                            @elseif ($order->status == 'confirmed')
                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã Xác Nhận
                                </option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang Giao Hàng
                                </option>
                            @elseif ($order->status == 'shipped')
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang Giao Hàng
                                </option>
                                <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Giao Hàng Thất
                                    Bại</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Giao Hàng
                                    Thành Công</option>
                            @elseif ($order->status == 'delivered')
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Giao Hàng
                                    Thành Công</option>
                            @elseif ($order->status == 'completed')
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Đã Hoàn
                                    Thành</option>
                            @elseif ($order->status == 'canceled')
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Đã Hủy
                                </option>
                            @elseif ($order->status == 'failed')
                                <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Giao Hàng Thất
                                    Bại</option>
                            @endif
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="notes">Ghi chú</label>
                        <textarea name="notes" id="notes" class="form-control"></textarea>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{ route('admins.orders.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
