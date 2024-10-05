<div class="header-top">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-3 d-xxl-block d-none">
                <div class="top-left-header">
                    <i class="iconly-Location icli text-white"></i>
                    <span class="text-white">ATUS</span>
                </div>
            </div>

            <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                <div class="header-offer">
                    <div class="notification-slider">
                        <div>
                            <div class="timer-notification">
                                <h6><strong class="me-1">Chào mừng bạn đến với ATUS!</strong>Chúc bạn một ngày mới
                                    vui vẻ.


                                </h6>
                            </div>
                        </div>

                        <div>
                            <div class="timer-notification">
                                <h6>Hãy bắt đầu mua sắm ngay thôi nào!
                                    <a href="shop-left-sidebar.html" class="text-white">Mua ngay
                                        !</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <ul class="about-list right-nav-about">
                    <li class="right-nav-list">
                        <div class="dropdown theme-form-select">
                            <button class="btn dropdown-toggle" type="button" id="select-language"
                                data-bs-toggle="dropdown">
                                <img src="{{ asset('assets/images/covietnam.webp') }}" class="img-fluid blur-up lazyload"
                                    alt="">
                                <span>Tiếng Việt</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" id="english">
                                        <img src="../assets/images/country/united-kingdom.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <span>English</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="right-nav-list">
                        <div class="dropdown theme-form-select">
                            <button class="btn dropdown-toggle" type="button" id="select-dollar"
                                data-bs-toggle="dropdown">
                                <span>VND</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu">
                                <li>
                                    <a class="dropdown-item" id="aud" href="javascript:void(0)">USD</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="top-nav top-header sticky-header">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="navbar-top">
                    <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                        <span class="navbar-toggler-icon">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                    </button>
                    <a href="index.html" class="web-logo nav-logo">
                        <img src="{{ asset('assets/images/logoatus.png') }}" class="img-fluid blur-up lazyload" alt="" style="width: 100px">
                    </a>

                    <div class="middle-box">
                        <div class="location-box">
                            <button class="btn location-button" data-bs-toggle="modal" data-bs-target="#locationModal">
                                <span class="location-arrow">
                                    <i data-feather="map-pin"></i>
                                </span>
                                <span class="locat-name">Địa chỉ </span>
                                <i class="fa-solid fa-angle-down"></i>
                            </button>
                        </div>

                        <div class="search-box">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Tìm kiếm">
                                <button class="btn" type="button" id="button-addon2">
                                    <i data-feather="search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="rightside-box">
                        <div class="search-full">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i data-feather="search" class="font-light"></i>
                                </span>
                                <input type="text" class="form-control search-type" placeholder="Search here..">
                                <span class="input-group-text close-search">
                                    <i data-feather="x" class="font-light"></i>
                                </span>
                            </div>
                        </div>
                        <ul class="right-side-menu">
                            <li class="right-side">
                                <div class="delivery-login-box">
                                    <div class="delivery-icon">
                                        <div class="search-box">
                                            <i data-feather="search"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="right-side">
                                <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                                    <i data-feather="heart"></i>
                                </a>
                            </li>
                            <li class="right-side">
                                <div class="onhover-dropdown header-badge">
                                    <button type="button" class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="shopping-cart"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge">2
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </button>

                                    <div class="onhover-div">
                                        <ul class="cart-list">
                                            <li class="product-box-contain">
                                                <div class="drop-cart">
                                                    <a href="product-left-thumbnail.html" class="drop-image">
                                                        <img src="../assets/images/vegetable/product/1.png"
                                                            class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="drop-contain">
                                                        <a href="product-left-thumbnail.html">
                                                            <h5>Fantasy Crunchy Choco Chip Cookies</h5>
                                                        </a>
                                                        <h6><span>1 x</span> 80.000vnd</h6>
                                                        <button class="close-button close_button">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="product-box-contain">
                                                <div class="drop-cart">
                                                    <a href="product-left-thumbnail.html" class="drop-image">
                                                        <img src="../assets/images/vegetable/product/2.png"
                                                            class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="drop-contain">
                                                        <a href="product-left-thumbnail.html">
                                                            <h5>Peanut Butter Bite Premium Butter Cookies 600 g
                                                            </h5>
                                                        </a>
                                                        <h6><span>1 x</span> 25.000vnd</h6>
                                                        <button class="close-button close_button">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="price-box">
                                            <h5>Tổng cộng :</h5>
                                            <h4 class="theme-color fw-bold">105.000vnd</h4>
                                        </div>

                                        <div class="button-group">
                                            <a href="{{ route('cart.index') }}" class="btn btn-sm cart-button">View
                                                Cart</a>
                                            <a href="checkout.html"
                                                class="btn btn-sm cart-button theme-bg-color
                                            text-white">Checkout</a>

                                            <a href="cart.html" class="btn btn-sm cart-button">Xem giỏ hàng</a>
                                            <a href="checkout.html"
                                                class="btn btn-sm cart-button theme-bg-color
                                            text-white">Thanh
                                                toán</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="right-side onhover-dropdown">
                                <div class="delivery-login-box">
                                    <div class="delivery-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                    @if (Auth::check())
                                        <p>{{ Auth::user()->user_name }}</p>
                                    @else
                                        <p>Bạn chưa đăng nhập.</p>
                                    @endif
                                </div>

                                <div class="onhover-div onhover-div-login">
                                    <ul class="user-box-name">
                                        @guest
                                            <li class="product-box-contain">
                                                <i></i>
                                                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Đăng
                                                    nhập</a>
                                            </li>

                                            <li class="product-box-contain">
                                                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Đăng
                                                    ký</a>
                                            </li>
                                        @endguest
                                        @if (Auth::check() && Auth::user()->role == 'Admin')
                                            <li class="product-box-contain">
                                                <a href="{{ route('admins.dashboard') }}"><i class="fas fa-key"></i>
                                                    Trang quản trị</a>
                                            </li>
                                        @endif
                                        <li class="product-box-contain">
                                            <a href="{{ route('password.request') }}"><i class="fas fa-key"></i> Quên
                                                mật khẩu</a>
                                        </li>

                                        <li class="product-box-contain">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <a href="#"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid-lg">
    <div class="row">
        <div class="col-12">
            <div class="header-nav">
                <div class="header-nav-left">
                    <button class="dropdown-category">
                        <i data-feather="align-left"></i>
                        <span>Thể loại</span>
                    </button>

                    <div class="category-dropdown">
                        <div class="category-title">
                            <h5>Thể loại</h5>
                            <button type="button" class="btn p-0 close-button text-content">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <ul class="category-list">
                            <li class="onhover-category-list">
                                <a href="javascript:void(0)" class="category-name">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/vegetable.svg"
                                        alt="">
                                    <h6>Quần jean</h6>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="onhover-category-box">
                                    <div class="list-1">
                                        <div class="category-title-box">
                                            <h5>quần jean</h5>
                                        </div>

                            <li class="onhover-category-list">
                                <a href="javascript:void(0)" class="category-name">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/cup.svg"
                                        alt="">
                                    <h6>Quần ống rộng</h6>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="onhover-category-box w-100">
                                    <div class="list-1">
                                        <div class="category-title-box">
                                            <h5>Quần ống rộng</h5>
                                        </div>

                            <li class="onhover-category-list">
                                <a href="javascript:void(0)" class="category-name">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/meats.svg"
                                        alt="">
                                    <h6>Áo thun</h6>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="onhover-category-box">
                                    <div class="list-1">
                                        <div class="category-title-box">
                                            <h5>Áo thun</h5>
                                        </div>

                            <li class="onhover-category-list">
                                <a href="javascript:void(0)" class="category-name">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/breakfast.svg"
                                        alt="">
                                    <h6>Áo bomber</h6>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="onhover-category-box">
                                    <div class="list-1">
                                        <div class="category-title-box">
                                            <h5>Áo bomber </h5>
                                        </div>

                                    </div>
                                </div>
                            </li>

                            <li class="onhover-category-list">
                                <a href="javascript:void(0)" class="category-name">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/frozen.svg"
                                        alt="">
                                    <h6>Áo jacket</h6>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="onhover-category-box w-100">
                                    <div class="list-1">
                                        <div class="category-title-box">
                                            <h5>Áo jacket</h5>
                                        </div>

                                    </div>
                                </div>
                            </li>

                            <li class="onhover-category-list">
                                <a href="javascript:void(0)" class="category-name">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/biscuit.svg"
                                        alt="">
                                    <h6>Quần tây</h6>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="onhover-category-box">
                                    <div class="list-1">
                                        <div class="category-title-box">
                                            <h5>Quần tây</h5>
                                        </div>

                                    </div>
                                </div>
                            </li>

                            <li class="onhover-category-list">
                                <a href="javascript:void(0)" class="category-name">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/grocery.svg"
                                        alt="">
                                    <h6>Áo vest</h6>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="onhover-category-box">
                                    <div class="list-1">
                                        <div class="category-title-box">
                                            <h5>Áo vest</h5>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="header-nav-middle">
                    <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                        <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                            <div class="offcanvas-header navbar-shadow">
                                <h5>Menu</h5>
                                <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                            data-bs-toggle="dropdown">Trang chủ</a>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                            data-bs-toggle="dropdown">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                            data-bs-toggle="dropdown">Sản phẩm</a>

                                        <div class="dropdown-menu dropdown-menu-3 dropdown-menu-2">
                                            <div class="row">
                                                <div class="col-xl-3">
                                                    <div class="dropdown-column m-0">
                                                        <h5 class="dropdown-header">
                                                            Quần jean </h5>
                                                        <h5 class="custom-mt dropdown-header">Quần tây
                                                        </h5>
                                                        <h5 class="dropdown-header">
                                                            Quần ống rộng </h5>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <div class="dropdown-column m-0">
                                                        <h5 class=" dropdown-header">Áo thun
                                                        </h5>
                                                        <h5 class="dropdown-header">
                                                            Jacket </h5>
                                                        <h5 class="custom-mt dropdown-header">Bomber
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <div class="dropdown-column m-0">
                                                        <div class="col-xl-3">
                                                            <div class="dropdown-column m-0">
                                                                <h5 class="dropdown-header">
                                                                    Áo vest </h5>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                            data-bs-toggle="dropdown">Bán chạy nhất</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="seller-become.html">Sản phẩm 1</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="seller-dashboard.html">Sản phẩm 1</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="seller-detail.html">Sản phẩm 1</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="seller-detail-2.html">Sản phẩm 1</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="seller-grid.html">Sản phẩm 1</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="seller-grid-2.html">Sản phẩm 1</a>
                                            </li>

                                        </ul>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                            data-bs-toggle="dropdown">Liên hệ</a>
                                    </li>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="header-nav-right">
                    <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                        <i data-feather="zap"></i>
                        <span>Deal Hôm nay</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
