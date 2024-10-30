@extends('clients.layouts.client')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Thanh Toán</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Checkout</li>
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
                                            <h4>Thông Tin Giao Hàng</h4>
                                        </div>
                                        <div class="shipping-info">
                                            <form action="{{ route('checkout2.process2') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="variant_id" value="{{ $variant->id }}">
                                                <input type="hidden" name="quantity" value="{{ $quantity }}">

                                                <div class="form-group">
                                                    <label for="name">Tên Người Nhận</label>
                                                    <input type="text" name="name"value="{{ $user->user_name ?? '' }}" class="form-control" id="name"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Số Điện Thoại</label>
                                                    <input type="text"value="{{ $user->user_phone_number ?? '' }}" class="form-control" id="phone" name="phone"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Địa Chỉ</label>
                                                    <input type="text" class="form-control"value="{{ $user->user_address ?? '' }}" id="address" name="address"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notes">Ghi Chú</label>
                                                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
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
                            <ul class="summery-contain">
                                <li>
                                    <img src="{{ Storage::url($variant->image) }}"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h6>{{ $variant->product->product_name }} <span><strong>X
                                                {{ $quantity }}</strong></span></h6>
                                    <a class="price">{{ number_format($total, 0, ',', '.') }}₫</a>
                                </li>
                            </ul>
                            <ul class="summery-total">
                                <li><strong>Tổng Tiền: </strong> <span>{{ number_format($total, 0, ',', '.') }} ₫</span>
                                </li>
                            </ul>
                        </div>
                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold"
                                type="submit">Đặt hàng</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->
@endsection  
