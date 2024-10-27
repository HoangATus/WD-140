@extends('clients.layouts.client')

@section('content')
    <!-- Home Section Start -->
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
                                        @if ($banner->link)
                                            <a href="{{ $banner->link }}" class="button-custom">Xem Ngay</a>
                                        @endif
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

            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    @else
    {{-- <p class="text-center text-success">Hiện tại không có banner nào đang hoạt động.</p> --}}
    @endif
</section>
<!-- Home Section End -->

    <!-- Category Section Start -->
    <section>
        <div class="container-fluid-lg">

            <div class="row">
                <div class="col-12">
                    <div class="slider-9">
                        @foreach ($categories as $item)
                            <div>
                                <a href="{{ route('shop.category', ['id' => $item->id]) }}"
                                    class="category-box category-dark wow fadeInUp">
                                    <div>
                                        <img src="{{ \Storage::url($item->cover) }}" class="blur-up lazyload"
                                            alt="">
                                        <h5>{{ $item->name }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

<br>

    <!-- Sản phẩm Section Start -->
    <div class="container">
        <div class="container-fluid-lg">
            <div class="section-b-space">
                <div class="title">
                    <h2>SẢN PHẨM</h2>
                </div>
                {{-- <div class="container"> --}}
                    <div class="product-grid">
                        @foreach ($products as $product)
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <img src="{{ Storage::url($product->product_image_url) }}" class="img-fluid"
                                            alt="{{ $product->product_name }}">
                                    </a>
                                </div>

                                <div class="product-detail mt-2">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <h5 class="product-name">{{ $product->product_name }}</h5>
                                    </a>
                                    {{-- <div class="product-rating mt-2">
                                        <ul class="rating">
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i></li>
                                        </ul>
                                        <span>(4.0)</span>
                                    </div> --}}

                                    @if ($product->variants->isNotEmpty())
                                        @php
                                            $firstVariant = $product->variants->first();
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
                                    <div class="add">
                                        <button class="cart" onclick="addToCart()">Thêm vào giỏ
                                            <span class="add-icon bg-light-gray">
                                                <i class="bi bi-cart"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                            /* Sử dụng flex để căn chỉnh nội dung */
                            flex-direction: column;
                            /* Sắp xếp theo chiều dọc */
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
                    </style>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="container-fluid-lg">
            <div class="row g-md-4 g-3">
                <div class="col-xxl-8 col-xl-12 col-md-7">
                    <div class="banner-contain hover-effect">
                        <img src="{{ asset('assets/clients/images/fashion/banner/1.jpg') }}"
                            class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4">
                            <div>
                                <h2 class="text-kaushan fw-normal theme-color">Chúng tôi có</h2>
                                <h3 class="mt-2 mb-3">SẢN PHẨM CHÂT LƯỢNG</h3>
                                <p class="text-content banner-text">Shop thời trang nam ATUS là một thương hiệu thời trang
                                    dành riêng cho nam giới, chuyên cung cấp các sản phẩm chất lượng cao, phù hợp với xu
                                    hướng hiện đại.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xxl-4 col-xl-12 col-md-5">
                    <img src="{{ asset('assets/clients/images/fashion/banner/2.jpg') }}" class="bg-img blur-up lazyload"
                        alt="">
                    <div class="banner-details p-center-left p-4 h-100">
                        <div>
                            <h2 class="text-kaushan fw-normal text-danger">Thiết kế hiện đại và hợp thời </h2>
                            <h3 class="mt-2 mb-2 theme-color">Chất lượng cao</h3>
                            <h3 class="fw-normal product-name text-title">Giá cả hợp lý</h3>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>


    <!-- Sản phẩm bán chạy Section Start -->
    {{-- <section class="product-section product-section-3">

        <div class="container-fluid-lg">
            <div class="title">
                <h2>SẢN PHẨM BÁN CHẠY</h2>
            </div>
            <div class="container">
                <div class="product-grid">
                    @foreach ($products as $product)
                        <div class="product-box">
                            <div class="product-image">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <img src="{{ Storage::url($product->product_image_url) }}" class="img-fluid"
                                        alt="{{ $product->product_name }}">
                                </a>
                            </div>
                            <div class="product-detail mt-2">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <h5 class="product-name">{{ $product->product_name }}</h5>
                                </a>
                                @if ($product->variants->isNotEmpty())
                                    @foreach ($product->variants as $variant)
                                        <del>{{ number_format($variant->variant_listed_price, 0, ',', '.') }} VND</del>
                                        <a class="text-danger">{{ number_format($variant->variant_sale_price, 0, ',', '.') }} VND</a>
                                    @endforeach
                                @else
                                    <p>Không có biến thể nào</p>
                                @endif
                                <div class="mt-3">
                                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-secondary">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section> --}}
    <!-- Sản phẩm bán chạy Section End -->


    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
    </section>
    <!-- Newsletter Section End -->
@endsection

@section('scripts')
    <script>
        const variants = @json(
            $products->map(function ($product) {
                return $product->variants;
            }));
        console.log(variants);
    </script>
@endsection
