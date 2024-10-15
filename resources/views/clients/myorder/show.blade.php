@extends('clients.layouts.client')

@section('content')
    {{-- <div class="container">
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
</div> --}}
    <section class="user-dashboard-section section-b-space">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-12 col-lg-12">
                    <div class="dashboard">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-order" role="tabpanel">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>Thông tin đơn hàng</h2>
                                    </div>
                                    <div class="order-summary mt-3">
                                        <h3 class="mb-3">Mã đơn hàng : <span
                                                class="text-danger">{{ $order->order_code }}</span></h3>
                                        <table class="table order-summary-table">
                                            <tbody>
                                                <tr>
                                                    <td>Tên người nhận: </td>
                                                    <td class="text-start">{{ $order->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Số điện thoại:</td>
                                                    <td class="text-start">{{ $order->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Địa chỉ nhận hàng:</td>
                                                    <td class="text-start">{{ $order->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày đặt hàng:</td>
                                                    <td class="text-start">{{ $order->created_at->format('d/m/Y') }}</td>
                                                </tr>
                                                <tr>

                                                    <td>Trạng thái đơn hàng:</td>
                                                    <td class="text-start">
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
                                                </tr>
                                                <tr>
                                                    <td>Trạng thái thanh toán:</td>
                                                    <td class="text-start">{{ $order->payment_method }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ghi chú:</td>
                                                    <td class="text-start">{{ $order->notes ?? 'Không có' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tổng tiền hàng:</td>
                                                    <td class="text-start">
                                                        @php
                                                            $totalAmount = 0; // Biến để lưu tổng tiền
                                                        @endphp
                                                        @foreach ($order->items as $item)
                                                            @php
                                                                $totalAmount += $item->price * $item->quantity; // Cộng dồn giá của từng sản phẩm
                                                            @endphp
                                                        @endforeach

                                                        {{ number_format($totalAmount, 0, ',', '.') }} VNĐ
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tiền:</th>
                                                    <th class="text-start" style="color: red;">
                                                        {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="order-contain">
                                        <h3 class="mb-3">Sản phẩm</h3>
                                        @if ($orderItems->count() > 0)
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Hình Ảnh</th>
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
                                                            <td><img src="{{ $item->image }}"
                                                                    alt="{{ $item->product_name }}" width="70"></td>
                                                            <td>{{ $item->product_name }}</td>
                                                            <td>{{ $item->variant_name }}</td>
                                                            <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                                                VNĐ</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p>Không có sản phẩm trong đơn hàng này.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if (in_array($order->status, ['pending', 'confirmed']))
                                <a href="{{ route('orders.cancel.form', $order->id) }}" class="btn-cancel btn-danger">Hủy
                                    Đơn</a>
                            @endif

                            @if ($order->status == 'canceled')
                                <form action="{{ route('orders.reorder', $order->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    {{-- <button type="submit" class="btn btn-sm btn-success"
                                        onclick="return confirm('Bạn có muốn mua lại đơn hàng này?')">Mua Lại</button> --}}
                                </form>
                            @endif
                            <a href="{{ url('/') }}" class="btn-back-home mt-3">Quay lại Trang Chủ</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

    </section>
    <style>
        .dashboard {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .order-summary {
            margin-top: 20px;
            padding: 15px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .order-summary-table td {
            padding: 10px;
            border-bottom: 1px solid #f1f1f1;
            color: #333;
        }

        .order-summary-table th {
            padding: 10px;
            color: #333;
        }

        .text-start {
            text-align: left;
            /* Định dạng căn trái */
        }

        .order-contain {
            width: 100%;
            margin: 20px 0;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .order-box {
            display: flex;
            align-items: center;
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .order-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .product-order-detail {
            display: flex;
            align-items: center;
        }

        .order-image img {
            max-width: 100px;
            border-radius: 5px;
            margin-right: 20px;
        }

        .order-wrap {
            flex-grow: 1;
            padding-left: 15px;
        }

        .order-wrap h3 {
            margin-bottom: 5px;
            font-size: 20px;
            color: #333;
            transition: color 0.3s;
        }

        .order-wrap h3:hover {
            color: #007bff;
        }

        .order-wrap p {
            font-size: 15px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-size {
            list-style: none;
            padding: 0;
        }

        .size-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            margin-top: 10px;
            /* Thêm khoảng cách giữa các mục */
        }

        .btn-cancel {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Hiệu ứng chuyển đổi màu nền */
        }

        .btn-cancel:hover {
            background-color: darkred;
            /* Đổi màu khi hover */
        }

        /* Nút quay lại trang chủ */
        .btn-back-home {
            background-color: rgb(50, 63, 65);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Hiệu ứng khi hover */
        }

        .btn-back-home:hover {
            background-color: #0056b3;
            /* Đổi màu khi hover */
        }


        /* Responsive adjustments */
        @media (max-width: 768px) {
            .order-image img {
                max-width: 80px;
            }

            .order-wrap h3 {
                font-size: 18px;
            }

            .order-wrap p {
                font-size: 14px;
            }
        }
    </style>
    <script>
        function submitCancelOrder() {
            // Lấy giá trị lý do hủy từ textarea
            var reason = document.getElementById('cancelReasonInput').value.trim();

            if (reason === "") {
                alert("Vui lòng nhập lý do hủy đơn hàng.");
                return; // Không gửi form nếu lý do trống
            }

            // Gán lý do vào input hidden
            document.getElementById('cancel_reason').value = reason;

            // Xác nhận trước khi gửi
            if (confirm('Bạn có chắc chắn muốn hủy đơn hàng không?')) {
                document.getElementById('cancelOrderForm').submit(); // Gửi form
            }
        }
    </script>
@endsection
