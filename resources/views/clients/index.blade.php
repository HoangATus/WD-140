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
        @else
            <p class="text-center text-success">Hiện tại không có banner nào đang hoạt động.</p>
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

    <!-- Sản phẩm Section Start -->
    <div class="container">

        <div class="container-fluid-lg">

            <div class="section-b-space">
                <div class="title">
                    <h2>SẢN PHẨM</h2>
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
                                <div class="product-detail">
                                    <div class="product-name">
                                        <a
                                            href="{{ route('products.show', $product->slug) }}">{{ $product->product_name }}</a>
                                    </div>
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

                                    <div class="addd mt-2">
                                        <form action="{{ route('clients.favorites.store') }}" method="POST">
                                            @csrf

                                            <button class="cart" name="product_id" value="{{ $product->id }}"
                                                type="submit">
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-regular fa-heart"></i>
                                                </span>
                                            </button>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-xxl-4 col-xl-12 col-md-5">
                        <img src="{{ asset('assets/clients/images/fashion/banner/2.jpg') }}"
                            class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4 h-100">
                            <div>
                                <h2 class="text-kaushan fw-normal text-danger">Thiết kế hiện đại và hợp thời </h2>
                                <h3 class="mt-2 mb-2 theme-color">Chất lượng cao</h3>
                                <h3 class="fw-normal product-name text-title">Giá cả hợp lý</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
