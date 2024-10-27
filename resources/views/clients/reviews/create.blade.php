@extends('clients.layouts.client')

@section('content')
    <div class="container">
        <h2>Đánh giá sản phẩm</h2>

        @if ($order->status == 'completed')
            <!-- Kiểm tra trạng thái đơn hàng -->
            <!-- Form đánh giá -->
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                <!-- Nhập đánh giá -->
                <div class="form-group">
                    <label for="product_id">Chọn sản phẩm:</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Nhập điểm đánh giá -->
                <div class="form-group">
                    <label for="rating">Đánh giá (1-5):</label>
                    <div class="rating" style="font-size: 30px;">
                        <input type="radio" name="rating" id="star5" value="5" required>
                        <label for="star5" class="fa fa-star"></label>
                        <input type="radio" name="rating" id="star4" value="4" required>
                        <label for="star4" class="fa fa-star"></label>
                        <input type="radio" name="rating" id="star3" value="3" required>
                        <label for="star3" class="fa fa-star"></label>
                        <input type="radio" name="rating" id="star2" value="2" required>
                        <label for="star2" class="fa fa-star"></label>
                        <input type="radio" name="rating" id="star1" value="1" required>
                        <label for="star1" class="fa fa-star"></label>
                    </div>
                </div>

                <!-- Nhập bình luận -->
                <div class="form-group">
                    <label for="review">Bình luận:</label>
                    <textarea name="review" id="review" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Gửi Đánh Giá</button>
            </form>
        @else
            <div class="alert alert-warning text-center mt-5"
                style="font-size: 20px; font-weight: bold; padding: 20px; border-radius: 8px; background-color: #bee5e2; color: #ee4116;">
                Bạn chỉ có thể đánh giá sản phẩm khi đơn hàng ở trạng thái <strong>Hoàn thành</strong>.
            </div>
            <div class="text-center" style="margin-top: 20px;">
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary"
                    style="font-size: 18px; padding: 10px 20px;">Quay lại trang chi tiết</a>
            </div>
        @endif


    </div>

    <style>
        .rating {
            direction: rtl;
            display: inline-block;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ddd;
            font-size: 30px;
            padding: 0;
            cursor: pointer;
        }

        .rating input:checked~label {
            color: gold;
        }

        .rating label:hover,
        .rating label:hover~label {
            color: gold;
        }
    </style>
@endsection
