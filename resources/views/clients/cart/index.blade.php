@extends('clients.layouts.client')

@section('content')

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

    <section class="cart-section">
        <div class="container">
            <h2>Giỏ Hàng</h2>

            @if (count($cart) > 0)
                <style>
                    .cart-table {
                        width: 100%;
                        margin-top: 30px;
                        border-collapse: collapse;
                        font-family: 'Arial', sans-serif;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    }

                    .cart-table th,
                    .cart-table td {
                        padding: 15px;
                        text-align: center;
                        border-bottom: 1px solid #ddd;
                        vertical-align: middle;

                    }

                    .cart-table th {
                        background-color: #f8f9fa;
                        color: #333;
                        font-size: 16px;
                        text-transform: uppercase;
                        font-weight: bold;
                    }

                    .cart-table tbody tr {
                        transition: background-color 0.3s ease;
                    }

                    .cart-table tbody tr:hover {
                        background-color: #f6f6f6;
                    }

                    .cart-table img {
                        border-radius: 8px;
                        width: 70px;
                    }

                    .quantity-group {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 5px;
                    }

                    .btn {
                        font-size: 14px;
                        padding: 5px 10px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s ease, transform 0.2s ease;
                    }

                    .btn:hover {
                        transform: scale(1.05);
                    }

                    .btn-decrease,
                    .btn-increase {
                        background-color: #e9ecef;
                        color: #333;
                        width: 30px;
                        height: 30px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .btn-decrease:hover,
                    .btn-increase:hover {
                        background-color: #d6d8db;
                    }

                    .quantity-input {
                        text-align: center;
                        width: 50px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        height: 30px;
                    }

                    .btn-remove {
                        background-color: #FF4D4D;
                        color: white;
                        font-size: 14px;
                        padding: 5px 15px;
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: auto;

                        height: 40px;
                    }

                    .btn-remove:hover {
                        background-color: #FF1A1A;
                    }

                    .total-price {
                        font-weight: bold;
                        color: #555;
                    }

                    .cart-title {
                        text-align: center;
                        font-size: 22px;
                        margin-bottom: 20px;
                        color: #333;
                        text-transform: uppercase;
                        font-weight: bold;
                    }
                </style>

                <div>
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Biến Thể</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $variant_id => $item)
                                <tr data-variant-id="{{ $variant_id }}" data-stock="{{ $item['stock'] ?? 0 }}">
                                    <td>
                                        <img src="{{ $item['image'] }}" alt="{{ $item['product_name'] }}">
                                    </td>
                                    <td>{{ $item['product_name'] }}</td>
                                    <td>{{ $item['variant_name'] }}</td>
                                    <td>{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                                    <td>
                                        <div class="quantity-group">
                                            <button class="btn btn-decrease" type="button">-</button>
                                            <input type="number" class="quantity-input" min="1"
                                                value="{{ $item['quantity'] }}">
                                            <button class="btn btn-increase" type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="total-price">
                                        {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ
                                    </td>
                                    <td>
                                        <button class="btn btn-remove">Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end align-items-center mt-2 mb-3">
                    <div class="col-xxl-3">
                        <div class="summery-box p-sticky">
                            <div class="summery-contain">

                                <div class="form-check form-switch form-switch-primary" style="display: none;">
                                    <input class="form-check-input" style="padding: 12px 25px;" type="checkbox"
                                        role="switch" name="applied_loyalty_points" id="applied_loyalty_points"
                                        value="1">
                                </div>

                                <h5 class="text-content mt-3"><span id="availablePoints"></span></h5>
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

    @include('clients.blocks.assets.js')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartTotal = document.getElementById('cart-total');
            const checkbox = document.getElementById('applied_loyalty_points');
            const availablePoints = parseInt(document.getElementById('availablePoints').textContent) || 0;
            let appliedLoyaltyPoints = 0;

            let initialTotal = calculateTotal();
            updateCartTotal(initialTotal);

            if (availablePoints === 0) {
                checkbox.disabled = true;
                checkbox.checked = false;
            }

            function updateCartTotal(newTotal) {
                cartTotal.textContent = new Intl.NumberFormat('vi-VN').format(newTotal) + ' VNĐ';
            }

            function calculateTotal() {
                let total = 0;
                document.querySelectorAll('.total-price').forEach(el => {
                    total += parseInt(el.textContent.replace(/\D/g, '')) || 0;
                });
                return total;
            }

            function updateTotalWithLoyaltyPoints() {
                let total = initialTotal;
                let adjustedTotal = total - appliedLoyaltyPoints;
                updateCartTotal(Math.max(adjustedTotal, 0));
            }

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    appliedLoyaltyPoints = Math.min(availablePoints, initialTotal);
                } else {
                    appliedLoyaltyPoints = 0;
                }
                updateTotalWithLoyaltyPoints();

                axios.post('{{ route('cart.applyLoyaltyPoints') }}', {
                    applied_points: appliedLoyaltyPoints
                }).then(response => {
                    console.log('Loyalty points applied:', response.data);
                }).catch(error => {
                    console.error(error);
                });
            });

            function updateQuantity(row, newQuantity) {
                const variantId = row.getAttribute('data-variant-id');
                const price = parseInt(row.querySelector('td:nth-child(4)').textContent.replace(/\D/g, ''));

                if (isNaN(price) || isNaN(newQuantity)) {
                    alert('Có lỗi xảy ra khi cập nhật số lượng. Vui lòng thử lại.');
                    return;
                }

                axios.post('{{ route('cart.update') }}', {
                        variant_id: variantId,
                        quantity: newQuantity
                    })
                    .then(response => {
                        if (response.data.success) {
                            const totalPrice = price * newQuantity;
                            row.querySelector('.total-price').textContent = new Intl.NumberFormat('vi-VN')
                                .format(totalPrice) + ' VNĐ';
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Đã xảy ra lỗi khi cập nhật giỏ hàng.');
                    });
            }

            document.querySelectorAll('.btn-increase').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const input = row.querySelector('.quantity-input');
                    const stock = parseInt(row.getAttribute('data-stock'));
                    const currentQuantity = parseInt(input.value);

                    if (currentQuantity < stock) {
                        const newQuantity = currentQuantity + 1;
                        input.value = newQuantity;
                        updateQuantity(row, newQuantity);
                    } else {
                        alert(`Số lượng không được vượt quá ${stock}.`);
                    }
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

            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const row = this.closest('tr');
                    const stock = parseInt(row.getAttribute(
                        'data-stock'));
                    const newQuantity = parseInt(this.value);

                    if (newQuantity > stock) {
                        alert(`Số lượng không được vượt quá tồn kho (${stock}).`);
                        this.value = stock;
                        return;
                    }

                    if (newQuantity < 1) {
                        alert('Số lượng phải ít nhất là 1.');
                        this.value = 1;
                        return;
                    }

                    updateQuantity(row, newQuantity);
                });
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
                                initialTotal = calculateTotal();
                                updateTotalWithLoyaltyPoints();

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
