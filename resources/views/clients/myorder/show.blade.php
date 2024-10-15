@extends('clients.layouts.client')

@section('content')
    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <div class="container-fluid-lg">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-10">
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-order" role="tabpanel">
                                <div class="dashboard-order">
                                    <div class="title text-center mb-5">
                                        <h2 class="fw-bold" style="font-size: 28px;">Thông tin đơn hàng</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use
                                                    xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-contain">
                                        <div class="text-end">
                                            <h5 class="fw-bold" style="font-size: 20px;">Mã đơn hàng:
                                                <span class="text-danger">{{ $order->order_code }}</span>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="order-summary mt-4">
                                        <table class="table order-summary-table table-bordered table-striped">
                                            <tr>
                                                <td class="fw-bold">Tên người nhận :</td>
                                                <td class="text-end">{{ $order->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Số điện thoại :</td>
                                                <td class="text-end">{{ $order->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Địa chỉ nhận hàng :</td>
                                                <td class="text-end">{{ $order->address }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Ngày đặt hàng :</td>
                                                <td class="text-end">{{ $order->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Ghi chú nhận hàng :</td>
                                                <td class="text-end">{{ $order->notes ?? 'Không có' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Trạng thái đơn hàng :</td>
                                                <td class="text-end">
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
                                                <td class="fw-bold">Trạng thái thanh toán :</td>
                                                <td class="text-end">{{ $order->payment_method }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Tổng tiền hàng :</td>
                                                <td class="text-end">
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
                                            {{-- <tr>
                                                <td class="fw-bold">Giảm giá</td>
                                                <td class="text-end">-100.000 VND</td>
                                            </tr> --}}
                                            <tr>
                                                <th class="fw-bold" style="font-size: 18px;">Thành tiền :</th>
                                                <th class="text-end" style="color: red;">
                                                    {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="order-box dashboard-bg-box mt-4 p-4 border rounded">
                                        <h3 class="fw-bold mb-4"
                                            style="font-size: 24px; text-transform: uppercase; color: #333;">Sản phẩm
                                        </h3>
                                        @if ($orderItems->count() > 0)
                                            @foreach ($orderItems as $item)
                                                <div class="row mb-4 pb-3 border-bottom align-items-center">
                                                    <!-- Đảm bảo các phần tử được căn giữa theo chiều dọc -->
                                                    <div class="col-md-3"> <!-- Kích thước ảnh chiếm 3 cột -->
                                                        <a href="product-left-thumbnail.html" class="order-image">
                                                            <img src="{{ $item->image }}" class="img-fluid rounded"
                                                                alt="" style="max-width: 50%;">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-9"> <!-- Văn bản chiếm 9 cột còn lại -->
                                                        <div class="order-wrap">
                                                            <a href="product-left-thumbnail.html">
                                                                <h4 class="fw-bold"
                                                                    style="font-size: 20px; color: #025e75;">
                                                                    {{ $item->product_name }}</h4>
                                                            </a>


                                                            <ul class="product-size list-unstyled mb-0">
                                                                <li class="d-flex mb-2">
                                                                    <h6 class="me-2" style="font-size: 16px;">Giá:
                                                                    </h6>
                                                                    <span style="color: red; font-size: 15px;">
                                                                        {{ number_format($item->price, 0, ',', '.') }}
                                                                        VND
                                                                    </span>
                                                                </li>
                                                                <li class="d-flex mb-2">
                                                                    <h6 class="me-2" style="font-size: 16px;">Phiên
                                                                        bản:</h6>
                                                                    <span
                                                                        style="font-size: 15px;">{{ $item->variant_name }}</span>
                                                                </li>
                                                                <li class="d-flex">
                                                                    <h6 class="me-2" style="font-size: 16px;">Số
                                                                        lượng:</h6>
                                                                    <span
                                                                        style="font-size: 15px;">{{ $item->quantity }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-center text-muted" style="font-size: 16px;">Không có sản phẩm
                                                trong đơn hàng này.</p>
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center mt-4">
                                        @if (in_array($order->status, ['pending', 'confirmed']))
                                            <a href="{{ route('orders.cancel.form', $order->id) }}"
                                                class="btn btn-danger me-3"
                                                style="font-size: 14px; padding: 8px 16px; border-radius: 8px;">Hủy
                                                Đơn Hàng</a>
                                        @endif

                                        @if ($order->status == 'canceled')
                                            <form action="{{ route('orders.reorder', $order->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                {{-- <button type="submit" class="btn btn-sm btn-success"
                                                    onclick="return confirm('Bạn có muốn mua lại đơn hàng này?')">Mua Lại</button> --}}
                                            </form>
                                        @endif
                                        <a href="{{ url('/') }}" class="btn btn-secondary"
                                            style="font-size: 14px; padding: 8px 16px; border-radius: 8px; text-decoration: none;">
                                            Quay lại Trang Chủ
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .order-summary-table td,
        .order-summary-table th {
            padding: 12px;
            font-size: 16px;
        }

        .order-summary-table {
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .dashboard-right-sidebar {
            padding: 20px;
        }
    </style>
@endsection
