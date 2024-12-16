<header>
    <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 d-xxl-block d-none">

                </div>

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6><strong class="me-1">Chào mừng bạn đến với ATUS!</strong> Chúng tôi mang
                                        đến những ưu đãi/gifts mới mỗi ngày vào cuối tuần. <strong
                                            class="ms-1"></strong></h6>
                                </div>
                            </div>

                            <div>
                                <div class="timer-notification">
                                    <h6>Điều gì đó bạn yêu thích hiện đang được giảm giá!
                                        <a href="shop-left-sidebar.html" class="text-white">Mua ngay!</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <ul class="about-list right-nav-about">
                        <li class="right-nav-list">
                            <div class="theme-form-select">
                                <div class="language-display">
                                    <img src="{{ asset('assets/clients/images/covietnam.webp') }}"
                                        class="img-fluid blur-up lazyload" alt="">
                                    <span>Tiếng Việt</span>
                                </div>
                            </div>
                        </li>
                        <li class="right-nav-list">
                            <div class="theme-form-select">
                                <div class="currency-display">
                                    <span>VND</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <style>
        /* Ẩn dấu mũi tên nếu có */
        .theme-form-select {
            position: relative;
        }

        .theme-form-select::after {
            display: none;
            /* Ẩn pseudo-element thường dùng để tạo dấu mũi tên */
        }

        /* Tùy chỉnh lại phần hiển thị */
        .language-display,
        .currency-display {
            display: flex;
            align-items: center;
            gap: 8px;
            /* Khoảng cách giữa icon và chữ */
            font-size: 16px;
            /* Cỡ chữ tùy chỉnh */
            font-weight: bold;
            /* Làm đậm chữ nếu cần */
        }

        /* Tùy chỉnh hình ảnh */
        .language-display img {
            width: 24px;
            height: 24px;
        }
    </style>

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
                        <a href="{{ url('/') }}" class="web-logo nav-logo">
                            <img src="{{ asset('assets/images/logoatus.png') }}" class="img-fluid blur-up lazyload"
                                alt="">
                        </a>
                        <div class="search-box">
                            <form action="{{ route('products.index') }}" method="GET" class="search-form">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control search-input"
                                        placeholder="Tìm kiếm..." value="{{ request('search') }}">
                                    <button type="submit" class="btn search-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <style>
                            /* Tùy chỉnh cho thanh tìm kiếm */
                            .search-box {
                                max-width: 400px;
                                margin: 0 auto;
                                /* Canh giữa */
                                padding: 10px;
                            }

                            .search-form .input-group {
                                display: flex;
                                align-items: center;
                                border: 2px solid #007bff;
                                /* Viền xanh nổi bật */
                                border-radius: 30px;
                                overflow: hidden;
                                /* Bo tròn các góc */
                                background-color: #fff;
                                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                                /* Hiệu ứng bóng đổ */
                            }

                            /* Ô nhập liệu */
                            .search-input {
                                border: none;
                                outline: none;
                                padding: 10px 20px;
                                font-size: 16px;
                                flex: 1;
                                border-top-left-radius: 50px;
                                /* Bo góc trên trái */
                                border-bottom-left-radius: 30px;
                                /* Bo góc dưới trái */
                            }

                            /* Nút tìm kiếm */
                            .search-btn {
                                background-color: #2d5681;
                                color: #fff;
                                border: none;
                                padding: 11px 21px;
                                /* Tăng padding để nút rộng hơn */
                                cursor: pointer;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border-top-right-radius: 30px;
                                /* Bo góc trên phải */
                                border-bottom-right-radius: 30px;
                                /* Bo góc dưới phải */
                                transition: background-color 0.3s ease;
                            }

                            .search-btn svg {
                                width: 22px;
                                height: 22px;
                            }

                            /* Hiệu ứng hover cho nút tìm kiếm */
                            .search-btn:hover {
                                background-color: #0056b3;
                            }

                            /* Tùy chỉnh hiệu ứng khi focus vào ô tìm kiếm */
                            .search-input:focus {
                                background-color: #f8f9fa;
                            }
                        </style>


                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menu</h5>
                                        <button class="btn-close lead" type="button"
                                            data-bs-dismiss="offcanvas"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="text-center">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/') }}">Trang chủ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/products') }}">Sản phẩm</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/blog') }}">Tin tức</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/contact') }}">Liên hệ</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <style>
                                        ul.text-center {
                                            display: flex;
                                            justify-content: center;
                                            padding: 0;
                                            gap: 30px;
                                            /* Điều chỉnh khoảng cách tùy ý */
                                        }

                                        ul.text-center .nav-link {
                                            font-size: 18px;
                                            /* Điều chỉnh cỡ chữ tùy ý, ví dụ: 18px */
                                            /* font-weight: bold; */
                                            /* Tùy chọn: làm chữ đậm hơn nếu cần */
                                        }
                                    </style>

                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <form action="{{ route('products.index') }}" method="GET">
                                <div class="search-full">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-type"
                                            placeholder="Tìm kiếm ở đây.." value="{{ request('search') }}">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                        <span class="input-group-text">
                                            <button type="submit">
                                                <i data-feather="search" class="font-light"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
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
                                    <a href="{{ route('clients.favorites.index') }}"
                                        class="btn p-0 position-relative header-wishlist">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                </li>

                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <a href="{{ route('cart.index') }}"><i data-feather="shopping-cart"></i>
                                                <span class="position-absolute top-0 start-100 translate-middle badge"
                                                    id="cart-count">0</span>
                                            </a>
                                        </button>


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
                                                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>
                                                        Đăng nhập</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                                                        Đăng ký</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('password.request') }}"><i
                                                            class="fa-solid fa-key"></i>
                                                        Quên mật khẩu</a>
                                                </li>
                                            @endguest

                                            @auth
                                                <li class="product-box-contain">
                                                    <a href="{{ route('orders.index') }}"><i
                                                            class="fa-solid fa-list"></i>
                                                        Đơn hàng</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('profile.index') }}"><i
                                                            class="fa-solid fa-user"></i>
                                                        Tài khoản</a>
                                                </li>
                                                @if (Auth::user()->role == 'Admin')
                                                    <li class="product-box-contain">
                                                        <a href="{{ route('admins.dashboard') }}"><i
                                                                class="fas fa-key"></i> Trang quản trị</a>
                                                    </li>
                                                @endif
                                                <li class="product-box-contain">
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST">
                                                        @csrf
                                                        <a href="#"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                                        </a>
                                                    </form>
                                                </li>
                                            @endauth
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile fix menu start -->
            <div class="mobile-menu d-md-none d-block mobile-cart">
                <ul>
                    <li class="active">
                        <a href="index.html">
                            <i class="iconly-Home icli"></i>
                            <span>Trang Chủ</span>
                        </a>
                    </li>

                    <li class="mobile-category">
                        <a href="javascript:void(0)">
                            <i class="iconly-Category icli js-link"></i>
                            <span>Danh Mục</span>
                        </a>
                    </li>

                    <li>
                        <a href="search.html" class="search-box">
                            <i class="iconly-Search icli"></i>
                            <span>Tìm Kiếm</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('clients.favorites.index') }}">
                            <i class="fa-regular fa-heart"></i>
                            <span>Danh Sách Yêu Thích</span>
                        </a>
                    </li>

                    <li>
                        <a href="cart.html">
                            <i class="iconly-Bag-2 icli fly-cate"></i>
                            <span>Giỏ Hàng</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- mobile fix menu end -->
</header>
