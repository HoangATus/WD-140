@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="{{ url('/') }}" class="d-inline-block auth-logo">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
                            </a>
                        </div>
                        {{-- <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p> --}}
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Chào mừng đến đến với trang quản trị ATUS</h5>
                                <p class="text-muted">Đăng nhập với tư cách là quản trị viên để tiếp tục.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <!-- Hiển thị thông báo lỗi nếu có -->
                                    @if ($errors->has('loginError'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>{!! $errors->first('loginError') !!}</li> <!-- Hiển thị chỉ thông báo loginError -->
                                            </ul>
                                        </div>
                                    @endif


                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="user_email"
                                            value="{{ old('user_email') }}" name="user_email" placeholder="Nhập địa chỉ email">
                                        @error('user_email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        {{-- <div class="float-end">
                                            <a href="" class="text-muted">Quên mật khẩu?</a>
                                        </div> --}}
                                        <label class="form-label" for="password-input">Mật Khẩu <span
                                                class="text-danger">*</span></label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input"
                                                placeholder="Nhập mật khẩu" id="user_password" name="user_password">
                                            @error('user_password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">Ghi nhớ tôi</label>
                                    </div> --}}

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Đăng nhập </button>
                                    </div>

                                    {{-- <div class="mt-4 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                        <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                        <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                    </div>
                                </div> --}}
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    {{-- <div class="mt-4 text-center">
                        <p class="mb-0">Bạn chưa có tài khoản ? <a href="{{ url('/register') }}"
                                class="fw-semibold text-primary text-decoration-underline"> Đăng ký </a> </p>
                    </div> --}}

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection

@section('footer')
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Chào mừng bạn đến với ATUS <i class="mdi mdi-heart text-danger"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
