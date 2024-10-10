@extends('clients.layouts.client')

@section('content')
    <section class="home-section-2 home-section-bg pt-0 overflow-hidden">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="slider-animate">
                        <div>
                            <div class="home-contain rounded-0 p-0">
                                <img src="{{ asset('assets/clients/images/fashion/home-banner/1.jpg') }}"
                                    class="img-fluid bg-img blur-up lazyload" alt="">
                                <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                    <div class="container-fluid-lg">
                                        <div>
                                            <h6 class="ls-expanded text-uppercase text-danger">Khuyến Mãi Cuối Tuần
                                            </h6>
                                            <h1 class="heding-2">Chất Lượng Cao Cấp</h1>
                                            <h5 class="text-content">Quần áo chất lượng có sẵn ở đây!
                                            </h5>
                                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto">Xem
                                                ngay <i class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-9">
                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/t-shirt.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Áo thun</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.05s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jeans.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Bomber</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.1s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/cords.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Vest</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.15s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jacket.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>jacket</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.2s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/blzer.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Quần tây</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.25s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/shapewear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Quần jean</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.3s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/sleepwear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Quần ống rộng</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Deal Section Start -->
    {{-- <section class="product-section product-section-3">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Top Selling Items</h2>
        </div>
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-12 ratio_110">
                <div class="slider-6 img-slider">
                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/1.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="yêu thích-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="yêu thích">
                                    <i data-feather="bookmark"></i>
                                </a>

                                <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                        <a href="yêu thích.html" class="notifi-yêu thích">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">brown khadi jacket</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">200.000 vnd</span>
                                    <del>400.000</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/2.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="yêu thích-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="yêu thích">
                                    <i data-feather="bookmark"></i>
                                </a>

                                <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                        <a href="yêu thích.html" class="notifi-yêu thích">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">white top</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">200.000 vnd</span>
                                    <del>400.000</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/3.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="yêu thích-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="yêu thích">
                                    <i data-feather="bookmark"></i>
                                </a>

                                <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                        <a href="yêu thích.html" class="notifi-yêu thích">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">blazer with cap</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">200.000 vnd</span>
                                    <del>400.000</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/4.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="yêu thích-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="yêu thích">
                                    <i data-feather="bookmark"></i>
                                </a>

                                <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                        <a href="yêu thích.html" class="notifi-yêu thích">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black dotted shirt</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">200.000 vnd</span>
                                    <del>400.000</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/5.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="yêu thích-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="yêu thích">
                                    <i data-feather="bookmark"></i>
                                </a>

                                <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                        <a href="yêu thích.html" class="notifi-yêu thích">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">long brown jacket</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">200.000 vnd</span>
                                    <del>400.000</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/6.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="yêu thích-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="yêu thích">
                                    <i data-feather="bookmark"></i>
                                </a>

                                <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                        <a href="yêu thích.html" class="notifi-yêu thích">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black dotted jacket</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">200.000 vnd</span>
                                    <del>400.000</del>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}


    <div class="container">

    </div>

    <!-- banner section start -->
    <br><br>
    <!-- banner section start -->
    <div class="container-fluid-lg">
        <div class="section-b-space">
            <div class="title">
                <h2>SẢN PHẨM </h2>
            </div>
            <div class="container">
                <div class="product-grid">
                    @foreach ($products as $product)
                        <div class="product-box">
                            <div class="product-image">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ Storage::url($product->product_image_url) }}" class="img-fluid"
                                        alt="{{ $product->product_name }}">
                                </a>
                            </div>
                            <div class="product-detail mt-2">
                                <a href="{{ route('product.index' , $product->slug) }}">
                                    <h5 class="product-name">{{ $product->product_name }}</h5>
                                </a>
                                @foreach ($product->variants as $variant)
                                    <del> {{ number_format($variant->variant_listed_price, 0, ',', '.') }} VND
                                    </del>
                                    <a class="text-danger"> {{ number_format($variant->variant_sale_price, 0, ',', '.') }}
                                        VND
                                    </a>
                                @endforeach
                                <!-- Nút "Xem ngay" -->
                                <div class="mt-3">
                                    <a href="{{ route('product.index' , $product->slug) }}" class="btn btn-secondary">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <style>
                .product-grid {
                    display: grid;
                    grid-template-columns: repeat(5, 1fr);
                    /* 5 cột mỗi hàng */
                    gap: 20px;
                    /* Khoảng cách giữa các sản phẩm */
                }

                .product-box {
                    border: 1px solid #ccc;
                    border-radius: 15px;
                    padding: 15px;
                    transition: transform 0.2s;
                }

                .product-box:hover {
                    transform: scale(1.05);
                    /* Hiệu ứng phóng to khi hover */
                }

                .product-image img {
                    border-radius: 8px;
                    max-width: 100%;
                    height: auto;
                }

                .btn-primary {
                    background-color: #007bff;
                    border: none;
                    padding: 10px 20px;
                    color: white;
                    text-transform: uppercase;
                    cursor: pointer;
                    text-align: center;
                    display: inline-block;
                }

                /* .btn-primary:hover {
                    background-color: #0056b3;
                } */
            </style>


        </div>
    </div>
    <section>
        <div class="container-fluid-lg">
            <div class="row g-md-4 g-3">
                <div class="col-xxl-8 col-xl-12 col-md-7">
                    <div class="banner-contain hover-effect">
                        <img src="{{ asset('assets/clients/images/fashion/banner/1.jpg') }}" class="bg-img blur-up lazyload"
                            alt="">
                        <div class="banner-details p-center-left p-4">
                            <div>
                                <h2 class="text-kaushan fw-normal theme-color">Chúng tôi có</h2>
                                <h3 class="mt-2 mb-3">SẢN PHẨM CHÂT LƯỢNG</h3>
                                <p class="text-content banner-text">Shop thời trang nam ATUS là một thương hiệu thời trang
                                    dành riêng cho nam giới, chuyên cung cấp các sản phẩm chất lượng cao, phù hợp với xu
                                    hướng hiện đại.</p>
                                <SECtion>

                                </SECtion>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-12 col-md-5">
                    <img src="{{ asset('assets/clients/images/fashion/banner/2.jpg') }}" class="bg-img blur-up lazyload"
                        alt="">
                    <div class="banner-details p-center-left p-4 h-100">
                        <div>
                            <h2 class="text-kaushan fw-normal text-danger">Thiết kế hiện đại và hợp thời </h2>
                            <h3 class="mt-2 mb-2 theme-color">Chất lượng cao</h3>
                            <h3 class="fw-normal product-name text-title">Giá cả hợp lý</h3>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Section Start -->
    <section class="product-section product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>SẢN PHẨM BÁN CHẠY</h2>
            </div>
            <div class="container">
                <div class="product-grid">
                    @foreach ($products as $product)
                        <div class="product-box">
                            <div class="product-image">
                                <a href="{{ url('product/' . $product->slug) }}">
                                    <img src="{{ Storage::url($product->product_image_url) }}" class="img-fluid"
                                        alt="{{ $product->product_name }}">
                                </a>
                            </div>
                            <div class="product-detail mt-2">
                                <a href="{{ url('product/' . $product->slug) }}">
                                    <h5 class="product-name">{{ $product->product_name }}</h5>
                                </a>
                                @foreach ($product->variants as $variant)
                                    <del> {{ number_format($variant->variant_listed_price, 0, ',', '.') }} VND
                                    </del>
                                    <a class="text-danger"> {{ number_format($variant->variant_sale_price, 0, ',', '.') }}
                                        VND
                                    </a>
                                @endforeach
                                <!-- Nút Xem ngay -->
                                <div class="mt-3">
                                    <a href="{{ url('product/' . $product->slug) }}" class="btn btn-secondary">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- Deal Section End -->

    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
    </section>
    <!-- Newsletter Section End -->
@endsection
