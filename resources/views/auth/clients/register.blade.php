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
                                <li class="breadcrumb-item active">Đăng ký</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="../assets/images/inner-page/sign-up.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Chào mừng đến với ATUS</h3>
                            <h4>Tạo tài khoản mới</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="fullname" name="user_name"
                                            placeholder="Full Name" value="{{ old('user_name') }}">
                                        <label for="fullname">Tên tài khoản</label>
                                        @error('user_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Trường Email -->
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" class="form-control" id="email" name="user_email"
                                            placeholder="Email Address" value="{{ old('user_email') }}">
                                        <label for="email">Email</label>
                                        @error('user_email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Trường Số Điện Thoại -->
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="phone" name="user_phone_number"
                                            placeholder="Số Điện Thoại" value="{{ old('user_phone_number') }}">
                                        <label for="phone">Số Điện Thoại</label>
                                        @error('user_phone_number')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating position-relative">
                                        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="User Password">
                                        <label for="user_password">Mật khẩu</label>
                                        <button type="button" class="btn btn-link position-absolute end-0 top-0 mt-2 me-2 text-muted" onclick="togglePasswordVisibility('user_password', 'toggle-password-icon')">
                                            <i class="ri-eye-fill align-middle" id="toggle-password-icon"></i>
                                        </button>
                                        @error('user_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating position-relative">
                                        <input type="password" class="form-control" id="user_password_confirmation" name="user_password_confirmation" placeholder="Confirm Password">
                                        <label for="user_password_confirmation">Nhập lại mật khẩu</label>
                                        <button type="button" class="btn btn-link position-absolute end-0 top-0 mt-2 me-2 text-muted" onclick="togglePasswordVisibility('user_password_confirmation', 'toggle-password-confirmation-icon')">
                                            <i class="ri-eye-fill align-middle" id="toggle-password-confirmation-icon"></i>
                                        </button>
                                        @error('user_password_confirmation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">Đăng ký</button>
                                </div>
                            </form>

                        </div>

                        {{-- <div class="other-log-in">
                                <h6>or</h6>
                            </div>
    
                            <div class="log-in-button">
                                <ul>
                                    <li>
                                        <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin"
                                            class="btn google-button w-100">
                                            <img src="../assets/images/inner-page/google.png" class="blur-up lazyload"
                                                alt="">
                                            Sign up with Google
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" class="btn google-button w-100">
                                            <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                                alt=""> Sign up with Facebook
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Bạn đã có tài khoản?</h4>
                            <a href="{{ route('login') }}">Đăng nhập</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
@endsection
