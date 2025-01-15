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
                            <th scope="col">Ảnh Sản Phẩm</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Biến Thể</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            <tr data-variant-id="{{ $item->variant_id }}"
                                data-stock-quantity="{{ $item->variant->quantity }}">
                                <td>
                                    <img src="{{ Storage::url($item->variant->image) }}"
                                        alt="{{ $item->variant->name ?? 'Sản phẩm' }}" width="80">
                                </td>
                                <td>{{ $item->variant->product->product_name ?? 'Sản phẩm không tồn tại' }}</td>
                                <td>{{ $item->variant->color->name ?? 'Không có màu' }} -
                                    {{ $item->variant->size->attribute_size_name ?? 'Không có size' }}</td>
                                <td>{{ number_format($item->variant->variant_sale_price, 0, ',', '.') }} VNĐ</td>
                                <td>
                                    <div class="input-group quantity-group" style="width: 170px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline btn-decrease" type="button"
                                                data-variant-id="{{ $item->variant_id }}">-</button>
                                        </div>
                                        <input type="number" class="form-control quantity-input" min="1"
                                            value="{{ $item->quantity }}" data-variant-id="{{ $item->variant_id }}"
                                            id="quantity-{{ $item->variant_id }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline btn-increase" type="button"
                                                data-variant-id="{{ $item->variant_id }}">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="totalAmount">
                                    {{ number_format($item->variant->variant_sale_price * $item->quantity, 0, ',', '.') }}
                                    VNĐ
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-remove"
                                        style="border-radius: 8px; width: 60px; background-color: #FF0000; padding: 8px; color: white; border: none;">
                                        Xóa
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="right-side-summery-box ">
                    <div class="d-flex justify-content-end">
                        <div class="summery-box-2 " style="width:300px">
                            <div class="summery-contain">

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

                                    .btn-apply {
                                        background: var(--theme-color);
                                        color: #fff;
                                        padding: 0 calc(16px + 14*(100vw - 320px) / 1600);
                                        font-weight: 700;
                                        border: 2px solid #417394;
                                        border-radius: 5px;
                                        padding: 10px;
                                    }

                                    .coupon-box input {
                                        border: 2px solid #417394;
                                        border-radius: 5px;
                                        padding: 10px;

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
            const cartTable = document.querySelector('table');

            // Lắng nghe sự kiện nhấn nút tăng số lượng
            document.querySelectorAll('.btn-increase').forEach(button => {
                button.addEventListener('click', function() {
                    let variantId = this.dataset.variantId;
                    let quantityInput = document.querySelector(`#quantity-${variantId}`);
                    let newQuantity = parseInt(quantityInput.value) + 1; // Tăng số lượng lên 1

                    // Gọi hàm cập nhật số lượng
                    updateQuantity(variantId, newQuantity, quantityInput);
                });
            });

            // Lắng nghe sự kiện nhấn nút giảm số lượng
            document.querySelectorAll('.btn-decrease').forEach(button => {
                button.addEventListener('click', function() {
                    let variantId = this.dataset.variantId;
                    let quantityInput = document.querySelector(`#quantity-${variantId}`);
                    let newQuantity = parseInt(quantityInput.value) - 1; // Giảm số lượng 1

                    if (newQuantity < 1) newQuantity = 1; // Giới hạn số lượng không nhỏ hơn 1

                    // Cập nhật số lượng
                    updateQuantity(variantId, newQuantity, quantityInput);
                });
            });

            // Lắng nghe sự kiện thay đổi số lượng từ người dùng nhập trực tiếp
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const newQuantity = parseInt(this.value);
                    if (newQuantity < 1) {
                        alert('Số lượng phải lớn hơn hoặc bằng 1.');
                        this.value = 1; // Đặt lại giá trị nếu nhập không hợp lệ
                        return;
                    }
                    updateQuantity(this.dataset.variantId, newQuantity, this);
                });
            });

            // Hàm cập nhật số lượng
            function updateQuantity(variantId, quantity, element) {
                const row = element.closest('tr');
                const stockQuantity = parseInt(row.getAttribute('data-stock-quantity')); // Lấy số lượng trong kho

                if (quantity > stockQuantity) {
                    alert("Số lượng vượt quá số lượng trong kho.");
                    element.value = stockQuantity; // Đặt lại số lượng tối đa
                    quantity = stockQuantity;
                }

                // Gửi yêu cầu cập nhật số lượng lên server
                fetch('/cart/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            variant_id: variantId,
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Cập nhật lại số lượng và thành tiền
                            element.value = quantity;
                            row.querySelector('.totalAmount').textContent =
                                `${number_format(data.newTotalAmount, 0, ',', '.')} VNĐ`;
                        } else {
                            alert(data.error);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function calculateTotal() {
                let total = 0;
                document.querySelectorAll('.totalAmount').forEach(el => {
                    total += parseInt(el.textContent.replace(/\D/g, '')) || 0;
                });
                totalAmount = total;
                document.getElementById('totalAmount').textContent = number_format(totalAmount, 0, ',', '.') +
                    " VND";
                finalTotalElement.innerText = `${totalAmount.toLocaleString()} VND`;
            }
            const cartTable = document.querySelector("tbody");

            function updateRowTotal(row, quantity, price) {
                const rowTotalElement = row.querySelector(".totalAmount");
                const newRowTotal = quantity * price;
                rowTotalElement.textContent = `${newRowTotal.toLocaleString()} VNĐ`;
            }

            function sendQuantityUpdate(variantId, quantity, row, price) {
                axios
                    .post("{{ route('cart.update') }}", {
                        variant_id: variantId,
                        quantity: quantity,
                    })
                    .then((response) => {
                        if (response.data.success) {
                            updateRowTotal(row, quantity, price);
                            calculateTotal();
                            const pointsCheckbox = document.getElementById('points');
                            const pointsDiscountSection = document.getElementById('pointsDiscountSection');
                            const pointsDiscount = document.getElementById('pointsDiscount');
                            const pointsInputHidden = document.getElementById('pontsDiscountInput');

                            if (pointsCheckbox.checked) {
                                pointsCheckbox.checked = false;
                                pointsDiscountSection.style.display = 'none';
                                pointsDiscount.innerText = '- 0 VND';
                                pointsInputHidden.value = 0;
                                document.getElementById('pontsDiscountInput').value = 0;
                                alert('Điểm tích lũy đã được bỏ chọn do thay đổi giỏ hàng.');
                            }

                            let hasVoucherReset = false;
                            const voucherInputs = document.querySelectorAll('input[name="selectedVoucher"]');
                            const voucherDiscountSection = document.getElementById('voucherDiscount');
                            const voucherDiscountInput = document.getElementById('voucherDiscountInput');

                            voucherInputs.forEach(voucher => {
                                if (voucher.checked) {
                                    voucher.checked = false;
                                    hasVoucherReset = true;
                                }
                            });

                            if (hasVoucherReset) {
                                voucherDiscountSection.style.display = 'none';
                                voucherDiscountSection.querySelector('span').innerText =
                                    '- 0 VND';
                                voucherDiscountInput.value = 0;
                                alert('Voucher đã được bỏ chọn do thay đổi giỏ hàng.');
                            }
                            updateTotal();
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                        alert(error.response.data.error || "Đã xảy ra lỗi!");
                    });
            }

            cartTable.addEventListener("click", function(e) {
                const button = e.target;
                const row = button.closest("tr");
                const quantityInput = row.querySelector(".quantity-input");
                const price = parseInt(row.cells[3].textContent.replace(/\D/g, ""));
                const variantId = row.getAttribute("data-variant-id");

                let quantity = parseInt(quantityInput.value);

                if (button.classList.contains("btn-decrease")) {
                    if (quantity <= 1) {
                        alert("Số lượng không thể nhỏ hơn 1.");
                        return;
                    }
                    quantity--;
                } else if (button.classList.contains("btn-increase")) {
                    quantity++;
                } else {
                    return;
                }
                quantityInput.value = quantity;
                updateCartCount();
                // Gửi cập nhật số lượng tới server
                sendQuantityUpdate(variantId, quantity, row, price);
            });

            cartTable.addEventListener("input", function(e) {
                const input = e.target;
                if (input.classList.contains("quantity-input")) {
                    const row = input.closest("tr");
                    const price = parseInt(row.cells[3].textContent.replace(/\D/g, ""));
                    const variantId = row.getAttribute("data-variant-id");

                    let quantity = parseInt(input.value);
                    const stockQuantity = parseInt(row.getAttribute("data-stock-quantity"));

                    if (quantity < 1 || isNaN(quantity)) {
                        alert("Số lượng không thể nhỏ hơn 1.");
                        input.value = 1;
                        quantity = 1;
                    }

                    if (quantity > stockQuantity) {
                        alert("Số lượng vượt quá số lượng trong kho. Đặt lại số lượng tối đa là " +
                            stockQuantity);
                        input.value = stockQuantity;
                        quantity = stockQuantity;
                    }
                    updateCartCount();
                    // Gửi cập nhật số lượng tới server
                    sendQuantityUpdate(variantId, quantity, row, price);
                }
            });

            document.querySelectorAll('.btn-remove').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const variantId = row.getAttribute('data-variant-id');


                    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                        axios.post('{{ route('cart.remove') }}', {
                                variant_id: variantId

                            })
                            .then(response => {
                                row.remove();
                                calculateTotal();
                                updateCartCount();
                                if (document.querySelectorAll('.cart-section tbody tr')
                                    .length === 0) {
                                    document.querySelector('.cart-section').innerHTML = `
                        <div class="mt-4 text-center" style="margin-bottom: 20px;">
                            <h3>Giỏ hàng của bạn đang trống.</h3>
                        </div>
                        <div class="d-flex justify-content-center align-items-center ">
                            <a href="{{ route('home') }}" class="btn btn-primary" style="width: 90%; border-radius: 8px; background-color: #417394; padding: 10px; color: white; border: none; margin-bottom: 20px;">Mua Sắm Ngay</a>
                        </div>
                    `;
                                };
                                const pointsCheckbox = document.getElementById('points');
                                const pointsDiscountSection = document.getElementById(
                                    'pointsDiscountSection');
                                const pointsDiscount = document.getElementById(
                                    'pointsDiscount');
                                const pointsInputHidden = document.getElementById(
                                    'pontsDiscountInput');
                                if (pointsCheckbox.checked) {
                                    pointsCheckbox.checked = false;
                                    pointsDiscountSection.style.display = 'none';
                                    pointsDiscount.innerText = '- 0 VND';
                                    pointsInputHidden.value = 0;
                                    document.getElementById('pontsDiscountInput').value = 0;
                                    alert(
                                    'Điểm tích lũy đã được bỏ chọn do thay đổi giỏ hàng.');
                                }
                                let hasVoucherReset = false;
                                const voucherInputs = document.querySelectorAll(
                                    'input[name="selectedVoucher"]');
                                const voucherDiscountSection = document.getElementById(
                                    'voucherDiscount');
                                const voucherDiscountInput = document.getElementById(
                                    'voucherDiscountInput');


                                voucherInputs.forEach(voucher => {
                                    if (voucher.checked) {
                                        voucher.checked = false;
                                        hasVoucherReset = true;
                                    }
                                });

                                if (hasVoucherReset) {
                                    voucherDiscountSection.style.display =
                                        'none';
                                    voucherDiscountSection.querySelector('span').innerText =
                                        '- 0 VND';
                                    voucherDiscountInput.value = 0;
                                    alert('Voucher đã được bỏ chọn do thay đổi giỏ hàng.');
                                }
                                updateTotal();


                            })


                            .catch(error => {
                                console.error(error);

                            });

                    }
                });
            });

            // Hàm cập nhật số lượng giỏ hàng trong header
            function updateCartCount() {
                let totalQuantity = 0;

                // Lặp qua tất cả các dòng trong giỏ hàng và tính tổng số lượng
                const cartRows = document.querySelectorAll('.cart-section tbody tr');
                cartRows.forEach(row => {
                    const quantityInput = row.querySelector(".quantity-input");
                    if (quantityInput) {
                        totalQuantity += parseInt(quantityInput.value);
                    }
                });

                // Cập nhật số lượng giỏ hàng trong phần header
                const cartCountElement = document.getElementById("cart-count");
                if (cartCountElement) {
                    cartCountElement.textContent = totalQuantity;
                }
            }


            // Hàm cập nhật số lượng giỏ hàng trong header
            function count() {
                fetch('/cart/count', {
                        method: 'GET', // Yêu cầu số lượng sản phẩm hiện tại trong giỏ
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('cart-count').textContent = data.totalQuantity;
                    })
                    .catch(error => console.error('Lỗi khi cập nhật số lượng giỏ hàng:', error));
            }


            function number_format(number, decimals, dec_point, thousands_sep) {
                decimals = decimals || 0;
                dec_point = dec_point || '.';
                thousands_sep = thousands_sep || ',';

                var parts = number.toFixed(decimals).split('.');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
                return parts.join(dec_point);
            }

            document.getElementById('openModal').addEventListener('click', function() {
                document.getElementById('voucherModal').style.display = 'block';
                document.body.classList.add('no-scroll');
            });
            document.querySelector('.close').addEventListener('click', function() {
                document.getElementById('voucherModal').style.display = 'none';
                document.body.classList.remove('no-scroll');
            });
            window.addEventListener('click', function(event) {
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
                                let discountInfo = '';
                                if (voucher.discount_type === 'percent') {
                                    discountInfo =
                                        `Giảm ${voucher.discount_percent}% - Giảm tối đa ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.max_discount_amount)}`;
                                } else if (voucher.discount_type === 'fixed') {
                                    discountInfo =
                                        `Giảm ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.discount_value)} `;
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

                            let discountInfo = '';
                            if (voucher.discount_type === 'percent') {
                                discountInfo =
                                    `Giảm ${voucher.discount_percent}% - Giảm tối đa ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.max_discount_amount)}`;
                            } else if (voucher.discount_type === 'fixed') {
                                discountInfo =
                                    `Giảm ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(voucher.discount_value)} `;
                            }



                            const warningMessage = totalAmount < voucher.min_order_amount ?
                                `<p class="voucher-warning" style="color: red;">Cần mua thêm VND${(voucher.min_order_amount - totalAmount).toLocaleString()} để áp dụng mã này.</p>` :
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
                let voucherDiscount = parseFloat(document.getElementById('voucherDiscountInput').value) || 0;
                let pointsDiscount = parseFloat(document.getElementById('pontsDiscountInput').value) || 0;
                let selectedVoucher = document.getElementById('selectedVoucher').value || null;
                let finalTotal = totalAmount - voucherDiscount - pointsDiscount;
                if (finalTotal < 0) {
                    finalTotal = 0;
                }

                finalTotalElement.innerText = `${finalTotal.toLocaleString()} VND`;
                document.getElementById('finalTotalInput').value = finalTotal;
                fetch('/cart/update-total', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            final_total: finalTotal,
                            voucher_discount: voucherDiscount,
                            points_discount: pointsDiscount,
                            selected_voucher: selectedVoucher
                        })
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log(data.message);
                        }
                    }).catch(error => console.error('Error:', error));

                const paymentOnlineRadio = document.getElementById('payment_online');
                const warningMessage = document.getElementById('warningMessage');

                if (finalTotal < 5000) {
                    paymentOnlineRadio.disabled = true;
                    warningMessage.style.display = 'block';
                } else {
                    paymentOnlineRadio.disabled = false;
                    warningMessage.style.display = 'none';
                }
            }


        });
    </script>

@endsection
