@extends('clients.layouts.client')

@section('content')
    <!-- Phần Điều Hướng Bắt Đầu -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Bảng Điều Khiển Người Dùng</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Bảng Điều Khiển Người Dùng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần Điều Hướng Kết Thúc -->


    <!-- Phần Bảng Điều Khiển Người Dùng Bắt Đầu -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">


                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="../assets/images/inner-page/cover-img.jpg" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="../assets/images/inner-page/user/1.jpg"
                                            class="blur-up lazyload update_img" alt="">
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{ $user->user_name }}</h3>
                                    <h6 class="text-content">{{ $user->user_email }}</h6>
                                </div>

                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button"><i data-feather="home"></i>
                                    Hồ sơ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button"><i data-feather="shopping-bag"></i>Đơn
                                    Hàng</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-wishlist" type="button"><i data-feather="heart"></i>
                                Danh Sách Yêu Thích</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-card-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-card" type="button" role="tab"><i
                                    data-feather="credit-card"></i> Thẻ Đã Lưu</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-address" type="button" role="tab"><i
                                    data-feather="map-pin"></i>Địa Chỉ</button>
                        </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>Hồ sơ của tôi</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use
                                                    xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Xin chào, <b class="text-title">{{ $user->user_name }}</b>
                                        </h6>
                                    </div>

                                    {{-- <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Tổng đơn hàng</h5>
                                                        <h3>3658</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Tổng số đơn hàng</h5>
                                                        <h3>254</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Tổng số danh sách yêu thích</h5>
                                                        <h3>32158</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    @if (session('successy'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('successy') }}
                                        </div>
                                    @endif

                                    <div class="dashboard-title">
                                        {{-- <h3>Thông tin tài khoản</h3> --}}
                                    </div>


                                    <div class="row g-4">
                                        <div class="col-xxl-6">
                                            <div class="dashboard-content-title">
                                                <h4>Thông tin liên lạc <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"></a>
                                                </h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">Tên tài khoản: <b
                                                        class="text-title">{{ $user->user_name }}</b></h6>
                                                <h6 class="text-content">Email: <b
                                                        class="text-title">{{ $user->user_email }}</b></h6>
                                                {{-- <a href="javascript:void(0)">Change Password</a> --}}
                                            </div>
                                        </div>

                                        <div class="col-xxl-6">
                                            <div class="dashboard-content-title">
                                                <h4>Số điện thoại <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"></a></h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">Số điện thoại: <b
                                                        class="text-title">{{ $user->user_phone_number }}</b></h6>
                                                </h6>
                                                <h6 class="text-content">Điểm tích lũy: <b
                                                    class="text-title">{{ $user->points }} điểm</b>
                                            </h6>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="dashboard-content-title">
                                                <h4>Địa chỉ <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"></a></h4>
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Địa chỉ: <b
                                                                class="text-title">{{ $user->user_address }}</b></h6>
                                                        </h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('profile.edit', $user->user_id) }}">
                                        <button type="submit" class=""
                                            style="border-radius: 6px; width: 60px; background-color: #0e947a; padding: 10px; color: white; border: none;">Sửa</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
@endsection
