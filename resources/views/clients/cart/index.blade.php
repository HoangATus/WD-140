<!-- resources/views/cart/index.blade.php -->

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
                            <th scope="col">Xóa</th>
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
                                <td>{{ number_format($item['price'], 0, ',', '.') }} ₫</td>
                                <td>
                                    <input type="number" class="form-control quantity-input" min="1" value="{{ $item['quantity'] }}" style="width: 80px;">
                                </td>
                                <td class="total-price">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} ₫</td>
                                <td>
                                    <button class="btn btn-danger btn-remove">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="cart-summary">
                    <h4>Tổng Tiền: <span id="cart-total">{{ number_format($total, 0, ',', '.') }} ₫</span></h4>
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Tiến Hành Thanh Toán</a>
                </div>
            @else
                <p>Giỏ hàng của bạn đang trống.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Mua Sắm Ngay</a>
            @endif
        </div>
    </section>
    <!-- Cart Section End -->

    @include('clients.blocks.assets.js')

    <!-- JavaScript để xử lý cập nhật và xóa giỏ hàng -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const removeButtons = document.querySelectorAll('.btn-remove');
            const cartTotal = document.getElementById('cart-total');

            // Hàm cập nhật tổng tiền
            function updateCartTotal(newTotal) {
                cartTotal.textContent = newTotal;
            }

            // Xử lý thay đổi số lượng
            quantityInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const row = this.closest('tr');
                    const variantId = row.getAttribute('data-variant-id');
                    const newQuantity = this.value;

                    if (newQuantity < 1) {
                        alert('Số lượng phải ít nhất là 1.');
                        this.value = 1;
                        return;
                    }

                    axios.post('{{ route("cart.update") }}', {
                        variant_id: variantId,
                        quantity: newQuantity
                    })
                    .then(response => {
                        // Cập nhật thành tiền của dòng đó
                        const price = parseInt(row.querySelector('td:nth-child(4)').textContent.replace(/\D/g, ''));
                        const totalPrice = price * newQuantity;
                        row.querySelector('.total-price').textContent = new Intl.NumberFormat('vi-VN').format(totalPrice) + ' ₫';

                        // Cập nhật tổng tiền
                        let total = 0;
                        document.querySelectorAll('.total-price').forEach(el => {
                            total += parseInt(el.textContent.replace(/\D/g, ''));
                        });
                        updateCartTotal(new Intl.NumberFormat('vi-VN').format(total) + ' ₫');
                    })
                    .catch(error => {
                        console.error(error);
                        if (error.response && error.response.data && error.response.data.message) {
                            alert(error.response.data.message);
                        } else {
                            alert('Đã xảy ra lỗi khi cập nhật giỏ hàng.');
                        }
                    });
                });
            });

            // Xử lý xóa sản phẩm
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const variantId = row.getAttribute('data-variant-id');

                    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                        axios.post('{{ route("cart.remove") }}', {
                            variant_id: variantId
                        })
                        .then(response => {
                            // Loại bỏ dòng đó khỏi bảng
                            row.remove();

                            // Cập nhật tổng tiền
                            let total = 0;
                            document.querySelectorAll('.total-price').forEach(el => {
                                total += parseInt(el.textContent.replace(/\D/g, ''));
                            });
                            updateCartTotal(new Intl.NumberFormat('vi-VN').format(total) + ' ₫');

                            // Nếu giỏ hàng trống, hiển thị thông báo
                            if (document.querySelectorAll('.cart-section tbody tr').length === 0) {
                                document.querySelector('.cart-section').innerHTML = `
                                    <p>Giỏ hàng của bạn đang trống.</p>
                                    <a href="{{ route('home') }}" class="btn btn-primary">Mua Sắm Ngay</a>
                                `;
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            if (error.response && error.response.data && error.response.data.message) {
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
