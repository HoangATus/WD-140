<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('loginAdmin/images/favicon.ico')}}">

    <!-- jsvectormap css -->
    <link href="{{ asset('loginAdmin/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('loginAdmin/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('loginAdmin/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('loginAdmin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('loginAdmin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('loginAdmin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('loginAdmin/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        @yield('content')
        <!-- end auth page content -->

        <!-- footer -->
        @yield('footer')
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('loginAdmin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('loginAdmin/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('loginAdmin/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('loginAdmin/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('loginAdmin/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{ asset('loginAdmin/js/plugins.js')}}"></script>

    <!-- particles js -->
    <script src="{{ asset('loginAdmin/libs/particles.js/particles.js')}}"></script>
    <!-- particles app js -->
    <script src="{{ asset('loginAdmin/js/pages/particles.app.js')}}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('loginAdmin/js/pages/password-addon.init.js')}}"></script>
</body>

</html>