@extends('layouts.theme')
@section('content')
        <!-- Breadcrumb Section Start -->
        <section class="breadcrumb-section pt-0">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-contain">
                            <h2>Đăng ký</h2>
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
                                <form class="row g-4">
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input type="text" class="form-control" id="fullname" placeholder="Full Name">
                                            <label for="fullname">Tên tài khoản</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Email Address">
                                            <label for="email">Email </label>
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password">
                                            <label for="password">Mật khẩu</label>
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input type="password" class="form-control" id="forgot-password"
                                                placeholder="ForgotPassword">
                                            <label for="password">Nhập lại mật khẩu</label>
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="forgot-box">
                                            <div class="form-check ps-0 m-0 remember-box">
                                                <input class="checkbox_animated check-box" type="checkbox"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">Tôi đồng ý với
                                                    <span>điều khoản</span> và <span>sự riêng tư</span></label>
                                            </div>
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