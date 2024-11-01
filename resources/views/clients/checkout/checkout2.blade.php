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
                                    <a class="price" id="totalDisplay">{{ number_format($total, 0, ',', '.') }}VND</a>
                                </li>
                            </ul>
                            <div class="summery-contain">
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">Mã giảm giá:</h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Vui lòng điền...">
                                        <button class="btn-apply">Áp dụng</button>
                                    </div>
                                </div>
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">Điểm tích lũy:</h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="number" class="form-control" max="{{ $user->points }}"
                                            id="loyaltyPointsInput"name="points" placeholder="Nhập số điểm muốn sử dụng"
                                            min="0">
                                        <button class="btn-apply" id="applyPointsBtn">Áp dụng</button>
                                        <button class="btn-remove" id="removePointsBtn"
                                            style="display:none; background-color: #FF0000; padding: 0 calc(16px + 14*(100vw - 320px) / 1600);font-weight: 700; border: none;">Xóa</button>
                                    </div>
                                </div>
                                <h5 class="text-content">Điểm tích lũy của bạn: <span
                                        id="availablePoints">{{ $user->points }}</span></h5>
                            </div>
                            <ul class="summery-total">
                                <li><strong>Tổng Tiền: </strong> <span
                                        id="totalAmount">{{ number_format($total, 0, ',', '.') }} VND</span></li>
                            </ul>
                        </div>
                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" type="submit">Đặt
                            hàng</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loyaltyPointsInput = document.getElementById("loyaltyPointsInput");
            const applyPointsBtn = document.getElementById("applyPointsBtn");
            const removePointsBtn = document.getElementById("removePointsBtn");
            const totalAmountElement = document.querySelector(".summery-total span");
            const availablePoints = {{ $user->points }};
            const originalTotal = {{ $total }};
            let appliedPoints = 0;

            function updateTotal() {
                const discountAmount = appliedPoints;
                const newTotal = originalTotal - discountAmount;
                totalAmountElement.textContent = newTotal < 0 ? 0 : newTotal.toLocaleString() + ' ₫';
            }

            applyPointsBtn.addEventListener("click", function(event) {
                event.preventDefault();

                if (loyaltyPointsInput.value.trim() === "") {
                    appliedPoints = availablePoints;
                    loyaltyPointsInput.value = appliedPoints;
                } else {
                    let enteredPoints = parseInt(loyaltyPointsInput.value.trim());
                    if (enteredPoints > availablePoints) {
                        alert("Số điểm nhập vào vượt quá số điểm tích lũy!");
                        loyaltyPointsInput.value = availablePoints;
                        appliedPoints = availablePoints;
                    } else {
                        appliedPoints = enteredPoints;
                    }
                }

                updateTotal();

                removePointsBtn.style.display = "inline-block";
                applyPointsBtn.style.display = "none";
            });

            removePointsBtn.addEventListener("click", function(event) {
                event.preventDefault();
                appliedPoints = 0;
                loyaltyPointsInput.value = "";
                updateTotal();
                removePointsBtn.style.display = "none";
                applyPointsBtn.style.display = "inline-block";
            });

            loyaltyPointsInput.addEventListener("input", function() {
                const enteredPoints = loyaltyPointsInput.value.trim();
                const pointsValue = parseInt(enteredPoints);

                if (enteredPoints === "") {
                    appliedPoints = 0;
                    updateTotal();
                    removePointsBtn.style.display = "none";
                    applyPointsBtn.style.display = "inline-block";
                } else if (isNaN(pointsValue)) {
                    // do nothing
                } else if (pointsValue <= availablePoints) {
                    appliedPoints = pointsValue;
                    updateTotal();
                    applyPointsBtn.style.display = "none";
                    removePointsBtn.style.display = "inline-block";
                } else {
                    alert("Số điểm nhập vào vượt quá số điểm tích lũy!");
                    loyaltyPointsInput.value = availablePoints;
                    appliedPoints = availablePoints;
                    updateTotal();
                }
            });

            loyaltyPointsInput.addEventListener("blur", function() {
                const enteredPoints = loyaltyPointsInput.value.trim();
                const pointsValue = parseInt(enteredPoints);

                if (enteredPoints !== "" && isNaN(pointsValue)) {
                    alert("Vui lòng nhập một số hợp lệ!");
                    loyaltyPointsInput.value = "";
                    appliedPoints = 0;
                    updateTotal();
                }
            });
        });
    </script>
@endsection
