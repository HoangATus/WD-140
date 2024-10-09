@extends('clients.layouts.client')

@section('content')
    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">

                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">Quần short kaki basic FSBK019</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            <div>

                                                <div class="slider-image">
                                                    <img src="{{ Storage::url($products->product_image_url) }}"
                                                        id="img-1"
                                                        data-zoom-image="{{ Storage::url($products->product_image_url) }}"
                                                        class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                </div>

                                            </div>

                                            <div>
                                                @foreach ($products->variants as $variant)
                                                    <div class="slider-image">
                                                        <img src="{{ Storage::url($variant->image) }}"
                                                            data-zoom-image="{{ Storage::url($variant->image) }}"
                                                            class="img-fluid image_zoom_cls-1 blur-up lazyload"
                                                            alt="">
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                        <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="{{ Storage::url($products->product_image_url) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                @foreach ($products->variants as $variant)
                                                    <div class="slider-image">
                                                        <img src="{{ Storage::url($variant->image) }}"
                                                            data-zoom-image="{{ Storage::url($variant->image) }}"
                                                            class="img-fluid image_zoom_cls-1 blur-up lazyload"
                                                            alt="">
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                {{-- <h6 class="offer-top">Giảm giá 30%</h6> --}}
                                <h2 class="name">{{ $products->product_name }}</h2>

                                <p>Mã sản phẩm <b>:{{ $products->product_code }}</b></p>
                                <div class="product-status">
                                    <span
                                        class="badge 
                                        @if ($products->stock_status == 'Hết hàng') bg-danger 
                                        @elseif($products->stock_status == 'Sắp hết hàng') 
                                            bg-warning text-dark 
                                        @else 
                                            bg-success @endif">
                                        {{ $products->stock_status }}
                                    </span>
                                </div>
                                <div class="price-rating">
                                    @foreach ($products->variants as $variant)
                                        <h3 class="theme-color price">
                                            {{ number_format($variant->variant_sale_price, 0, ',', '.') }} ₫<del
                                                class="text-content">{{ number_format($variant->variant_listed_price, 0, ',', '.') }}
                                                ₫</del>
                                    @endforeach
                                    <div class="product-rating custom-rate">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                        {{-- <span class="review">23 Customer Review</span> --}}
                                    </div>
                                </div>

                                <div class="product-contain">
                                    <p> </p>
                                </div>

                                <div class="product-options">
                                    <div class="option-title">Màu sắc:</div>
                                    @foreach ($products->variants as $variant)
                                        <div class="option-list" id="color-options">
                                            <div class="option-item option-item-color"
                                                style="{{ $variant->quantity > 0 ? '' : 'color: red; pointer-events: none;' }}">
                                                {{ $variant->color->name ?? '' }}
                                                @if ($variant->quantity > 0)
                                                    <span class="stock-quantity">({{ $variant->quantity }})</span>
                                                @else
                                                    <span class="stock-status">(Hết)</span>
                                                @endif
                                            </div>
                                        </div>
                                </div>

                                <div class="product-options">
                                    <div class="option-title">Kích thước:</div>
                                    <div class="option-list" id="size-options">
                                        <div class="option-item option-item-size"
                                            style="{{ $variant->quantity > 0 ? '' : 'color: red; pointer-events: none;' }}">
                                            {{ $variant->size->attribute_size_name ?? '' }}
                                            @if ($variant->quantity > 0)
                                                <span class="stock-quantity">({{ $variant->quantity }})</span>
                                            @else
                                                <span class="stock-status">(Hết)</span>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="note-box product-package">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="0" min="1">
                                            <button type="button" class="qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md bg-dark cart-button text-white w-50">Thêm vào giỏ</button>
                                    <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md bg-danger cart-button text-white w-50">Mua ngay</button>
                                </div>

                                <div class="payment-option">
                                    <div class="product-title">
                                        {{-- <h4>Đảm bảo thanh toán an toàn</h4> --}}
                                    </div>
                                    {{-- <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/1.svg"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/2.svg"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/3.svg"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/4.svg"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/5.svg"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                        </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="product-section-box">
                            <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab">Mô tả</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                        type="button" role="tab">Đánh giá từ khách
                                        hàng</button>
                                </li>


                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                        data-bs-target="#review" type="button" role="tab">Review</button>
                                </li> --}}
                            </ul>

                            <div class="tab-content custom-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="product-description">
                                        <div class="nav-desh">
                                            <p>{{ $products->description }}</p>
                                        </div>

                                        <div class="nav-desh">
                                            <div class="desh-title">
                                                <h5></h5>
                                            </div>
                                            <p> <br>

                                            </p>
                                        </div>

                                        {{-- <div class="banner-contain nav-desh">
                                            <img src="https://file.hstatic.net/200000690725/file/z4341084551984_7eb7d524487f0a688af347c79701f706_592820eb2f1d4e238c85c2b4301ca8fc_grande.jpg"
                                                class=" blur-up lazyload" alt="">
                                            <div class="banner-details p-center banner-b-space w-100 text-center">
    
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="info" role="tabpanel">
                                    <div class="table-responsive">

                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Related Product Section Start -->
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
                    <div class="slider-6_1 product-wrapper">
                        {{--  --}}
                        @foreach ($relatedProducts as $relatedProduct)
                            <div>
                                <div class="product-box-3 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-2.html">
                                                <img src="{{ Storage::url($relatedProduct->product_image_url) }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name"></span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">{{ $relatedProduct->product_name }}</h5>
                                            </a>
                                            <div class="product-rating mt-2">
                                                <ul class="rating">
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                </ul>
                                                {{-- <span>(5.0)</span> --}}
                                            </div>
                                            @foreach ($relatedProduct->variants as $variant)
                                                <h5 class="price"><span
                                                        class="theme-color">{{ number_format($variant->variant_sale_price, 0, ',', '.') }}₫
                                                    </span>
                                                    <del>{{ number_format($variant->variant_listed_price, 0, ',', '.') }}
                                                        ₫</del>
                                                </h5>
                                            @endforeach
                                            <div class="add-to-cart-box bg-white">
                                                <button class="btn btn-add-cart addcart-button"><i
                                                        class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Thêm vào
                                                    giỏ</button>
                                                <div class="cart_qty qty-box">
                                                    <div class="input-group bg-white">
                                                        <button type="button" class="qty-left-minus bg-gray"
                                                            data-type="minus" data-field="">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                            name="quantity" value="0">
                                                        <button type="button" class="qty-right-plus bg-gray"
                                                            data-type="plus" data-field="">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{--  --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection
