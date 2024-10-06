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
                                        <h6 class="ls-expanded text-uppercase text-danger">Weekend Special offer
                                        </h6>
                                        <h1 class="heding-2">Premium Quality</h1>
                                        <h5 class="text-content">Fresh & Top Quality Dry Fruits are available here!
                                        </h5>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto">Shop
                                            Now <i class="fa-solid fa-arrow-right icon"></i></button>
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
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/t-shirt.svg" class="blur-up lazyload" alt="">
                                <h5>tops</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.05s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jeans.svg" class="blur-up lazyload" alt="">
                                <h5>bottoms</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.1s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/cords.svg" class="blur-up lazyload" alt="">
                                <h5>co-ords</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.15s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jacket.svg" class="blur-up lazyload" alt="">
                                <h5>jackets</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.2s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/blzer.svg" class="blur-up lazyload" alt="">
                                <h5>blazers</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.25s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/shapewear.svg" class="blur-up lazyload" alt="">
                                <h5>shapewear</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.3s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/sleepwear.svg" class="blur-up lazyload" alt="">
                                <h5>sleepwear</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.35s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/swimwear.svg" class="blur-up lazyload" alt="">
                                <h5>swimwear</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.4s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/gown.svg" class="blur-up lazyload" alt="">
                                <h5>Gown</h5>
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
<section class="product-section product-section-3">
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

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
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
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
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

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
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
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
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

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
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
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
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

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
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
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
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

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
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
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
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

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
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
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Deal Section End -->

<!-- banner section start -->
<section>
    <div class="container-fluid-lg">
        <div class="row g-md-4 g-3">
            <div class="col-xxl-8 col-xl-12 col-md-7">
                <div class="banner-contain hover-effect">
                    <img src="{{ asset('assets/clients/images/fashion/banner/1.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details p-center-left p-4">
                        <div>
                            <h2 class="text-kaushan fw-normal theme-color">Get Ready To</h2>
                            <h3 class="mt-2 mb-3">TAKE ON THE DAY!</h3>
                            <p class="text-content banner-text">In publishing and graphic design, Lorem
                                ipsum is a placeholder text commonly used to demonstrate.</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                    class="fa-solid fa-arrow-right icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-12 col-md-5">
                <a href="shop-left-sidebar.html" class="banner-contain hover-effect h-100">
                    <img src="{{ asset('assets/clients/images/fashion/banner/2.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details p-center-left p-4 h-100">
                        <div>
                            <h2 class="text-kaushan fw-normal text-danger">20% Off</h2>
                            <h3 class="mt-2 mb-2 theme-color">SUMMRY</h3>
                            <h3 class="fw-normal product-name text-title">Product</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- banner section end -->

 <div class="container">
    
 </div>

<!-- banner section start -->
 <br><br>
<!-- banner section start -->
<div class="container-fluid-lg">
    <div class="section-b-space">
        <div class="product-border border-row overflow-hidden">
            <div class="product-box-slider no-arrow">
                <div>
                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/1.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Fantasy Crunchy Choco Chip Cookies</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/2.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Cold Brew Coffee Instant Coffee 50 g</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
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
                </div>

                <div>
                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/3.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Peanut Butter Bite Premium Butter Cookies 600 g
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="label-tag">
                                    <span>NEW</span>
                                </div>
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/4.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">SnackAmor Combo Pack of Jowar Stick and Jowar
                                            Chips</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
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
                </div>

                <div>
                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/5.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Yumitos Chilli Sprinkled Potato Chips 100 g
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/6.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Neu Farm Unpolished Desi Toor Dal 1 kg</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
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
                </div>

                <div>
                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="label-tag">
                                    <span>NEW</span>
                                </div>
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/7.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">healthy Long Life Toned Milk 1 L</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/8.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Dog Treats Natural Yak Milk Bars For Small Dogs
                                            100g</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
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
                </div>

                <div>
                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/9.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Raw Mutton Leg, Packaging 5 Kg</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/10.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Blended Instant Coffee 50 g Buy 1 Get 1 Free
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
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
                </div>

                <div>
                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/3.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Peanut Butter Bite Premium Butter Cookies 600 g
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="../assets/images/vegetable/product/5.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Yumitos Chilli Sprinkled Potato Chips 100 g
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-sm-2 mt-1">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input"
                                                    type="text" name="quantity" value="0">
                                                <button type="button" class="qty-right-plus"
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Section Start -->
<section class="product-section product-section-3">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Top Selling Items</h2>
        </div>
        <div class="row g-sm-4 g-3 section-b-space">
            <div class="col-xxl-12 ratio_110">
                <div class="slider-6 img-slider">
                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/7.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black Gown</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/8.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black Gown</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/9.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black Gown</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/10.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black Gown</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/11.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black Gown</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-5 wow fadeInUp">
                            <div class="product-image">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{ asset('assets/clients/images/fashion/product/12.jpg') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>

                                <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Wishlist">
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

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name">Black Gown</h5>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">$26.69</span>
                                    <del>28.56</del>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Deal Section End -->

    <!-- Deal Section Start -->
    <section class="product-section product-section-3">
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

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
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

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Black Gown</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
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

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
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

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Black Gown</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
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

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
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

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Black Gown</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
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

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
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

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Black Gown</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
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

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
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

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Black Gown</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
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

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
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

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Black Gown</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Section End -->

    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2">
                <div class="newsletter-contain py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                                <div class="newsletter-detail">
                                    <h2>Join our newsletter and get...</h2>
                                    <h5>$20 discount for your first order</h5>
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Your Email">
                                        <i class="fa-solid fa-envelope arrow"></i>
                                        <button class="sub-btn  btn-animation">
                                            <span class="d-sm-block d-none">Subscribe</span>
                                            <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->
@endsection