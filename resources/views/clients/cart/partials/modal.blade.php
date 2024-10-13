<!-- resources/views/cart/partials/modal.blade.php -->

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
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} ₫</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="cart-summary">
        <h5>Tổng Tiền: {{ number_format($total, 0, ',', '.') }} ₫</h5>
    </div>
@else
    <p>Giỏ hàng của bạn đang trống.</p>
@endif
