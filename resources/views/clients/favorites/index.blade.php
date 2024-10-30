@extends('clients.layouts.client')

@section('content')
    <div class="container">

        <div class="container-fluid-lg">
            <div class="section-b-space">
                <div class="title">
                    <h2>Danh Sách Sản Phẩm Yêu Thích</h2>
                </div>
                <div class="container">
                    @if (session('successy'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('successy') }}
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
                                                    $averageRating = $favorite->product->ratings->avg('rating'); // Tính trung bình số sao
                                                @endphp

                                                @for ($i = 1; $i <= 5; $i++)
                                                    <li>
                                                        @if ($i <= $averageRating)
                                                            <i data-feather="star" class="fill"></i> <!-- Sao đầy -->
                                                        @else
                                                            <i data-feather="star"></i> <!-- Sao rỗng -->
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
            /* Để tự động điều chỉnh kích thước */
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
            /* Adds space between the two buttons */
            margin-top: 10px;
        }

        .cart {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #417394;
            color: white;
            border: 2px solid transparent;
            /* Add transparent border for consistent button size */
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
            /* Add transparent border for consistent button size */
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

        /* Hover effects */
        .cart:hover {
            background-color: #355c74;
            transform: scale(1.05);
            border-color: #355c74;
            border: none;
            /* Ensure border matches background color */
        }

        .cart-icon:hover {
            background-color: #ff0000;
            color: white;
            /* Change icon color on hover */
            transform: scale(1.05);
            border-color: #355c74;
            border: none;
            /* Darker border on hover */
        }
    </style>
@endsection
