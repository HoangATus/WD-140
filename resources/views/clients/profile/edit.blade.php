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

                                <img src="{{ asset('assets/images/inner-page/cover-img.jpg') }}"
                                    class="img-fluid blur-up lazyload" alt="anh">

                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">

                                        <img src="{{ asset('assets/images/inner-page/user/1.jpg') }}">


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
                                    <form action="{{ route('profile.update', $user->user_id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="user_name">Họ và tên:</label>
                                            <input type="text" name="user_name" id="user_name"
                                                class="form-control mt-2 @error('user_name') is-invalid @enderror"
                                                value="{{ old('user_name', $user->user_name) }}">
                                            @error('user_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="user_email">Email:</label>
                                            <input name="user_email" id="user_email"
                                                class="form-control mt-2 @error('user_email') is-invalid @enderror"
                                                value="{{ old('user_email', $user->user_email) }}">
                                            @error('user_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="user_phone_number">Số điện thoại:</label>
                                            <input type="number" name="user_phone_number" id="user_phone_number"
                                                class="form-control mt-2 @error('user_phone_number') is-invalid @enderror"
                                                value="{{ old('user_phone_number', $user->user_phone_number) }}">
                                            @error('user_phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="user_address">Địa chỉ:</label>
                                            <input type="text" name="user_address" id="user_address"
                                                class="form-control mt-2 @error('user_address') is-invalid @enderror"
                                                value="{{ old('user_address', $user->user_address) }}">
                                            @error('user_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="d-flex justify-content-end mt-4">
                                            <div class="ms-2">
                                                <button type="submit"
                                                    style="border-radius: 6px; width: 60px; background-color: #0e947a; padding: 10px; color: white; border: none;">Sửa</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
