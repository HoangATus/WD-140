@extends('clients.layouts.client')

@section('content')
    <!-- mobile fix menu start -->

    <!-- mobile fix menu end -->

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
                                    <a href="index.html">
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
        @if (count($cart) > 0)
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

                                                <form action="{{ route('checkout.process') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Tên Người Nhận</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="phone">Số Điện Thoại</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            name="phone" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">Địa Chỉ</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="notes">Ghi Chú</label>
                                                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
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
                                    @foreach ($cart as $item)
                                        <li>
                                            <img src="{{ $item['image'] }}"
                                                class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                            <h6>{{ $item['product_name'] }} <span> <strong> X
                                                        {{ $item['quantity'] }}</strong></span></h6>
                                            <a
                                                class="price">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}₫</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <ul class="summery-total">
                                    <li><strong>Tổng Tiền: </strong> <span>{{ number_format($total, 0, ',', '.') }} ₫</span>
                                    </li>
                                </ul>
                            </div>

                            <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" type="submit">Đặt
                                hàng</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        @else
            <section class="breadcrumb-section pt-0">
                <div class="container-fluid-lg">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-contain breadcrumb-order">
                                <div class="order-box">
                                    <div class="order-image">
                                        <div class="checkmark">
                                            <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                                </path>
                                            </svg>
                                            <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                                </path>
                                            </svg>
                                            <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                                </path>
                                            </svg>
                                            <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                                </path>
                                            </svg>
                                            <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                                </path>
                                            </svg>
                                            <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                                </path>
                                            </svg>
                                            <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                                                </path>
                                            </svg>
                                            <svg class="checkmark__background" height="115" viewBox="0 0 120 115"
                                                width="120" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="order-contain">
                                        <h3 class="theme-color">Đặt hàng thành công</h3>
                                        {{-- <h5 class="text-content">Thanh toán thành công và đơn hàng của bạn đang trên đường</h5> --}}
                                        {{-- <h6>Mã giao dịch: 1708031724431131</h6> --}}


                                    </div>


                                </div>

                                <div class="d-flex flex-column align-items-center mt-3">

                                    <a href="{{ route('home') }}" class="btn btn-success" style="width: 200px;">Tiếp tục
                                        mua hàng</a>

                                    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-2"
                                        style="width: 200px;">Đơn hàng của tôi</a>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </section>
    <!-- Checkout section End -->

@endsection
