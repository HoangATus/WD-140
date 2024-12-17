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
                                                                    name="payment_method" id="payment_online"
                                                                    value="online">
                                                                <label class="form-check-label" for="payment_online">
                                                                    Thanh toán trực tuyến
                                                                </label>
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
                                    @foreach ($cart as $item)
                                        <li>
                                            <img src="{{ $item['image'] }}"
                                                class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                            <h6>{{ $item['product_name'] }} <span> <strong> X
                                                        {{ $item['quantity'] }}</strong></span></h6&nbsp>
                                                <a
                                                    class="price">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}VNĐ</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="summery-contain">

                                    <div class="d-flex justify-content-between align-items-center my-2">
                                        <h5>
                                            <i class="fa-solid fa-ticket"></i> Mã giảm giá ATUS
                                        </h5>
                                        <a href="#" id="openModal">Chọn hoặc nhập mã</a>
                                    </div>

                                    <div id="voucherModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <h2 class="mb-4">Chọn ATUS Voucher</h2>

                                            <div class="coupon-cart d-flex justify-content-between align-items-center">
                                                <p class="m">Mã Voucher</p>

                                                <div class="mb-3 coupon-box input-group ms-2">
                                                    <input type="text" class="form-control" id="voucherCod"
                                                        placeholder="Vui lòng điền...">
                                                    <button class="btn-apply" type="button" id="applyVoucherBt">Tìm

                                                        Kiếm</button>
                                                </div>
                                            </div>
                                            <div id="voucherInfoContaine" style="display: none;">
                                                <h4 id="voucherNam"></h4>
                                                <p id="voucherDiscoun"></p>


                                            </div>

                                            <div class="voucher-list">
                                                <h3>Chọn 1 Voucher</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="close-modal btn "
                                                    style="background-color: deepskyblue; color:rgb(255, 255, 255);">TRỞ
                                                    LẠI</a>
                                                <a id="applyVoucherBtn" class=" btn"
                                                    style="background-color: rgb(27, 100, 125) ; color:rgb(255, 255, 255);">
                                                    Áp dụng</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-content">
                                            Sử dụng toàn bộ điểm tích lũy
                                        </h5>
                                    </div>
                                    <div class="form-check form-switch form-switch-primary">
                                        <input class="form-check-input" type="checkbox" name="points" id="points"
                                            value="{{ $user->points }}" style="padding: 12px 25px;"
                                            @if ($user->points == 0) disabled @endif>
                                    </div>
                                    <input type="hidden" id="pointsInput" name="points" value="0">
                                </div>
                                <h7 class="text-content">Điểm tích lũy của bạn: <span
                                        id="availablePoints">{{ $user->points }}
                                        điểm</span></h7>
                                <hr>
                                <ul>
                                    <li class="d-flex justify-content-between align-items-center"><strong>Tổng Tiền Hàng:
                                        </strong> <span id="totalAmount" class=""
                                            data-total="{{ $total }}">{{ number_format($total, 0, ',', '.') }}
                                            VND</span>
                                    </li>
                                </ul>

                                <div id="voucherDiscount" style="display: none;">
                                    <ul>
                                        <li class="d-flex justify-content-between align-items-center my-2">
                                            <strong>Mã Giảm Giá:</strong> <span>- 0 VND</span>
                                        </li>
                                    </ul>
                                </div>

                                <div id="pointsDiscountSection" style="display: none;">
                                    <ul>
                                        <li class="d-flex justify-content-between align-items-center">
                                            <strong>Điểm tích lũy:</strong> <span id="pointsDiscount">- 0 VND</span>
                                        </li>
                                    </ul>
                                </div>
                                <input type="hidden" id="voucherDiscountInput" name="voucherDiscount" value="0">
                                <input type="hidden" id="pontsDiscountInput" name="pointsDiscount" value="0">
                                <input type="hidden" id="selectedVoucher" name="selectedVoucher">

                                <ul class="summery-total ">
                                    <li class="d-flex justify-content-between align-items-center"><strong>Thành tiền:
                                        </strong>
                                        <span class="price" id="finalTotal">{{ number_format($total, 0, ',', '.') }}
                                            VND</span>
                                    </li>
                                </ul>
                                <input type="hidden" name="initial_total" value="{{ $total }}">
                                <input type="hidden" id="finalTotalInput" name="final_total"
                                    value="{{ $total }}">
                                <style>
                                    .no-scroll {
                                        overflow: hidden;
                                        height: 100vh;
                                    }

                                    .disabled-voucher {
                                        opacity: 0.5;

                                    }

                                    .voucher-warning {
                                        color: red;
                                        font-size: 14px;
                                        margin-top: 5px;
                                    }

                                    .hi {
                                        position: absolute
                                    }

                                    .price {
                                        color: red;
                                    }
                                </style>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('openModal').onclick = function() {
                document.getElementById('voucherModal').style.display = 'block';
                document.body.classList.add('no-scroll');
            };


            document.querySelector('.close-modal').onclick = function() {
                document.getElementById('voucherModal').style.display = 'none';
                document.body.classList.remove('no-scroll');
            };


            window.onclick = function(event) {
                if (event.target === document.getElementById('voucherModal')) {
                    document.getElementById('voucherModal').style.display = 'none';
                    document.body.classList.remove('no-scroll');
                }
            };
            let totalAmount = parseFloat("{{ $total }}");
            let voucherDiscount = 0;
            let pointsDiscount = 0;
            if (availablePoints === 0) {
                pointsCheckbox.disabled = true;
            }
            const totalAmountElement = document.getElementById("totalAmount");
            const finalTotalElement = document.getElementById("finalTotal");
            const voucherDiscountElement = document.getElementById("voucherDiscount");
            const pointsDiscountSection = document.getElementById("pointsDiscountSection");
            const pointsDiscountElement = document.getElementById("pointsDiscount");
            const pointsCheckbox = document.getElementById("points");

            totalAmountElement.innerText = `${totalAmount.toLocaleString()} VND`;
            finalTotalElement.innerText = `${totalAmount.toLocaleString()} VND`;

            document.getElementById('openModal').onclick = function() {
                document.getElementById('voucherModal').style.display = 'block';
            };

            function loadUserVouchers() {
                fetch('/user-vouchers', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const voucherListContainer = document.querySelector('.voucher-list');
                        voucherListContainer.innerHTML = '';

                        if (data.vouchers.length > 0) {

                            data.vouchers.sort((a, b) => {
                                const isAUsable = (a.discount_type === 'fixed' && totalAmount >= a
                                        .min_order_amount) ||
                                    (a.discount_type === 'percent' && totalAmount >= a
                                        .min_order_amount);
                                const isBUsable = (b.discount_type === 'fixed' && totalAmount >= b
                                        .min_order_amount) ||
                                    (b.discount_type === 'percent' && totalAmount >= b
                                        .min_order_amount);


                                if (isAUsable && isBUsable) {
                                    if (a.discount_type === 'percent' && b.discount_type ===
                                        'percent') {
                                        return b.max_discount_amount - a.max_discount_amount;
                                    }
                                    if (a.discount_type === 'fixed' && b.discount_type === 'fixed') {
                                        return b.discount_value - a.discount_value;
                                    }

                                    return b.discount_type === 'percent' ? 1 : -1;
                                }


                                if (isAUsable && !isBUsable) return -1;
                                if (!isAUsable && isBUsable) return 1;

                                return 0;
                            });

                            data.vouchers.forEach(voucher => {

                                const usedPercent = (voucher.used_quantity / voucher.total_quantity) *
                                    100;
                                let usedPercentText = '';
                                if (usedPercent >= 50) {
                                    usedPercentText = `Đã dùng: ${Math.round(usedPercent)}%`;
                                }

                                const currentDate = new Date();
                                const endDate = new Date(voucher.end_date);
                                const timeDifference = endDate - currentDate;
                                const hoursRemaining = Math.floor(timeDifference / (1000 * 60 * 60));
                                const isExpiringSoon = hoursRemaining <= 24;


                                const expiryText = isExpiringSoon ?
                                    `Sắp hết hạn: Còn ${hoursRemaining} giờ` :
                                    `HSD: ${endDate.toLocaleDateString('vi-VN')}`;

                                let discountInfo = '';
                                if (voucher.discount_type === 'percent') {
                                    discountInfo =
                                        `Giảm ${voucher.discount_percent}% - Giảm tối đa ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.max_discount_amount)}`;
                                } else if (voucher.discount_type === 'fixed') {
                                    discountInfo =
                                        `Giảm ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.discount_value)} VND`;
                                }


                                let warningMessage = '';
                                const isDisabled = (voucher.discount_type === 'fixed' && totalAmount <
                                        voucher.min_order_amount) ||
                                    (voucher.discount_type === 'percent' && totalAmount < voucher
                                        .min_order_amount);

                                if (isDisabled) {
                                    const amountToSpend = voucher.min_order_amount - totalAmount;
                                    warningMessage =
                                        `<p class="voucher-warning" style="color: red;">Cần mua thêm ₫${amountToSpend.toLocaleString()} để áp dụng mã này.</p>`;
                                }

                                const voucherItem = document.createElement('div');
                                voucherItem.className =
                                    `voucher-item ${isDisabled ? 'disabled-voucher' : ''}`;
                                const formattedAmount = new Intl.NumberFormat('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                }).format(voucher.min_order_amount);

                                voucherItem.innerHTML = `
                <img src="{{ asset('assets/clients/images/voucher1.png') }}" alt="Voucher Icon" class="voucher-icon">
                <div class="voucher-info">
                    <h4><a href="/voucher-details/${voucher.id}" class="voucher-link">${voucher.code}</a></h4>
                    <p>${discountInfo}</p>
                    <p>Đơn Tối Thiểu ${formattedAmount}</p>
                    <p class="expiry">
                        <p class="used-percent">${usedPercentText}</p>
                        ${expiryText}
                        <a href="/voucher-details/${voucher.id}" class="voucher-conditions">Điều kiện</a>
                    </p>  
                    <p class="hi">${warningMessage}</p>
                </div>
               
                <input type="checkbox" class="voucher-select" name="selectedVoucher" id="voucher${voucher.id}"
                    data-discount-type="${voucher.discount_type}"
                    data-discount="${voucher.discount_value}"
                    data-discount_percent="${voucher.discount_percent}"
                    data-max-discount="${voucher.max_discount_amount}"
                    data-min_order_amount="${voucher.min_order_amount}"
                    ${isDisabled ? 'disabled' : ''}>
                <label for="voucher${voucher.id}"></label>
            `;

                                voucherListContainer.appendChild(voucherItem);
                            });

                            document.querySelectorAll('input[name="selectedVoucher"]').forEach(function(
                                checkbox) {
                                checkbox.addEventListener('change', function() {
                                    document.querySelectorAll('input[name="selectedVoucher"]')
                                        .forEach(function(otherCheckbox) {
                                            if (otherCheckbox !== checkbox) {
                                                otherCheckbox.checked = false;
                                            }
                                        });
                                });
                            });
                        } else {
                            voucherListContainer.innerHTML = '<p>Không có voucher nào khả dụng.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi khi tải danh sách voucher:', error);
                    });
            }


            loadUserVouchers();

            document.getElementById('applyVoucherBtn').onclick = function() {
                const selectedVoucher = document.querySelector('input[name="selectedVoucher"]:checked');

                if (!selectedVoucher) {
                    voucherDiscount = 0;
                    voucherDiscountElement.style.display = 'none';
                    updateTotal();
                    document.getElementById('voucherModal').style.display = 'none';
                    return;
                }

                const voucherId = selectedVoucher.id.replace('voucher', '');
                document.getElementById("selectedVoucher").value = voucherId;
                const discountType = selectedVoucher.getAttribute('data-discount-type');
                const discountValue = parseFloat(selectedVoucher.getAttribute('data-discount'));
                const discountPercent = parseFloat(selectedVoucher.getAttribute('data-discount_percent')) / 100;
                const maxDiscountAmount = parseFloat(selectedVoucher.getAttribute('data-max-discount'));
                const minOrderAmount = parseFloat(selectedVoucher.getAttribute('data-min_order_amount'));

                if (discountType === 'percent') {
                    voucherDiscount = totalAmount * discountPercent;
                    if (voucherDiscount > maxDiscountAmount) {
                        voucherDiscount = maxDiscountAmount;
                    }
                } else if (discountType === 'fixed') {
                    voucherDiscount = discountValue;

                    if (voucherDiscount > totalAmount) {
                        voucherDiscount = totalAmount;
                    }
                }

                voucherDiscountElement.style.display = 'block';
                voucherDiscountElement.querySelector('span').innerText =
                    `- ${voucherDiscount.toLocaleString()} VND`;

                updateTotal();
                document.getElementById('voucherModal').style.display = 'none';
            };

            document.getElementById('applyVoucherBt').addEventListener('click', function() {
                const voucherCode = document.getElementById('voucherCod').value.trim();

                if (!voucherCode) {
                    alert('Vui lòng nhập mã voucher để tìm kiếm.');
                    return;
                }

                fetch(`/check-voucher/${voucherCode}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const voucherInfoContainer = document.getElementById('voucherInfoContaine');
                        voucherInfoContainer.innerHTML = '';

                        if (data.success) {
                            const voucherItem = document.createElement('div');
                            voucherItem.className = 'voucher-item';
                            voucherItem.innerHTML = `
            <img src="{{ asset('assets/clients/images/voucher1.png') }}" alt="Voucher Icon" class="voucher-icon">
            <div class="voucher-info">
                <h4>${data.voucher.code}</h4>
                <p>Giảm ${data.voucher.discount}% - Giảm tối đa ${data.voucher.max_discount_amount} VND</p>
                <p>Đơn Tối Thiểu ${data.voucher.min_order_amount} VND</p>
                <p class="expiry">HSD: ${new Date(data.voucher.end_date).toLocaleDateString('vi-VN')}</p>
            </div>
            <button style="color: #f5f5f5; border-radius: 3px; background-color: #417394;" 
                    id="saveVoucherBtn" 
                    ${data.is_saved ? 'disabled' : ''}>
                ${data.is_saved ? 'Đã lưu' : 'Lưu'}
            </button>
        `;

                            voucherInfoContainer.appendChild(voucherItem);
                            voucherInfoContainer.style.display = 'block';

                            if (!data.is_saved) {
                                document.getElementById('saveVoucherBtn').addEventListener('click',
                                    function() {
                                        saveVoucher(data.voucher.code);
                                    }, {
                                        once: true
                                    });
                            }
                        } else {
                            alert(data.message);
                            voucherInfoContainer.style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi khi tìm kiếm voucher:', error);
                        alert('Đã xảy ra lỗi trong quá trình tìm kiếm voucher. Vui lòng thử lại sau.');
                    });
            });


            window.onclick = function(event) {
                if (event.target === voucherModal) {
                    voucherModal.style.display = 'none';
                }
            };
            document.querySelector('.close').onclick = function() {
                document.getElementById('voucherModal').style.display = 'none';
            };

            function saveVoucher(voucherCode) {
                fetch(`/save-voucher`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            code: voucherCode
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Voucher đã được lưu vào danh sách của bạn!');
                            const saveBtn = document.getElementById('saveVoucherBtn');
                            saveBtn.innerText = 'Đã lưu';
                            saveBtn.disabled = true;
                            loadUserVouchers();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi khi lưu voucher:', error);
                    });
            }

            pointsCheckbox.addEventListener('change', function() {
                if (pointsCheckbox.checked) {
                    let availablePoints = parseFloat("{{ $user->points }}");
                    let maxPointsValue = totalAmount - voucherDiscount;
                    pointsDiscount = Math.min(availablePoints, maxPointsValue);

                    pointsDiscountSection.style.display = 'block';
                    pointsDiscountElement.innerText = `- ${pointsDiscount.toLocaleString()} VND`;

                    document.getElementById('pointsInput').value = pointsDiscount;
                } else {
                    pointsDiscount = 0;
                    pointsDiscountSection.style.display = 'none';

                    document.getElementById('pointsInput').value = 0;
                }

                updateTotal();
            });

            function updateTotal() {
                let finalTotal = totalAmount - voucherDiscount - pointsDiscount;
                finalTotal = Math.max(finalTotal, 0);

                finalTotalElement.innerText = `${finalTotal.toLocaleString()} VND`;
                document.getElementById('finalTotalInput').value = finalTotal;
            }
        });
    </script>
@endsection
