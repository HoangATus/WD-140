@extends('clients.layouts.client')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Thanh Toán Lại</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Thanh Toán</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Thông Tin Giao Hàng <p>Mã đơn hàng:{{$order->order_code}}</p></h4>
                                        </div>
                                        <div class="shipping-info">
                                            <form action="{{ route('orders.processRetryPayment', $order->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Tên Người Nhận</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $order->name }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Số Điện Thoại</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $order->phone }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Địa Chỉ</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{ $order->address }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="notes">Ghi Chú</label>
                                                    <textarea class="form-control" id="notes" name="notes" rows="3">{{ $order->notes }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Phương Thức Thanh Toán</label>
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" id="payment_cod" value="cod"
                                                                required>
                                                            <label class="form-check-label" for="payment_cod">Thanh toán khi
                                                                nhận hàng (COD)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" id="payment_online" value="online">
                                                            <label class="form-check-label" for="payment_online">Thanh toán
                                                                trực tuyến</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <h4>Thông Tin Đơn Hàng</h4>
                            <ul class="summery-contain">
                                @foreach ($order->orderItems as $item)
                                    <li>
                                       <img src="{{ $item->image }}"class="img-fluid blur-up lazyloaded checkout-image"
                                        alt="{{ $item->product_name }}">
                                        <h6>{{ $item->product_name }} <span><strong>X {{ $item->quantity }}</strong></span>
                                        <a class="price">{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VND</a></h6>
                                    </li>
                               
                            </ul>
                            <br>
                            <ul>
                                <li class="d-flex justify-content-between align-items-center"><strong>Tổng Tiền Hàng:
                                    </strong> <span id="totalAmount" class="fw-bold" >{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        VND</span>
                                </li>
                            </ul>
                             @endforeach
                            @if ($order->voucher_discount > 0)
                            <div id="voucherDiscount" >
                                <ul>
                                    <li class="d-flex justify-content-between align-items-center my-2">
                                        <strong>Mã Giảm Giá:</strong> <span>- {{ number_format($order->voucher_discount, 0, ',', '.') }} VND</span>
                                    </li>
                                </ul>
                            </div>
                            @endif

                            @if ($order->points_discount > 0)
                            <div id="pointsDiscountSection">
                                <ul>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <strong>Điểm tích lũy:</strong> <span id="pointsDiscount">- {{ number_format($order->points_discount, 0, ',', '.') }} VND</span>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            <ul class="summery-total ">
                                <li class="d-flex justify-content-between align-items-center"><strong>Thành tiền: </strong>
                                    <span class="text-danger fw-bold" id="finalTotal">{{ number_format($order->total, 0, ',', '.') }}
                                        VND</span>
                                </li>
                            </ul>
                            <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" type="submit">Thanh Toán</button>
                        </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->
@endsection
