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
                                            class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto">Xem ngay <i class="fa-solid fa-arrow-right icon"></i></button>
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
                                <h5>Áo thun</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.05s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jeans.svg" class="blur-up lazyload" alt="">
                                <h5>Bomber</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.1s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/cords.svg" class="blur-up lazyload" alt="">
                                <h5>Vest</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.15s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jacket.svg" class="blur-up lazyload" alt="">
                                <h5>jacket</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.2s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/blzer.svg" class="blur-up lazyload" alt="">
                                <h5>Quần tây</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.25s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/shapewear.svg" class="blur-up lazyload" alt="">
                                <h5>Quần jean</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                            data-wow-delay="0.3s">
                            <div>
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/sleepwear.svg" class="blur-up lazyload" alt="">
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
<!-- Deal Section End -->

<!-- banner section start -->

<!-- banner section end -->

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
        <div class="product-border border-row overflow-hidden">
            <div class="product-box-slider no-arrow">
                <div>
                    <div class="row m-0">
                        <div class="col-12 px-0">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Áo thun</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/quantay.png') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Quần tây</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/quantay.png') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Quần tây
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Áo khoác</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Áo thun
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/quantay.png') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Quần tây</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Áo khoác</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">   
                                      <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Áo thun</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/quantay.png') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Quần tây</h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Áo khoác
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Áo thun
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
                                        <img src="{{ asset('assets/images/quantay.png') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">

                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">Quần tây
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">200.000 vnd</span>
                                        <del>400.000</del>
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

                                        <h6 class="theme-color">Còn hàng</h6>
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
{{-- <section class="product-section product-section-3">
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
                                    <h5 class="name">Black Gown</h5>
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
                                    <img src="{{ asset('assets/clients/images/fashion/product/8.jpg') }}"
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
                                    <h5 class="name">Black Gown</h5>
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
                                    <img src="{{ asset('assets/clients/images/fashion/product/9.jpg') }}"
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
                                    <h5 class="name">Black Gown</h5>
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
                                    <img src="{{ asset('assets/clients/images/fashion/product/10.jpg') }}"
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
                                    <h5 class="name">Black Gown</h5>
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
                                    <img src="{{ asset('assets/clients/images/fashion/product/11.jpg') }}"
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
                                    <h5 class="name">Black Gown</h5>
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
                                    <img src="{{ asset('assets/clients/images/fashion/product/12.jpg') }}"
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
                                    <h5 class="name">Black Gown</h5>
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
<!-- Deal Section End -->
<section>
    <div class="container-fluid-lg">
        <div class="row g-md-4 g-3">
            <div class="col-xxl-8 col-xl-12 col-md-7">
                <div class="banner-contain hover-effect">
                    <img src="{{ asset('assets/clients/images/fashion/banner/1.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details p-center-left p-4">
                        <div>
                            <h2 class="text-kaushan fw-normal theme-color">Chúng tôi có</h2>
                            <h3 class="mt-2 mb-3">SẢN PHẨM CHÂT LƯỢNG</h3>
                            <p class="text-content banner-text">Shop thời trang nam ATUS là một thương hiệu thời trang dành riêng cho nam giới, chuyên cung cấp các sản phẩm chất lượng cao, phù hợp với xu hướng hiện đại.</p>
                            <SECtion>

                            </SECtion>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-12 col-md-5">
                    <img src="{{ asset('assets/clients/images/fashion/banner/2.jpg') }}" class="bg-img blur-up lazyload" alt="">
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
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-12 ratio_110">
                    <div class="slider-6 img-slider">
                        <div>
                            <div class="product-box-5 wow fadeInUp">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{ asset('assets/images/quantay.png') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Quần tây</h5>
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
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>                               
                                    <ul class="product-option">
                                      
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo khoác</h5>
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
                                        <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo thun</h5>
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
                                    <ul class="product-option">    
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
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
                                        <img src="{{ asset('assets/images/quantay.png') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>
                                    <ul class="product-option">
    
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
                                        <h5 class="name">Quần tây</h5>
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
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>

                                    <ul class="product-option">
                                       
                                       <li data-bs-toggle="tooltip" data-bs-placement="top" title="yêu thích">
                                            <a href="yêu thích.html" class="notifi-yêu thích">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo khoác</h5>
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
    </section>
    <!-- Deal Section End -->

    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
        {{-- <div class="container-fluid-lg">
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
        </div> --}}
    </section>
    <!-- Newsletter Section End -->
@endsection