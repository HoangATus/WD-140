@extends('layouts.theme')

@section('content')
<!-- Home Section Start -->
<section class="home-section pt-2">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xl-8 ratio_65">
                <div class="home-contain h-100">
                    <div class="h-100">
                        <img src="{{ asset('assets/images/BANNER.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="home-detail p-center-left w-75">
                        <div>
                            <h1 class="text-uppercase">Ở nhà và thư giãn <span class="daily">shopping thôi nào!</span></h1>
                            <p class="w-75 d-none d-sm-block">chúng tôi mang đến những sản phẩm có chất lượng tốt nhất.</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                class="btn btn-animation mt-xxl-4 mt-2 home-button mend-auto">Xem ngay <i
                                    class="fa-solid fa-right-long icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 ratio_65">
                <div class="row g-4">
                    <div class="col-xl-12 col-md-6">
                        <div class="home-contain">
                            <img src="{{ asset('assets/images/banner2.jpg') }}" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="home-detail p-center-left home-p-sm w-75">
                                <div>
                                    </h2>
                                    <h3 class="theme-color">Sản phất chất lượng</h3>
                                    <p class="w-75">Luôn cập nhật mẫu mới nhất phù hợp với thị trường</p>
                                    <a href="shop-left-sidebar.html" class="shop-button">Xem ngay <i
                                            class="fa-solid fa-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-md-6">
                        <div class="home-contain">
                            <img src="{{ asset('assets/images/banner3.jpg') }}" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="home-detail p-center-left home-p-sm w-75">
                                <div>
                                    <h3 class="mt-0 theme-color fw-bold">Sản phẩm bán chạy trong tháng</h3>
                                    <p class="organic">Sản phẩm tiếp cận được nhiều khách hàng </p>
                                    <a href="shop-left-sidebar.html" class="shop-button">Xem ngay <i
                                            class="fa-solid fa-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section End -->

