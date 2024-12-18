@extends('clients.layouts.client')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">

                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Đăng Nhập</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="../assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Chào mừng đến với ATUS</h3>
                            <h4>Đăng nhập tài khoản của bạn</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="{{ route('login') }}" method="POST">
                                @csrf
                                @if ($errors->has('loginError'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>{!! $errors->first('loginError') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                @if (session('errorss'))
                                    <div class="alert alert-danger">
                                        {{ session('errorss') }}
                                    </div>
                                @endif
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="login_identifier"
                                            name="login_identifier" value="{{ old('login_identifier') }}" placeholder="Email hoặc Số điện thoại">
                                        <label for="login_identifier">Email hoặc Số điện thoại</label>
                                        @error('login_identifier')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating position-relative">
                                        <input type="password" class="form-control" id="user_password" name="user_password"
                                            placeholder="User Password">
                                        <label for="user_password">Mật khẩu</label>
                                        <button type="button"
                                            class="btn btn-link position-absolute end-0 top-0 mt-2 me-2 text-muted"
                                            onclick="togglePasswordVisibility('user_password', 'toggle-password-icon')">
                                            <i class="ri-eye-fill align-middle" id="toggle-password-icon"></i>
                                        </button>
                                        @error('user_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <a href="{{ route('password.request') }}" class="forgot-password">Quên mật khẩu?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Đăng
                                        Nhập</button>
                                </div>
                            </form>

                        </div>

                        {{-- <div class="other-log-in">
                                <h6>or</h6>
                            </div>
    
                            <div class="log-in-button">
                                <ul>
                                    <li>
                                        <a href="https://www.google.com/" class="btn google-button w-100">
                                            <img src="../assets/images/inner-page/google.png" class="blur-up lazyload"
                                                alt=""> Log In with Google
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" class="btn google-button w-100">
                                            <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                                alt=""> Log In with Facebook
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Bạn chưa có tài khoản?</h4>
                            <a href="{{ route('register') }}">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
@endsection
