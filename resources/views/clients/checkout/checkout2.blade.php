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
                                                    {{-- ... --}} placeholder="Vui lòng điền...">
                                                <button class="btn-apply" type="button" id="applyVoucherBt">Tìm
                                                    {{-- .. --}}
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
                                <li class="d-flex justify-content-between align-items-center"><strong>Thành tiền: </strong>
                                    <span class="price" id="finalTotal">{{ number_format($total, 0, ',', '.') }}
                                        VND</span>
                                </li>
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

 document.getElementById('openModal').addEventListener('click', function () {
        document.getElementById('voucherModal').style.display = 'block';
        document.body.classList.add('no-scroll'); 
    });
    document.querySelector('.close').addEventListener('click', function () {
        document.getElementById('voucherModal').style.display = 'none';
        document.body.classList.remove('no-scroll'); 
    });
    window.addEventListener('click', function (event) {
        const modal = document.getElementById('voucherModal');
        if (event.target === modal) {
            modal.style.display = 'none';
            document.body.classList.remove('no-scroll'); 
        }
    });
            document.querySelector('.close-modal').onclick = function() {
                document.getElementById('voucherModal').style.display = 'none';
                document.body.classList.remove('no-scroll');
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
                                const minutesRemaining = Math.floor((timeDifference % (1000 * 60 *
                                    60)) / (1000 * 60));
                                const isExpiringSoon = timeDifference > 0 && hoursRemaining < 24;
                                const expiryText = isExpiringSoon ?
                                    `Sắp hết hạn: Còn ${hoursRemaining} giờ ${minutesRemaining} phút` :
                                    timeDifference > 0 ?
                                    `HSD: ${endDate.toLocaleDateString('vi-VN')} ` :
                                    'Voucher đã hết hạn';
                                // ${endDate.toLocaleTimeString('vi-VN')}
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

                    document.getElementById('voucherModal').style.display = 'none';
                    document.body.classList.remove('no-scroll'); 
                    updateTotal();
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
                if (voucherDiscount > 0) {
                    voucherDiscountElement.style.display = 'block';
                    voucherDiscountElement.querySelector('span').innerText =
                        `- ${voucherDiscount.toLocaleString()} VND`;
                } else {
                    voucherDiscountElement.style.display = 'none';
                }
                if (voucherDiscount >= totalAmount) {
                    pointsDiscount = 0;
                    pointsCheckbox.checked = false;
                    pointsCheckbox.disabled = true;

                    pointsDiscountSection.style.display = 'none';
                } else {
                    const remainingAmount = totalAmount - voucherDiscount;

                    if (pointsDiscount > remainingAmount) {
                        pointsDiscount = remainingAmount;

                    }

                    if (pointsDiscount > 0) {
                        pointsDiscountSection.style.display = 'block';
                        pointsDiscountElement.innerText = `- ${pointsDiscount.toLocaleString()} VND`;
                    } else {
                        pointsDiscountSection.style.display = 'none';
                    }
                }

                document.getElementById('voucherModal').style.display = 'none';
                document.body.classList.remove('no-scroll'); 
                document.getElementById('voucherDiscountInput').value = voucherDiscount;
                document.getElementById('pontsDiscountInput').value = pointsDiscount;
                updateTotal();

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
                            const voucher = data.voucher;
                            const voucherItem = document.createElement('div');
                            voucherItem.className = `voucher-item ${
                    (voucher.discount_type === 'fixed' && totalAmount < voucher.min_order_amount) || 
                    (voucher.discount_type === 'percent' && totalAmount < voucher.min_order_amount) 
                    ? 'disabled-voucher' 
                    : ''
                }`;

                            let discountInfo = '';
                            if (voucher.discount_type === 'percent') {
                                discountInfo =
                                    `Giảm ${voucher.discount_percent}% - Giảm tối đa ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.max_discount_amount)}`;
                            } else if (voucher.discount_type === 'fixed') {
                                discountInfo =
                                    `Giảm ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.discount_value)} VND`;
                            }

                            const currentDate = new Date();
                            const endDate = new Date(voucher.end_date);
                            const expiryText = endDate > currentDate ?
                                `HSD: ${endDate.toLocaleDateString('vi-VN')}` :
                                'Voucher đã hết hạn';

                            const warningMessage = totalAmount < voucher.min_order_amount ?
                                `<p class="voucher-warning" style="color: red;">Cần mua thêm ₫${(voucher.min_order_amount - totalAmount).toLocaleString()} để áp dụng mã này.</p>` :
                                '';

                            voucherItem.innerHTML = `
                    <img src="{{ asset('assets/clients/images/voucher1.png') }}" alt="Voucher Icon" class="voucher-icon">
                    <div class="voucher-info">
                      
                        <p>${discountInfo}</p>
                        <p>Đơn Tối Thiểu ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.min_order_amount)}</p>
                        <p class="expiry">${expiryText}</p>
                        ${warningMessage}
                    </div>
                    <button 
                        id="saveVoucherBtn" 
                        style="color: #f5f5f5; border-radius: 3px; background-color: #417394;" 
                        ${data.is_saved ? 'disabled' : ''}>
                        ${data.is_saved ? 'Đã lưu' : 'Lưu'}
                    </button>
                `;

                            voucherInfoContainer.appendChild(voucherItem);
                            voucherInfoContainer.style.display = 'block';

                            if (!data.is_saved) {
                                document.getElementById('saveVoucherBtn').addEventListener('click',
                                    function() {
                                        saveVoucher(voucher.code);
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

                    document.getElementById('pontsDiscountInput').value = pointsDiscount;
                } else {
                    pointsDiscount = 0;
                    pointsDiscountSection.style.display = 'none';

                    document.getElementById('pontsDiscountInput').value = 0;
                }

                updateTotal();
            });

            function updateTotal() {
                let finalTotal = totalAmount - voucherDiscount - pointsDiscount;
                if (finalTotal < 0) {
                    finalTotal = 0;
                }
                finalTotal = Math.max(finalTotal, 0);
                finalTotalElement.innerText = `${finalTotal.toLocaleString()} VND`;
                document.getElementById('finalTotalInput').value = finalTotal;
                if (pointsDiscount > 0) {
                    pointsDiscountElement.style.display = 'block';
                    pointsDiscountElement.querySelector('span').innerText =
                        `- ${pointsDiscount.toLocaleString()} VND`;
                }
            }
        });
    </script>
@endsection