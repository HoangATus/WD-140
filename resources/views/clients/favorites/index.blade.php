@extends('clients.layouts.client')

@section('content')
    <section class="home-section-2 home-section-bg pt-0 overflow-hidden">
        @if ($banners->count() > 0)
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners as $id => $banner)
                            <div class="carousel-item {{ $id == 0 ? 'active' : '' }}"
                                style="height: 410px; position: relative;">
                                <img class="img-fluid" src="{{ Storage::url($banner->image) }}" alt="Banner Image"
                                    style="height: 100%; width: 100%; object-fit: cover;">

                                <div class="overlay"
                                    style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(148, 142, 142, 0.3);">
                                </div>


                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                                    style="z-index: 2;">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ $banner->title }}
                                        </h4>
                                        <a href="{{ route('shop.category', ['id' => $banner->id]) }}" class="button-custom">
                                            Xem Ngay</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        @else
            <p class="text-center text-success">Hiện tại không có banner nào đang hoạt động.</p>
        @endif
    </section>
    <div class="container-fluid-lg mt-5">
        <div class="section-b-space">
            <div class="title">
                <h2 class= "text-center">Danh Sách Sản Phẩm Yêu Thích</h2>
            </div>
            <div class="container">
                @if (session('errorss'))
                    <div class="alert alert-danger">
                        {{ session('errorss') }}
                    </div>
                @endif

                @if (session('successyy'))
                    <div class="alert alert-success">
                        {{ session('successyy') }}
                    </div>
                @endif

                @if ($favorites->isEmpty())
                    <p>Không có sản phẩm nào trong danh sách yêu thích.</p>
                @else
                    <div class="product-grid">
                        @foreach ($favorites as $favorite)
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="{{ route('products.show', $favorite->product->slug) }}">
                                        <img src="{{ Storage::url($favorite->product->product_image_url) }}"
                                            class="img-fluid" alt="{{ $favorite->product->product_name }}">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <div class="product-name">
                                        <a
                                            href="{{ route('products.show', $favorite->product->slug) }}">{{ $favorite->product->product_name }}</a>
                                    </div>
                                    <div class="product-rating custom-rate">
                                        <ul class="rating">
                                            @php
                                                $averageRating = $favorite->product->ratings->avg('rating');
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

                                    <div class="add-buttons d-flex align-items-center">
                                        <button class="cart" onclick="addToCart()">
                                            Thêm vào giỏ
                                            <span class="add-icon bg-light-gray">
                                                <i class="bi bi-cart"></i>
                                            </span>
                                        </button>
                                        <form action="{{ route('clients.favorites.destroy', $favorite->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="cart-icon"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi danh sách yêu thích?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <style>
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

        .product-rating {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
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
            font-size: 16px;
            color: #d9534f;
            font-weight: bold;
        }

        .listed-price {
            font-size: 13px;
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
            padding: 6px 15px;
            font-size: 12px;
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
            background-color: #ff0000;
            color: white;
            transform: scale(1.05);
            border-color: #355c74;
            border: none;
        }
    </style>
@endsection
