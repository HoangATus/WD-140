@extends('clients.layouts.client')

@section('content')
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
                                    data-bs-target="#pills-dashboard" type="button">
                                    <i data-feather="home"></i> Hồ sơ
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>
                <style>
                    .user-nav-pills {
                        display: flex;
                        justify-content: start;
                        gap: 10px;
                    }

                    .user-nav-pills .nav-item {
                        list-style: none;
                    }

                    .nav-link {
                        display: inline-flex;
                        align-items: center;
                        padding: 10px 15px;
                        text-decoration: none;
                    }

                    .nav-link.active {
                        background-color: #f8f9fa;
                        border-radius: 5px;
                    }
                </style>

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

                                    @if (session('successy'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('successy') }}
                                        </div>
                                    @endif

                                    <div class="dashboard-title">

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
@endsection
