<!-- resources/views/orders/index.blade.php -->

@extends('clients.layouts.client')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đơn Hàng Của Tôi</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Orders Section Start -->
    <section class="orders-section">
        <div class="container">
            <h2>Đơn Hàng Của Tôi</h2>

            @if (count($cart) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Biến Thể</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Thành Tiền</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $variant_id => $item)
                            <tr data-variant-id="{{ $variant_id }}">
                                <td>
                                    <img src="{{ $item['image'] }}" alt="{{ $item['product_name'] }}" width="60">
                                </td>
                                <td>{{ $item['product_name'] }}</td>
                                <td>{{ $item['variant_name'] }}</td>
                                <td>{{ number_format($item['price'], 0, ',', '.') }} ₫</td>
                                <td>
                                    <input type="number" min="1" max="100" value="{{ $item['quantity'] }}"
                                        class="form-control quantity-input" data-variant-id="{{ $variant_id }}">
                                </td>
                                <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} ₫</td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove-from-cart"
                                        data-variant-id="{{ $variant_id }}">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="cart-summary">
                    <h4>Tổng Tiền: {{ number_format($total, 0, ',', '.') }} ₫</h4>
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Tiến Hành Thanh Toán</a>
                </div>
            @else
                <p>Giỏ hàng của bạn đang trống.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Mua Sắm Ngay</a>
            @endif

            @include('clients.blocks.assets.js')
        @endsection

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Sự kiện khi nhấn nút "Xóa" khỏi giỏ hàng
                    document.querySelectorAll('.remove-from-cart').forEach(function(button) {
                        button.addEventListener('click', function() {
                            const variantId = this.getAttribute('data-variant-id');

                            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                                axios.post('{{ route('cart.remove') }}', {
                                        variant_id: variantId
                                    })
                                    .then(response => {
                                        // Xóa dòng sản phẩm khỏi bảng
                                        const row = document.querySelector(
                                            `tr[data-variant-id="${variantId}"]`);
                                        row.remove();

                                        // Cập nhật tổng tiền
                                        location.reload(); // Hoặc cập nhật tổng tiền bằng JavaScript
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

                    // Sự kiện khi thay đổi số lượng sản phẩm
                    document.querySelectorAll('.quantity-input').forEach(function(input) {
                        input.addEventListener('change', function() {
                            const variantId = this.getAttribute('data-variant-id');
                            const quantity = this.value;

                            axios.post('{{ route('cart.update') }}', {
                                    variant_id: variantId,
                                    quantity: quantity
                                })
                                .then(response => {
                                    // Cập nhật thành tiền cho dòng sản phẩm
                                    location.reload(); // Hoặc cập nhật thành tiền bằng JavaScript
                                })
                                .catch(error => {
                                    console.error(error);
                                    if (error.response && error.response.data && error.response.data
                                        .message) {
                                        alert(error.response.data.message);
                                    } else {
                                        alert('Đã xảy ra lỗi khi cập nhật giỏ hàng.');
                                    }
                                });
                        });
                    });
                });
            </script>
        @endpush