<!-- Banner Section Start -->
<section class="banner-section ratio_60 wow fadeInUp">
    <div class="container-fluid-lg">
        <div class="banner-slider">
            <div>
                <div class="banner-contain hover-effect">
                    <img src="{{ asset('assets/images/quan-jeans-slimfit-qj048-mau-xanh-16793.jpeg') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details">
                        <div class="banner-box">
                            <h5>Quần jean</h5>
                            <h6 class="text-content">Sản phẩm bán chạy</h6>
                        </div>
                        <a href="shop-left-sidebar.html" class="banner-button text-white">Xem ngay  <i
                                class="fa-solid fa-right-long ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div>
                <div class="banner-contain hover-effect">
                    <img src="{{ asset('assets/images/ổngng.png') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details">
                        <div class="banner-box">
                            <h5>Quần ống rộng</h5>
                            <h6 class="text-content">Sản phẩm bán chạy</h6>
                        </div>
                        <a href="shop-left-sidebar.html" class="banner-button text-white">Xem ngay  <i
                                class="fa-solid fa-right-long ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div>
                <div class="banner-contain hover-effect">
                    <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details">
                        <div class="banner-box">
                            <h5>Áo thun</h5>
                            <h6 class="text-content">Sản phẩm bán chạy</h6>
                        </div>
                        <a href="shop-left-sidebar.html" class="banner-button text-white">Xem ngay  <i
                                class="fa-solid fa-right-long ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div>
                <div class="banner-contain hover-effect">
                    <img src="{{ asset('assets/images/bombert.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details">
                        <div class="banner-box">
                            <h5>Áo bomber</h5>
                            <h6 class="text-content">Sản phẩm bán chạy</h6>
                        </div>
                        <a href="shop-left-sidebar.html" class="banner-button text-white">Xem ngay <i
                                class="fa-solid fa-right-long ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                <div class="p-sticky">
                    <div class="category-menu">
                        <h3>Thể loại</h3>
                        <ul>
                            <li>
                                <div class="category-list">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/vegetable.svg" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Quần jean</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/cup.svg" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Quần ống rộng</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/meats.svg" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Quần tây</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/breakfast.svg" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Áo thun</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/frozen.svg" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Áo bomber</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/biscuit.svg" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Áo jacket</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/grocery.svg" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Áo vest</a>
                                    </h5>
                                </div>
                            </li>
                            
                        </ul>


                    </div>

                    <div class="ratio_156 section-t-space">
                        <div class="home-contain hover-effect">
                            <img src="{{ asset('assets/images/quantay.png') }}" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h3 class="text-uppercase fw-normal"><span
                                            class="theme-color fw-bold">Quần tây</span></h3>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation btn-md mend-auto">Xem ngay <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_medium section-t-space">
                        <div class="home-contain hover-effect">
                            <img src="{{ asset('assets/images/jacket.jpg') }}" class="img-fluid blur-up lazyload"
                                alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h2 class="text-uppercase fw-normal mb-0 text-russo theme-color">Áo jacket</h2>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation btn-md mend-auto">Xem ngay <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="section-t-space">
                        <div class="category-menu">
                            <h3>Bình luận khách hàng</h3>

                            <div class="review-box">
                                <div class="review-contain">
                                    <h5 class="w-75">Anh Minh:</h5>
                                    <p> "Trang phục rất đẹp và chất lượng.
                                         Mình đã mua áo sơ mi ở đây và cực kỳ hài lòng với chất vải cũng như form dáng. Giao hàng cũng rất nhanh chóng!".</p>
                                </div>

                                <div class="review-profile">
                                    <div class="review-image">
                                        <img src="../assets/images/vegetable/review/1.jpg"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </div>
                                    <div class="review-detail">
                                        <h5>Mai Anh</h5>
                                        <h6>Trợ lý</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col-xxl-9 col-xl-8">
                <div class="title title-flex">
                    <div>
                        <h2>Sản Phẩm </h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>Các sản phẩm tại ATUS được thiết kế dành riêng cho phái mạnh, với sự kết hợp giữa phong cách hiện đại và chất lượng cao.</p>
                    </div>
                    
                </div>

                <div class="section-b-space">
                    <div class="product-border border-row overflow-hidden">
                        <div class="product-box-slider no-arrow">
                            <div class="best-selling-slider product-wrapper wow fadeInUp">
                                <div class="row">
                                    @foreach($products as $index => $product)
                                        <div class="col-md-2 mb-4"> <!-- Sửa thành col-md-2 để chia 5 sản phẩm trên 1 hàng -->
                                            <div class="offer-product">
                                                <a href="{{ url('product/' . $product->id) }}" class="offer-image">
                                                    {{-- <img src="{{ Storage::url($product->image) }}" width="100px";
                                                         class="blur-up lazyload" alt="{{ $product->name }}"> --}}
                                                    <img src="{{Storage::url($product->image)}}" alt="" width="100px" class="blur-up lazyload" alt="{{ $product->name }}"> 
                                                </a>
                            
                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="{{ url('product/' . $product->id) }}" class="text-title">
                                                            <h6 class="name">{{ $product->name }}</h6>
                                                        </a>
                                                        <h6 class="price theme-color">{{ number_format($product->price, 0, ',', '.') }} VND</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        @if(($index + 1) % 5 == 0) <!-- Sau 5 sản phẩm, bắt đầu 1 dòng mới -->
                                            </div><div class="row">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        
                        </div>
                    </div>
                <div class="section-t-space section-b-space">
                    <div class="row g-md-4 g-3">
                        <div class="col-xxl-4 col-xl-12 col-md-5 container" >
                            {{-- <a href="shop-left-sidebar.html" class="banner-contain hover-effect h-100"> --}}
                                <img src="{{ asset('assets/images/banner3.jpg') }}" class="bg-img blur-up lazyload"
                                    alt="">
                                <div class="banner-details p-center-left p-4 h-100">
                                    <div>
                                        <h3 class="mt-2 mb-2 theme-color">"Sự lựa chọn hoàn hảo cho phái mạnh"</h3>
                                        <h5 class="fw-normal product-name text-title">
                                            Với những thiết kế hiện đại, chất lượng cao cấp và giá cả hợp lý, ATUS cam kết mang lại trải nghiệm mua sắm tuyệt vời cho các quý ông.</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="title d-block">
                    <div>
                        <h2>Sản phẩm bán chạy nhất</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>Những sản phẩm bán chạy nhất tại ATUS luôn là sự lựa chọn hàng đầu của khách hàng nhờ vào thiết kế hiện đại, chất liệu cao cấp và tính ứng dụng cao.</p>
                    </div>
                </div>

                <div class="best-selling-slider product-wrapper wow fadeInUp">
                    <div>
                        <ul class="product-list">
                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>500 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>500 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>200 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>150 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <ul class="product-list">
                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>500 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>500 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>1 KG</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>150 G</span>
                                            <h6 class="price theme-color"> 600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <ul class="product-list">
                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>1 L</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>500 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>1 KG</span>
                                            <h6 class="price theme-color">600.000nvd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="offer-product">
                                    <a href="product-left-thumbnail.html" class="offer-image">
                                        <img src="{{ asset('assets/images/bombert.jpg') }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="product-left-thumbnail.html" class="text-title">
                                                <h6 class="name">Áo bomber</h6>
                                            </a>
                                            <span>500 G</span>
                                            <h6 class="price theme-color">600.000vnd</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- <div class="section-t-space">
                    <div class="banner-contain hover-effect">
                        <img src="{{ asset('assets/images/banner3.jpg') }}" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center banner-b-space w-100 text-center">
                            <div>
                                <h6 class="ls-expanded theme-color mb-sm-3 mb-1">Mùa hè</h6>
                                <h2 class="banner-title">Không nóng</h2>
                                <button onclick="location.href = 'shop-left-sidebar.html';"
                                    class="btn btn-animation btn-sm mx-auto mt-sm-3 mt-2">Xem ngay <i
                                        class="fa-solid fa-arrow-right icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="title section-t-space">
                    <h2>Một số bài viết</h2>
                    <span class="title-leaf">
                        <svg class="icon-width">
                            <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                        </svg>
                    </span>
                    <p>Áo thun từ ATUS mang phong cách hiện đại trẻ trung.</p>
                </div>

                <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <a href="blog-detail.html" class="blog-detail">
                                <h6>20 tháng mười, 2024</h6>
                                <h5>ATUS</h5>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="{{ asset('assets/images/quan-jeans-slimfit-qj048-mau-xanh-16793.jpeg') }}" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <a href="blog-detail.html" class="blog-detail">
                                <h6>20 tháng mười, 2024</h6>
                                <h5>ATUS</h5>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="{{ asset('assets/images/ao-thun-tron-form-regular-trang-at043-16062.jpg') }}" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <a href="blog-detail.html" class="blog-detail">
                                <h6>20 tháng mười, 2024</h6>
                                <h5>ATUS</h5>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="../assets/images/vegetable/blog/1.jpg" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter Section Start -->
{{-- <section class="newsletter-section section-b-space">
    <div class="container-fluid-lg">
        <div class="newsletter-box newsletter-box-2">
            <div class="newsletter-contain py-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                            <div class="newsletter-detail">
                                <h2>CẦN TƯ VẤN</h2>
                                <h5>Vui lòng để lại gmail để được tư vấn</h5>
                                <div class="input-box">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="vui long nhap gmail">
                                    <i class="fa-solid fa-envelope arrow"></i>
                                    <button class="sub-btn  btn-animation">
                                        <span class="d-sm-block d-none">Gửi</span>
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
</section> --}}
<br>
<br>
<br>
@endsection