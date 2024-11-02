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
                                {{-- <div class="coupon-cart"> --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-content">
                                            Dùng {{ $loyaltyPoints }} điểm của bạn
                                        </h5>
                                    </div>
                                    <div class="form-check form-switch form-switch-primary">
                                        <input class="form-check-input" style="padding: 12px 25px;" type="checkbox"
                                            role="switch" name="applied_loyalty_points" id="applied_loyalty_points"
                                            value="1">
                                    </div>
                                </div>
                              
                                <h5 class="text-content mt-3">Điểm tích lũy của bạn: <span
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartTotal = document.getElementById('cart-total');
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
                document.querySelectorAll('.total-price').forEach(el => {
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
                        row.querySelector('.total-price').textContent = new Intl.NumberFormat('vi-VN').format(
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

@endsection
