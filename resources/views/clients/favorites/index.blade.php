@extends('clients.layouts.client')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif

    <h1 style="font-size: 30px;">Danh Sách Sản Phẩm Yêu Thích</h1>

    @if ($favorites->isEmpty())
    <p>Không có sản phẩm nào trong danh sách yêu thích.</p>
    @else
    <ul>
        @foreach ($favorites as $favorite)
        <div class="product-box mt-3">
            <div class="product-image">
                <a href="{{ route('products.show', $favorite->product->slug) }}">
                    <img src="{{ Storage::url($favorite->product->product_image_url) }}" class="img-fluid"
                        alt="{{$favorite->product->product_name}}">
                </a>
            </div>
            <div class="product-detail">
                <div class="product-name">
                    <a
                        href="{{ route('products.show', $favorite->product->slug) }}">{{$favorite->product->product_name }}</a>
                </div>
                @if ($favorite->product->variants->isNotEmpty())
                @php
                $firstVariant = $favorite->product->variants->first();
                @endphp
                <div class="price">
                    <div class="sale-price">
                        {{ number_format($firstVariant->variant_sale_price, 0, ',', '.') }} VNĐ
                    </div>
                    <div class="listed-price">
                        <del>{{ number_format($firstVariant->variant_listed_price, 0, ',', '.') }}
                            VNĐ</del>
                    </div>
                </div>
                @endif

              <div class="actions">
                <div class="add">
                    <button class="cart" onclick="addToCart()" style="font-size: 10px;">Thêm vào giỏ <span class="add-icon bg-light-gray"><i class="bi bi-cart"></i>
                        </span>
                    </button>
                </div>
                
                <div class="destroy">
                    <form action="{{ route('clients.favorites.destroy', $favorite->id) }}" method="POST" style="margin-top: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cart delete-favorite" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi danh sách yêu thích?')" style="font-size: 10px;">
                            <span class="add-icon bg-light-gray">
                                <i class="bi bi-trash"></i>
                            </span>
                        </button>
                    </form>
                </div>
              </div>
                

            </div>
        </div>

        @endforeach
    </ul>
</div>
@endif

{{-- <style>
    .container ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        /* Căn đều khoảng cách giữa các sản phẩm */
        gap: 15px;
        /* Khoảng cách giữa các sản phẩm */
        padding: 0;
    }

    .product-box {
        width: 17%;
        /* Chia đều 5 sản phẩm (5 x 19% = 95% và 5% là khoảng trống giữa các sản phẩm) */
        border: 1px solid #ccc;
        border-radius: 15px;
        padding: 15px;
        transition: transform 0.2s;
        background-color: #fff;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
        margin-right: 1%;
        /* Khoảng cách giữa các sản phẩm    */
        padding: 0 auto;
    }

    .product-box:hover {
        transform: scale(1.05);
    }

    .product-image img {
        border-radius: 8px;
        max-width: 100%;
        height: 180px;
        object-fit: cover;
    }


    .product-detail {
        text-align: center;
        flex: 1;
        /* Cho phép nội dung chiếm không gian còn lại */
    }

    .product-name {
        font-weight: bold;
        color: #333;
        white-space: nowrap;
        /* Không xuống dòng */
        overflow: hidden;
        text-overflow: ellipsis;
        /* Nếu tên dài, sẽ hiển thị ... */
    }

    .price {
        margin-top: 10px;
        font-size: 16px;
    }

    .sale-price {
        font-size: 18px;
        color: #d9534f;
        font-weight: bold;
    }

    .listed-price {
        font-size: 14px;
        color: #999;
        text-decoration: line-through;
    }

    .actions {
    display: flex;
    justify-content: space-between;
    gap: 10px; /* Khoảng cách giữa 2 nút */
    margin-top: 10px;
    }

    .add, .destroy {
        flex: 1;
    }

    .add {
        display: flex;
        justify-content: center;
        /* Canh giữa nút */
        margin-top: 10px;
    }

    .cart {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        background-color: #417394;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.2s;
        width: 100%;
        /* Để nút chiếm toàn bộ chiều rộng của container */
        max-width: 200px;
        /* Đặt kích thước tối đa để tránh quá lớn */
        text-align: center;
    }

    .cart:hover {
        background-color: #355c74;
        transform: scale(1.05);
        /* Hiệu ứng phóng to nhẹ khi di chuột */
    }

    .add-icon {
        margin-left: 8px;
        display: flex;
        align-items: center;
    }


    /* .add-to-cart-box {
                                    margin-top: 10px;
                                } */

    /* .btn-add-cart {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 10px 15px;
                                    background-color: #417394;
                                    color: white;
                                    border: none;
                                    border-radius: 8px;
                                    font-weight: bold;
                                    cursor: pointer;
                                    transition: background-color 0.2s;
                                } */

    /* .btn-add-cart:hover {
                                    background-color: #355c74;
                                }
                        
                                .add-icon {
                                    margin-left: 8px;
                                } */
</style> --}}
@endsection