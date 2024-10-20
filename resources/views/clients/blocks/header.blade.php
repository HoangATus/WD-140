<header class="">
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
                                        đến những ưu đãi/gifts mới mỗi ngày vào cuối tuần. <strong class="ms-1"></strong></h6>
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
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-language"
                                    data-bs-toggle="dropdown">
                                    <img src="{{ asset('assets/clients/images/covietnam.webp') }}"
                                        class="img-fluid blur-up lazyload" alt="">
                                    <span>Tiếng Việt</span>
                                </button>
                            </div>
                        </li>
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-dollar"
                                    data-bs-toggle="dropdown">
                                    <span>VND</span>
                                </button>
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
                        <a href="{{ url('/') }}" class="web-logo nav-logo">
                            <img src="{{ asset('assets/images/logoatus.png') }}" class="img-fluid blur-up lazyload"
                                alt="">
                        </a>
                        <div class="search-box">
                            <div class="input-group">
                                <form action="{{route('products.index')}}" method="GET">
                                <input type="search" name="search" class="form-control" placeholder="Tìm kiếm......." value="{{request('search')}}">
                                {{-- <button class="btn" type="submit" id="button-addon2">
                                    <i data-feather="search"></i>
                                </button> --}}
                                </form>
                            </div>
                        </div>

                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menu</h5>
                                        <button class="btn-close lead" type="button"
                                            data-bs-dismiss="offcanvas"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown dropdown-mega">
                                                <a class="nav-link dropdown-toggle ps-xl-2 ps-0"
                                                href="{{url('/')}}">Trang chủ</a>
                                            <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                        data-bs-toggle="dropdown">Giới thiệu</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="{{url('/products')}}">Sản phẩm</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Liên hệ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <form action="{{route('products.index')}}" method="GET">
                                <div class="search-full">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-type"
                                        placeholder="Tìm kiếm ở đây.." value="{{request('search')}}">
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
                                        <div class="onhover-dropdown header-badge">
                                            <button type="button" class="btn p-0 position-relative header-wishlist">
                                                <a href="{{ route('cart.index')}}"><i data-feather="shopping-cart"></i>
                                                    <span class="position-absolute top-0 start-100 translate-middle badge" id="cart-count">0</span>
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
                                            @endguest

                                            @auth
                                                <li class="product-box-contain">
                                                    <a href="{{ route('profile.index') }}"><i class="fa-solid fa-user"></i>
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
                        <a href="wishlist.html" class="notifi-wishlist">
                            <i class="iconly-Heart icli"></i>
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
