@extends('clients.layouts.client')

@section('content')
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>

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
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" value="{{ old('name', $user->user_name ?? '') }}"
                                                            required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="phone">Số Điện Thoại</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            name="phone" value="{{ $user->user_phone_number ?? '' }}"
                                                            required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">Địa Chỉ</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address"
                                                            value="{{ old('name', $user->user_address ?? '') }}" required>
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
                                                                <label class="form-check-label" for="payment_cod">
                                                                    Thanh toán khi nhận hàng (COD)
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_method" id="payment_online" value="online"
                                                                    @if ($total < 5000) disabled @endif>
                                                                <label class="form-check-label" for="payment_online"
                                                                    style="color: {{ $total < 5000 ?: 'inherit' }}">
                                                                    Thanh toán trực tuyến </label>
                                                                @if ($total < 5000)
                                                                    <span
                                                                        style="font-size: 14px; display: block; color: red;">
                                                                        Thành tiền phải lớn hơn 5.000 VNĐ để sử dụng thanh
                                                                        toán trực tuyến.
                                                                    </span>
                                                                @endif

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
                                    @php
                                    $totalAmount = 0;
                                @endphp
                                
                                
                                    @foreach ($cart as $item)
                                        @php
                                            $totalAmount += $item['price'] * $item['quantity'];
                                        @endphp
                                
                                        <li>
                                            <img src="{{ $item['image'] }}" class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                
                                            <h6>{{ $item['product_name'] }} 
                                                <span> <strong> X {{ $item['quantity'] }}</strong></span>
                                         
                                
                                            <a class="price">
                                                {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ
                                            </a>   </h6>
                                        </li>
                                    @endforeach
                        
                                
                                </ul>
                                <ul class="summery-total">
                                    <li class="d-flex justify-content-between align-items-center">
                                        <strong>Tổng Tiền Hàng:</strong> 
                                        <span id="totalAmount" class="fw-bold">
                                            {{ number_format($totalAmount, 0, ',', '.') }} VND
                                        </span>
                                    </li>
                                    @if ($voucherDiscount > 0)
                                        <div id="voucherDiscount">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center my-2">
                                                    <strong>Mã Giảm Giá:</strong> <span>-
                                                        {{ number_format($voucherDiscount, 0, ',', '.') }} VND</span>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif

                                    @if ($pointsDiscount > 0)
                                        <div id="pointsDiscountSection">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <strong>Điểm tích lũy:</strong> <span id="pointsDiscount">-
                                                        {{ number_format($pointsDiscount, 0, ',', '.') }} VND</span>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                    <li class="d-flex justify-content-between align-items-center"><strong>Thành tiền:
                                        </strong>
                                        <span class="text-danger" id="finalTotal">{{ number_format($total, 0, ',', '.') }}
                                            VND</span>
                                    </li>
                                </ul>
                            </div>

                            <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" type="submit">Đặt
                                hàng</button>
                        </div>
                    </div>
                    </form>
                    <script>
                        let checkbox = document.getElementById('applied_loyalty_points');

                        checkbox.addEventListener('change', function() {

                            let appliedLoyaltyPoints = this.checked ? Math.min(availablePoints, initialTotal) : 0;
                            fetch('/checkout/apply-loyalty-points', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    },
                                    body: JSON.stringify({
                                        applied_loyalty_points: appliedLoyaltyPoints
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {

                                        document.getElementById('total_display').textContent = data.new_total;
                                    } else {
                                        console.error('Failed to apply loyalty points');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        });
                    </script>
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
                                            <svg class="checkmark__check" height="36" viewBox="0 0 48 36"
                                                width="48" xmlns="http://www.w3.org/2000/svg">
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

@endsection
