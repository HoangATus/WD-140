@extends('clients.layouts.client')

@section('content')

<div class="container mt-5">
    <div class="container-fluid-lg">
        @if (session('errorss'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('errorss') }}
        </div>
    @endif
    <h2>Thanh toán thất bại</h2>
    <br>
    <p>Đơn hàng <strong>#{{ $order->order_code }}</strong> của bạn chưa được thanh toán thành công. Vui lòng thử
        lại hoặc liên hệ với chúng tôi để được hỗ trợ.</p>
    Đơn hàng của bạn được đặt lúc {{ $order->created_at }} 'Nếu các đơn hàng không thanh toán hệ thống sẽ tự hủy đơn hàng sau 24 giờ kể từ khi đặt hàng'
    <p>Thời gian còn lại: <strong id="countdown" class="text-"></strong></p>
  
    <div class="d-flex justify-content-center align-items-center m-4">
    <a href="{{  route('orders.show', $order->id) }}"  class="btn btn-warning me-3"
            style="font-size: 14px; padding: 8px 16px; border-radius: 8px; background-color: #ffd767;"  >Đơn hàng</a>
   
        <a href="{{ url('/') }}" class="btn btn-primary"
            style="font-size: 14px; padding: 8px 16px; border-radius: 8px;background-color: #0077ff; text-decoration: none;">
           Trang Chủ
        </a>
    </div>
</div>
  <section class="product-list-section section-b-space">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Sản phẩm liên quan</h2>
            <span class="title-leaf">
                <svg class="icon-width">
                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-6_1 product-wrapper" >
                    @foreach ($relatedProducts as $relatedProduct)
                        <div >
                            <div class="product-box-3 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{ route('products.show', $relatedProduct->slug) }}">
                                            <img src="{{ Storage::url($relatedProduct->product_image_url) }}"
                                                class="img-fluid blur-up lazyload"
                                                alt="{{ $relatedProduct->product_name }}">
                                        </a>
                                    </div>
                                </div>

                                <div class="product-details">
                                    <div class="product-name">
                                        <a style="color: black"
                                            href="{{ route('products.show', $relatedProduct->slug) }}">{{ $relatedProduct->product_name }}</a>
                                    </div>
                                    <div class="product-ratin custom-rate">
                                        <ul class="rating" style="display: flex; justify-content: center">
                                            @php
                                                $averageRating = $relatedProduct->ratings->avg('rating'); 
                                            @endphp

                                            @for ($i = 1; $i <= 5; $i++)
                                                <li>
                                                    @if ($i <= $averageRating)
                                                        <i data-feather="star" class="fill"></i> 
                                                    @else
                                                        <i data-feather="star"></i> 
                                                    @endif
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                    @if ($relatedProduct->variants->isNotEmpty())
                                        @php
                                            $firstVariant = $relatedProduct->variants->first();
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


                                    <div class="add-buttons d-flex align-items-center">
                                        <button class="cart" onclick="addToCart()">
                                            Thêm vào giỏ
                                            <span class="add-icon bg-light-gray">
                                                <i class="bi bi-cart"></i>
                                            </span>
                                        </button>

                                        <form action="{{ route('clients.favorites.store') }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button class="cart-icon" name="product_id" value="{{ $relatedProduct->id }}"
                                                type="submit">
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<style>
    .note-box {
        margin-bottom: 40px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .product-box {
        border: 1px solid #ccc;
        border-radius: 15px;
        padding: 15px;
        transition: transform 0.2s;
        background-color: #fff;
        overflow: hidden;
        display: flex;
        flex-direction: column;
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


    .product-details {
        text-align: center;
        flex: 1;
    }

    .product-name {
        font-weight: bold;
        color: #333;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
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

    .add-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .cart {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #417394;
        color: white;
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.2s, border-color 0.2s;
        font-weight: bold;
        padding: 5px 11px;
        font-size: 13px;
    }

    .cart-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #417394;
        color: white;
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.2s, border-color 0.2s;
        font-weight: bold;
        padding: 6px;
        font-size: 15px;
    }

    .add-icon {
        margin-left: 5px;
    }

    .cart:hover {
        background-color: #355c74;
        transform: scale(1.05);
        border-color: #355c74;
        border: none;
    }

    .cart-icon:hover {
        background-color: #417394;
        color: white;
        transform: scale(1.05);
        border-color: #355c74;
        border: none;
    }
</style>
<script>
    let remainingTime = {{ $remainingTime }};
    function formatTime(seconds) {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const secs = seconds % 60;
        return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    document.getElementById('countdown').innerText = formatTime(remainingTime);

    let timer = setInterval(() => {
        remainingTime--;

        if (remainingTime <= 0) {
            clearInterval(timer);
            document.getElementById('countdown').innerText = "Hết giờ!";
        } else {
            document.getElementById('countdown').innerText = formatTime(remainingTime);
        }
    }, 1000);
</script>
@endsection
