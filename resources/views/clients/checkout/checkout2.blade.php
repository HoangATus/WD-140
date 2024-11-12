@extends('clients.layouts.client')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Thanh Toán</h2>
                        @if (session('errors'))
                            <div class="alert alert-danger">
                                {{ session('errors') }}
                            </div>
                        @endif
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
                                                    <input type="text" name="name"
                                                        value="{{ $user->user_name ?? '' }}" class="form-control"
                                                        id="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Số Điện Thoại</label>
                                                    <input type="text" value="{{ $user->user_phone_number ?? '' }}"
                                                        class="form-control" id="phone" name="phone" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Địa Chỉ</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->user_address ?? '' }}" id="address"
                                                        name="address" required>
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
                                    <a class="" id="totalDisplay">{{ number_format($total, 0, ',', '.') }}VND</a>
                                </li>
                            </ul>
                            <div class="summery-contain">
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">Mã giảm giá:</h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Vui lòng điền...">
                                        <button class="btn-apply">Áp dụng</button>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-content">
                                            Sử dụng toàn bộ điểm tích lũy
                                        </h5>
                                    </div>
                                    <div class="form-check form-switch form-switch-primary">
                                        <input class="form-check-input" type="checkbox" name="points"
                                            id="points" value="{{ $user->points }}" style="padding: 12px 25px;">
                                    </div>
                                </div>
                                <input type="hidden" id="pointsInput" name="points" value="0">
                            </div>
                            <h7 class="text-content">Điểm tích lũy của bạn: <span
                                    id="availablePoints">{{ $user->points }}
                                    điểm</span></h7>
                            <hr>
                            <ul>
                                <li class="d-flex justify-content-between align-items-center"><strong>Tổng Tiền Hàng:
                                    </strong> <span id="totalAmount"
                                        class="">{{ number_format($total, 0, ',', '.') }} VND</span>
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
                            <input type="hidden" id="selectedVoucher" name="selectedVoucher">

                            <ul class="summery-total ">
                                <li class="d-flex justify-content-between align-items-center"><strong>Thành tiền: </strong>
                                    <span class="price" id="totalAmount">{{ number_format($total, 0, ',', '.') }}
                                        VND</span></li>
                            </ul>
                            <input type="hidden" name="initial_total" value="{{ $total }}">
                            <input type="hidden" id="finalTotalInput" name="final_total" value="{{ $total }}">
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
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const applyPointsCheckbox = document.getElementById("points");
            const totalAmountElement = document.querySelector(".summery-total span");
            const loyaltyPointsAmountElement = document.getElementById("loyaltyPointsAmount");
            const availablePoints = {{ $user->points }};
            const originalTotal = {{ $total }};
            let appliedPoints = 0;

            function updateTotal() {
                const discountAmount = appliedPoints; 
                const newTotal = originalTotal - discountAmount;
                totalAmountElement.textContent = newTotal < 0 ? 0 : newTotal.toLocaleString() + ' VND';
                loyaltyPointsAmountElement.textContent = discountAmount > 0 ? '- ' + discountAmount.toLocaleString() + ' VND' : '0 VND'; 
            }

            applyPointsCheckbox.addEventListener("change", function() {
                appliedPoints = this.checked ? availablePoints : 0; 
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
