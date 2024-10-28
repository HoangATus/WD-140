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
                <table class="table">
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

                <div class="cart-summary">
                    <div class="d-flex justify-content-end align-items-center mt-2">
                        <div style="margin-right: 72px; white-space: nowrap;">Tổng Tiền:</div>
                        <div id="cart-total" style="min-width: 120px; text-align: right; white-space: nowrap;">
                            {{ number_format($total, 0, ',', '.') }} VNĐ
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('checkout') }}" class="btn btn-primary"
                            style="border-radius: 8px; width: 260px; background-color: #417394; padding: 10px; color: white; border: none; margin-bottom: 20px;">
                            Tiến Hành Thanh Toán
                        </a>
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

            // Hàm cập nhật tổng tiền
            function updateCartTotal(newTotal) {
                cartTotal.textContent = newTotal;
            }

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

                        // Cập nhật tổng tiền giỏ hàng
                        let total = 0;
                        document.querySelectorAll('.total-price').forEach(el => {
                            total += parseInt(el.textContent.replace(/\D/g, ''));
                        });
                        updateCartTotal(new Intl.NumberFormat('vi-VN').format(total) + ' VNĐ');
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