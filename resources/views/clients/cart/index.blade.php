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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $variant_id => $item)
                            <tr data-variant-id="{{ $variant_id }}">
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
                                <td class="total-price">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                    VNĐ</td>
                                <td>
                                    <button class="btn btn-danger btn-remove"
                                        style="border-radius: 8px; width: 60px; background-color: #FF0000; padding: 8px; color: white; border: none;">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end align-items-center mt-2 mb-3">
                    <div class="col-xxl-3">
                        <div class="summery-box p-sticky">
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
                                        <input type="number" class="form-control" id="loyaltyPointsInput"
                                            placeholder="Nhập số điểm muốn sử dụng" min="0"
                                            max="{{ $loyaltyPoints }}">
                                        <button class="btn-apply" id="applyPointsBtn">Áp dụng</button>
                                        <button class="btn-remove" id="removePointsBtn"
                                            style="display:none; background-color: #FF0000; padding: 0 calc(16px + 14*(100vw - 320px) / 1600);font-weight: 700; border: none;">Xóa</button>
                                    </div>
                                </div>
                                <h5 class="text-content">Điểm tích lũy của bạn: <span
                                        id="availablePoints">{{ $loyaltyPoints }}</span></h5>
                            </div>
                            <ul class="summery-total">
                                <li class="list-total border-top-0">
                                    <h4>Tổng tiền: </h4>
                                    <h4 id="cart-total" class="price theme-color">{{ number_format($total, 0, ',', '.') }}
                                        VNĐ</h4>
                                </li>
                            </ul>
                            <div class="button-group cart-button">
                                <ul>
                                    <li>
                                        <a href="{{ route('checkout') }}" class="btn btn-primary"
                                            style="border-radius: 8px; background-color: #417394; padding: 10px; color: white; border: none; margin-bottom: 20px;">
                                            Tiến Hành Thanh Toán
                                        </a>
                                    </li>

                                    {{-- <li>
                                        <button onclick="location.href = 'index.html';"
                                            class="btn btn-light shopping-button text-dark">
                                            <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                    </li> --}}
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

    <!-- JavaScript để xử lý cập nhật và xóa giỏ hàng -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartTotal = document.getElementById('cart-total');
            const loyaltyPointsInput = document.getElementById('loyaltyPointsInput');
            const availablePoints = document.getElementById('availablePoints');
            const applyPointsBtn = document.getElementById('applyPointsBtn');
            const removePointsBtn = document.createElement('button');
            removePointsBtn.textContent = 'Xóa';
            removePointsBtn.className = 'btn-apply';
            removePointsBtn.style.display = 'none';
            loyaltyPointsInput.parentElement.appendChild(removePointsBtn);
            const maxLoyaltyPoints = parseInt(availablePoints.textContent) || 0;
            let appliedLoyaltyPoints = 0;
            let initialTotal = parseInt(cartTotal.textContent.replace(/\D/g, '')) || 0;

            // Hàm cập nhật tổng tiền
            function updateCartTotal(newTotal) {
                cartTotal.textContent = newTotal;
            }

            function fetchCartData() {
                fetch('/cart/data')
                    .then(response => response.json())
                    .then(data => {
                        // Cập nhật tổng tiền
                        updateCartTotal(new Intl.NumberFormat('vi-VN').format(data.total) + ' VNĐ');

                        // Cập nhật số lượng sản phẩm trong giỏ hàng
                        data.items.forEach(item => {
                            const row = document.querySelector(
                                `tr[data-variant-id="${item.variantId}"]`);
                            if (row) {
                                const quantityInput = row.querySelector('.quantity-input');
                                quantityInput.value = item.quantity;
                                const totalPrice = item.price * item
                                    .quantity; // Sử dụng item.price thay vì query selector
                                row.querySelector('.total-price').textContent = new Intl.NumberFormat(
                                    'vi-VN').format(totalPrice) + ' VNĐ';
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Lỗi khi lấy dữ liệu giỏ hàng:', error);
                    });
            }

            function updateTotalAfterLoyalty(loyaltyPoints) {
                let totalAfter = initialTotal - loyaltyPoints;
                if (totalAfter < 0) totalAfter = 0;
                updateCartTotal(new Intl.NumberFormat('vi-VN').format(totalAfter) + ' VNĐ');
            }

            applyPointsBtn.addEventListener('click', function() {
                const loyaltyPoints = parseInt(loyaltyPointsInput.value) || 0;
                const currentTotal = parseInt(cartTotal.textContent.replace(/\D/g, '')) || 0;

                if (loyaltyPointsInput.value.trim() === '') {
                    alert('Vui lòng nhập số điểm tích lũy.');
                    loyaltyPointsInput.value = maxLoyaltyPoints;
                    return;
                }

                if (isNaN(loyaltyPoints) || loyaltyPoints < 0) {
                    alert('Điểm tích lũy không hợp lệ.');
                    loyaltyPointsInput.value = maxLoyaltyPoints;
                    return;
                } else if (loyaltyPoints > maxLoyaltyPoints) {
                    alert(`Điểm tích lũy không được lớn hơn số điểm hiện có (${maxLoyaltyPoints}).`);
                    loyaltyPointsInput.value = maxLoyaltyPoints;
                    return;
                }

                appliedLoyaltyPoints = loyaltyPoints;
                let totalAfter = currentTotal - appliedLoyaltyPoints;
                if (totalAfter < 0) totalAfter = 0;

                updateCartTotal(new Intl.NumberFormat('vi-VN').format(totalAfter) + ' VNĐ');
                applyPointsBtn.style.display = 'none';
                removePointsBtn.style.display = 'inline-block';
                loyaltyPointsInput.setAttribute('readonly', true);

                fetch('/cart/apply-loyalty-points', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            points: appliedLoyaltyPoints,
                            total: totalAfter
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) {
                            alert('Đã xảy ra lỗi khi lưu điểm tích lũy vào session.');
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            });

            removePointsBtn.addEventListener('click', function() {
                appliedLoyaltyPoints = 0;

                fetch('/cart/remove-loyalty-points', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateCartTotal(new Intl.NumberFormat('vi-VN').format(data.total) + ' VNĐ');
                            applyPointsBtn.style.display = 'inline-block';
                            removePointsBtn.style.display = 'none';
                            loyaltyPointsInput.value = '';
                            loyaltyPointsInput.removeAttribute('readonly');
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            });



            // Xử lý mã giảm giá (nếu có)

            // Hàm cập nhật số lượng
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
                        // Cập nhật thành tiền của sản phẩm
                        const price = parseInt(row.querySelector('td:nth-child(4)').textContent.replace(/\D/g,
                            ''));
                        const totalPrice = price * newQuantity;
                        row.querySelector('.total-price').textContent = new Intl.NumberFormat('vi-VN').format(
                            totalPrice) + ' VNĐ';

                        // Cập nhật tổng tiền giỏ hàng (tính cả điểm tích lũy đã áp dụng)
                        let total = 0;
                        document.querySelectorAll('.total-price').forEach(el => {
                            total += parseInt(el.textContent.replace(/\D/g, ''));
                        });

                        // Subtract applied loyalty points from the total
                        let adjustedTotal = total - appliedLoyaltyPoints;
                        if (adjustedTotal < 0) adjustedTotal = 0;

                        // Update cart total display
                        updateCartTotal(new Intl.NumberFormat('vi-VN').format(adjustedTotal) + ' VNĐ');
                    })
                    .catch(error => {
                        console.error(error);
                        if (error.response && error.response.data && error.response.data.message) {
                            alert(error.response.data.message);
                        } else {
                            alert('Đã xảy ra lỗi khi cập nhật giỏ hàng.');
                        }
                    });
            }


            // Xử lý nút tăng số lượng
            document.querySelectorAll('.btn-increase').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const input = row.querySelector('.quantity-input');
                    const newQuantity = parseInt(input.value) + 1;
                    input.value = newQuantity;
                    updateQuantity(row, newQuantity);
                });
            });

            // Xử lý nút giảm số lượng
            document.querySelectorAll('.btn-decrease').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const input = row.querySelector('.quantity-input');
                    const newQuantity = parseInt(input.value) - 1;

                    if (newQuantity >= 1) {
                        input.value = newQuantity;
                        updateQuantity(row, newQuantity);
                    }
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
                                // Loại bỏ dòng sản phẩm khỏi bảng
                                row.remove();

                                // Cập nhật tổng tiền giỏ hàng
                                let total = 0;
                                document.querySelectorAll('.total-price').forEach(el => {
                                    total += parseInt(el.textContent.replace(/\D/g,
                                        ''));
                                });
                                updateCartTotal(new Intl.NumberFormat('vi-VN').format(total) +
                                    ' VNĐ');

                                // Kiểm tra nếu giỏ hàng trống, hiển thị thông báo
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
@endsection
