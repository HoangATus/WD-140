@extends('clients.layouts.client')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ Hàng</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section">
        <div class="container">
            <h2>Giỏ Hàng</h2>

            @if (count($cart) > 0)
                <table class="table mt-5">
                    <thead>
                        <tr>
                            {{-- <th scope="col"></th> <!-- Cột checkbox --> --}}
                            <th scope="col">Ảnh Sản Phẩm</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Biến Thể</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $variant_id => $item)
                            <tr data-variant-id="{{ $variant_id }}">
                                {{-- <td>
                                    <input type="checkbox" class="product-checkbox" name="selected_products[]"
                                        value="{{ $variant_id }}">
                                </td> --}}
                                <td>
                                    <img src="{{ $item['image'] }}" alt="{{ $item['product_name'] }}" width="80">
                                </td>
                                <td>{{ $item['product_name'] }}</td>
                                <td>{{ $item['variant_name'] }}</td>
                                <td>{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                                <td>
                                    <div class="input-group quantity-group" style="width: 170px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline btn-decrease" type="button">-</button>
                                        </div>
                                        <input type="number" class="form-control quantity-input" min="1"
                                            value="{{ $item['quantity'] }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline btn-increase" type="button">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="totalAmount">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                    VNĐ
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-remove"
                                        style="border-radius: 8px; width: 60px; background-color: #FF0000; padding: 8px; color: white; border: none;">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="right-side-summery-box ">
                    <div class="d-flex justify-content-end">
                        <div class="summery-box-2 " style="width:300px">
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
                                            <a id="applyVoucherBtn" class="btn "
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
                                <input class="form-check-input" type="hidden" name="points" style="padding: 12px 25px;"
                                    role="switch" id="applied_loyalty_points" value="1">
                                <div class="form-check form-switch form-switch-primary">
                                    <input class="form-check-input" type="checkbox" name="points" id="points"
                                        value="{{ $user->points }}" style="padding: 12px 25px;"
                                        @if ($user->points == 0) disabled @endif>
                                </div>
                                <input type="hidden" id="pointsInput" name="points" value="0">
                            </div>
                            <h7 class="text-content">Điểm tích lũy của bạn: <span id="availablePoints">{{ $user->points }}
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
                                    <span class="price" id="finalTotal">{{ number_format($total, 0, ',', '.') }}
                                        VND</span>
                                </li>
                            </ul>
                            <input type="hidden" name="initial_total" value="{{ $total }}">
                            <input type="hidden" id="finalTotalInput" name="final_total" value="{{ $total }}">

                        </div>
                        
                    </div>
                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <a href="{{ route('checkout') }}" class="btn btn-primary"
                                    style="border-radius: 8px; background-color: #417394; padding: 10px; color: white; border: none; margin-bottom: 20px;">
                                    Tiến Hành Thanh Toán
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

        </div>

        </div>
    @else
        <div class="mt-4 text-center" style="margin-bottom: 20px;">
            <h3>Giỏ hàng của bạn đang trống.</h3>
        </div>
        <div class="d=flex justify-content-center align-items-center ">
            <a href="{{ route('home') }}" class="btn btn-primary"
                style="border-radius: 8px; background-color: #417394; padding: 10px; color: white; border: none; margin-bottom: 20px;">Mua
                Sắm Ngay</a>
        </div>
        @endif
        </div>
    </section>
    <!-- Cart Section End -->

    @include('clients.blocks.assets.js')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartTotal = document.getElementById('totalAmount');
            const checkbox = document.getElementById('applied_loyalty_points');
            const availablePoints = parseInt(document.getElementById('availablePoints').textContent) || 0;
            let appliedLoyaltyPoints = 0;

            // Calculate the initial total from the total price elements
            let initialTotal = calculateTotal();
            updateCartTotal(initialTotal);

            if (availablePoints === 0) {
                checkbox.disabled = true;
                checkbox.checked = false;
            }

            // Cập nhật tổng tiền
            function updateCartTotal(newTotal) {
                cartTotal.textContent = new Intl.NumberFormat('vi-VN').format(newTotal) + ' VNĐ';
            }

            // Tính toán tổng tiền giỏ hàng
            function calculateTotal() {
                let total = 0;
                document.querySelectorAll('.totalAmount').forEach(el => {
                    total += parseInt(el.textContent.replace(/\D/g, '')) || 0;
                });
                return total;
            }

            // Cập nhật tổng tiền với điểm tích lũy
            function updateTotalWithLoyaltyPoints() {
                let total = initialTotal; // Keep using the initial total for calculations
                let adjustedTotal = total - appliedLoyaltyPoints;
                updateCartTotal(Math.max(adjustedTotal, 0));
            }

            // Xử lý sự kiện khi checkbox thay đổi
            // checkbox.addEventListener('change', function() {
            //     if (this.checked) {
            //         appliedLoyaltyPoints = Math.min(availablePoints, initialTotal);
            //     } else {
            //         appliedLoyaltyPoints = 0;
            //     }
            //     updateTotalWithLoyaltyPoints();
            // });
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    appliedLoyaltyPoints = Math.min(availablePoints, initialTotal);
                } else {
                    appliedLoyaltyPoints = 0;
                }
                updateTotalWithLoyaltyPoints();

                // Gửi yêu cầu lưu vào session
                axios.post('{{ route('cart.applyLoyaltyPoints') }}', {
                    applied_points: appliedLoyaltyPoints
                }).then(response => {
                    console.log('Loyalty points applied:', response.data);
                }).catch(error => {
                    console.error(error);
                });
            });

            // Cập nhật giá trị sau khi thay đổi số lượng
            function updateQuantity(row, newQuantity) {
                const variantId = row.getAttribute('data-variant-id');
                if (newQuantity < 1) {
                    alert('Số lượng phải ít nhất là 1.');
                    return;
                }

                axios.post('{{ route('cart.update') }}', {
                        variant_id: variantId,
                        quantity: newQuantity
                    })
                    .then(response => {
                        const price = parseInt(row.querySelector('td:nth-child(4)').textContent.replace(/\D/g,
                            ''));
                        const totalPrice = price * newQuantity;
                        row.querySelector('.totalAmount').textContent = new Intl.NumberFormat('vi-VN').format(
                            totalPrice) + ' VNĐ';

                        // Recalculate totals
                        initialTotal = calculateTotal();
                        updateTotalWithLoyaltyPoints();
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Đã xảy ra lỗi khi cập nhật giỏ hàng.');
                    });
            }

            // Xử lý nút tăng và giảm số lượng
            document.querySelectorAll('.btn-increase').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const input = row.querySelector('.quantity-input');
                    const newQuantity = parseInt(input.value) + 1;
                    input.value = newQuantity;
                    updateQuantity(row, newQuantity);
                });
            });

            document.querySelectorAll('.btn-decrease').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const input = row.querySelector('.quantity-input');
                    const newQuantity = Math.max(parseInt(input.value) - 1, 1);
                    input.value = newQuantity;
                    updateQuantity(row, newQuantity);
                });
            });

            // Xử lý thay đổi trực tiếp trong input số lượng
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const row = this.closest('tr');
                    const newQuantity = parseInt(this.value);

                    if (newQuantity >= 1) {
                        updateQuantity(row, newQuantity);
                    } else {
                        this.value = 1;
                        alert('Số lượng phải ít nhất là 1.');
                    }
                });
            });

            // Xử lý xóa sản phẩm khỏi giỏ hàng
            document.querySelectorAll('.btn-remove').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const variantId = row.getAttribute('data-variant-id');

                    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                        axios.post('{{ route('cart.remove') }}', {
                                variant_id: variantId
                            })
                            .then(response => {
                                // Remove the row from the cart
                                row.remove();

                                // Recalculate total
                                initialTotal = calculateTotal();
                                updateTotalWithLoyaltyPoints();

                                // Check if the cart is empty and display a message
                                if (document.querySelectorAll('.cart-section tbody tr')
                                    .length === 0) {
                                    document.querySelector('.cart-section').innerHTML = `
                                <div class="mt-4 text-center" style="margin-bottom: 20px;">
                                    <h3>Giỏ hàng của bạn đang trống.</h3>
                                </div>
                                <div class="d=flex justify-content-center align-items-center ">
                                    <a href="{{ route('home') }}" class="btn btn-primary" style="border-radius: 8px; background-color: #417394; padding: 10px; color: white; border: none; margin-bottom: 20px;">Mua Sắm Ngay</a>
                                </div>
                            `;
                                }
                            })
                            .catch(error => {
                                console.error(error);
                                if (error.response && error.response.data && error.response.data
                                    .message) {
                                    alert(error.response.data.message);
                                } else {
                                    alert('Đã xảy ra lỗi khi xóa sản phẩm khỏi giỏ hàng.');
                                }
                            });
                    }
                });
            });
        });
    </script>

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
                    // if (voucherDiscount > maxDiscountAmount) {
                    //     voucherDiscount = maxDiscountAmount;
                    // }
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
                        voucherInfoContainer.innerHTML = ''; // Xóa thông tin cũ

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


            //         const voucherModal = document.getElementById('voucherModal');
            // document.querySelector('.close-modal').onclick = function() {
            //     voucherModal.style.display = 'none';
            // };

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
