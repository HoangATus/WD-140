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
                                            <h6 class="ls-expanded text-uppercase text-danger">Khuyến mãi đặc biệt cuối tuần
                                            </h6>
                                            <h1 class="heding-2">Chất lượng cao cấp</h1>
                                            <h5 class="text-content">Các loại trái cây sấy khô tươi ngon và chất lượng hàng
                                                đầu có sẵn tại đây!</h5>
                                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto">Mua
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
    <!-- Phần Mục Lục Bắt Đầu -->
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
                                    <h5>Quần dài</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.1s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/cords.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Bộ đồ</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.15s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/jacket.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Áo khoác</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.2s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/blzer.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Áo vest</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.25s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/shapewear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Đồ định hình</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.3s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/sleepwear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Đồ ngủ</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.35s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/swimwear.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Đồ bơi</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box category-dark wow fadeInUp"
                                data-wow-delay="0.4s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/fashion/gown.svg"
                                        class="blur-up lazyload" alt="">
                                    <h5>Váy dạ hội</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần Mục Lục Kết Thúc -->


    <!-- Phần Giảm Giá Bắt Đầu -->
    <section class="product-section product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Mặt Hàng Bán Chạy</h2>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo khoác khadi màu nâu</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo thun trắng</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo blazer có mũ</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo sơ mi chấm bi đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo khoác nâu dài</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Áo khoác chấm bi đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Phần Giảm Giá Kết Thúc -->

    <!-- Phần Banner Bắt Đầu -->
    <section>
        <div class="container-fluid-lg">
            <div class="row g-md-4 g-3">
                <div class="col-xxl-8 col-xl-12 col-md-7">
                    <div class="banner-contain hover-effect">
                        <img src="{{ asset('assets/clients/images/fashion/banner/1.jpg') }}"
                            class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4">
                            <div>
                                <h2 class="text-kaushan fw-normal theme-color">Hãy Sẵn Sàng Để</h2>
                                <h3 class="mt-2 mb-3">ĐÓN NHẬN NGÀY MỚI!</h3>
                                <p class="text-content banner-text">Trong xuất bản và thiết kế đồ họa, Lorem
                                    ipsum là văn bản mẫu thường được sử dụng để minh họa.</p>
                                <button onclick="location.href = 'shop-left-sidebar.html';"
                                    class="btn btn-animation btn-sm mend-auto">Mua Ngay <i
                                        class="fa-solid fa-arrow-right icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-12 col-md-5">
                    <a href="shop-left-sidebar.html" class="banner-contain hover-effect h-100">
                        <img src="{{ asset('assets/clients/images/fashion/banner/2.jpg') }}"
                            class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4 h-100">
                            <div>
                                <h2 class="text-kaushan fw-normal text-danger">Giảm 20%</h2>
                                <h3 class="mt-2 mb-2 theme-color">TÓM TẮT</h3>
                                <h3 class="fw-normal product-name text-title">Sản phẩm</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần Banner Kết Thúc -->


    <div class="container">

    </div>


    <br><br>
    {{-- Sản phẩm chính --}}
    <div class="container-fluid-lg">

        <div class="product-box-slider-2 no-arrow">
            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <br><br>
        <div class="product-box-slider-2 no-arrow">
            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://product.hstatic.net/200000690725/product/fwcw005-4_54025105793_o_a1f9bc18a6664280bf1ba56c04f84dbc_master.jpg"
                            alt="Áo khoác gió 2 lớp cổ bomber">
                        <div class="hover-buttons">
                            <button class="add-to-cart">THÊM VÀO GIỎ</button>
                            <button class="view-details">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">

                        <div class="variants">
                            <span>+4 Màu sắc</span>
                            <span>+4 Kích thước</span>
                        </div>
                        <h3 class="product-name">Áo khoác gió 2 lớp cổ bomber FWCW005</h3>
                        <span class="product-code">FWCW005</span>
                        <div class="price">
                            <span class="new-price">449,000đ</span>
                            <span class="old-price">650,000đ</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- Phần Giảm Giá Bắt Đầu -->
    <section class="product-section product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Mặt Hàng Bán Chạy</h2>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy Dạ Hội Đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy Dạ Hội Đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy Dạ Hội Đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy Dạ Hội Đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy Dạ Hội Đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
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
                                        data-bs-placement="top" title="Danh sách yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Danh sách yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy Dạ Hội Đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>$28.56</del>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần Giảm Giá Kết Thúc -->

    <!-- Khu vực Sản phẩm Bán chạy Bắt đầu -->
    <section class="product-section product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Sản phẩm bán chạy nhất</h2>
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
                                        data-bs-placement="top" title="Yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Các sản phẩm tiếp theo có cấu trúc tương tự -->
                        <div>
                            <div class="product-box-5 wow fadeInUp">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{ asset('assets/clients/images/fashion/product/2.jpg') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Tiếp tục cho các sản phẩm 3 đến 6 -->
                        <div>
                            <div class="product-box-5 wow fadeInUp">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{ asset('assets/clients/images/fashion/product/3.jpg') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy đen</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">$26.69</span>
                                        <del>28.56</del>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Các sản phẩm 4, 5, 6 tương tự -->
                        <div>
                            <div class="product-box-5 wow fadeInUp">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{ asset('assets/clients/images/fashion/product/4.jpg') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy đen</h5>
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
                                        data-bs-placement="top" title="Yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy đen</h5>
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
                                        data-bs-placement="top" title="Yêu thích">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="So sánh">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Yêu thích">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">Váy đen</h5>
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
    <!-- Khu vực Sản phẩm Bán chạy Kết thúc -->

    <!-- Khu vực Bản tin Thư điện tử Bắt đầu -->
    <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2">
                <div class="newsletter-contain py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                                <div class="newsletter-detail">
                                    <h2>Tham gia bản tin của chúng tôi và nhận...</h2>
                                    <h5>Giảm $20 cho đơn hàng đầu tiên của bạn</h5>
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Nhập email của bạn">
                                        <i class="fa-solid fa-envelope arrow"></i>
                                        <button class="sub-btn btn-animation">
                                            <span class="d-sm-block d-none">Đăng ký</span>
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
    <!-- Khu vực Bản tin Thư điện tử Kết thúc -->
@endsection
