<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 12:27:18 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="{{ asset('assets/clients/images/favicon/7.png') }}" type="image/x-icon">
    <title>On-demand last-mile delivery</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;family=Qwitcher+Grypen:wght@400;700&amp;display=swap">

    {{-- icon boostrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Wow CSS -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/animate.min.css') }}">

    <!-- Iconly CSS -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bulk-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/vendors/animate.css') }}">

    <!-- Ion Range Slider CSS -->
    <link href="https://cdn.jsdelivr.net/npm/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/style.css') }}">

    <!-- Icons -->
    <link href="{{ asset('assets/clients/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/remixicon@2.5.0/fonts/remixicon.css">

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">

    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Bootstrap JS (for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .category-box {
            transition: all 0.3s ease;
        }
        header .navbar {
    display: inline-block;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-left: 15px;
    z-index: 0;
}
footer.section-t-space.footer-section-2.footer-color-3 {
    z-index: -1; 
}



body {
    font-family: Arial, sans-serif;
}

.no-scroll {
    overflow: hidden;
}

.voucher-list {
    max-height: 300px;
    overflow-y: auto;
    margin-top: 20px;
    padding-right: 10px;
}

.modal {
    position: relative;
    z-index: 2;
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    position: relative;
    background-color: #FFF;
    margin: 5% auto;
    padding: 20px;
    width: 80%;
    max-width: 600px;
    border-radius: 8px;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
.xx {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
.tabs {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.tab {
    padding: 5px 10px;
    background-color: #f5f5f5;
    border: none;
    cursor: pointer;
}

.tab.active {
    background-color: #e0e0e0;
    font-weight: bold;
}

.hr {
    z-index: 0;
}

.voucher-info {
    flex: 1;
}

.modal-footer {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.cancel,
.confirm {
    padding: 10px;
    width: 100px;
    cursor: pointer;
}

.cancel {
    background-color: #352eff;
    color: #fff;
}

.confirm {

    background-color: #417394;
    color: white;
}

.voucher-item {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    background-color: #f5f5f5;
}

.voucher-icon {
    width: 70px;
    height: 70px;
    margin-right: 12px;
}

.voucher-info h4 {
    color: #4CAF50;
    font-size: 16px;
    margin-bottom: 3px;
}

.voucher-info p {
    margin-bottom: 3px;
    font-size: 14px;
}

.expiry {
    font-size: 10px;
    color: #666;
}

.voucher-select {
    margin-left: 8px;
    transform: scale(1.5);
    cursor: pointer;
}

.note {
    color: #ff0000;
    font-size: 12px;
    margin-top: -8px;
}
button:disabled {
background-color: #ccc; 
color: #666; 
cursor: not-allowed; 
opacity: 0.6; 
}

        .category-box img {
            transition: all 0.3s ease;
            filter: none;
            opacity: 1;
        }

        .category-box:hover img {
            filter: none;
            opacity: 1;
        }

        .button-custom {
            background-color: #417394;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <!-- Các phần tử head khác -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bao gồm Axios từ CDN hoặc thông qua Laravel Mix -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body class="theme-color-5">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->
    <div class="container mt-4">
        <!-- Hiển thị thông báo -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Đóng">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Đóng">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <!-- Header Start -->
    @include('clients.blocks.header')
    <!-- Header End -->

    <!-- Home Section Start -->
    @yield('content')
    <!-- Home Section End -->

    <!-- Bao gồm các tài sản JS chung -->
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts') <!-- Nếu bạn sử dụng @push('scripts') -->
        <!-- Footer Section Start -->
        @include('clients.blocks.footer')
        <!-- Footer Section End -->


        <!-- Bg overlay Start -->
        <div class="bg-overlay"></div>
        <!-- Bg overlay End -->
        {{-- <script src="//code.tidio.co/igkeujaraejp4md3vfbkxkwvoqn9q4lf.js" async></script> --}}
        <!-- latest jquery-->
        <script src="{{ asset('assets/clients/js/jquery-3.6.0.min.js') }}"></script>
        {{-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <df-messenger
          intent="WELCOME"
          chat-title="Atus"
          agent-id="53615cbf-5794-475e-aa76-e1b572e83d53"
          language-code="vi"
        ></df-messenger> --}}
        <!-- Mã nhúng Chatbot.com -->
<!-- Start of ChatBot (www.chatbot.com) code -->
{{-- <script>
    window.__ow = window.__ow || {};
    window.__ow.organizationId = "398a317b-0e24-40c8-b2c8-48d5a72dc849";
    window.__ow.template_id = "bfe32f50-1ac1-44bf-953e-c5b50450e1bd";
    window.__ow.integration_name = "manual_settings";
    window.__ow.product_name = "chatbot";   
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[OpenWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.openwidget.com/openwidget.js",t.head.appendChild(n)}};!n.__ow.asyncInit&&e.init(),n.OpenWidget=n.OpenWidget||e}(window,document,[].slice))
  </script>
  <noscript>You need to <a href="https://www.chatbot.com/help/chat-widget/enable-javascript-in-your-browser/" rel="noopener nofollow">enable JavaScript</a> in order to use the AI chatbot tool powered by <a href="https://www.chatbot.com/" rel="noopener nofollow" target="_blank">ChatBot</a></noscript>
  <!-- End of ChatBot code -->
   --}}
        <!-- jquery ui-->
        <script src="{{ asset('assets/clients/js/jquery-ui.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('assets/clients/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/clients/js/bootstrap/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/clients/js/bootstrap/popper.min.js') }}"></script>

        <!-- feather icon js-->
        <script src="{{ asset('assets/clients/js/feather/feather.min.js') }}"></script>
        <script src="{{ asset('assets/clients/js/feather/feather-icon.js') }}"></script>

        <!-- Lazyload Js -->
        <script src="{{ asset('assets/clients/js/lazysizes.min.js') }}"></script>

        <!-- Slick js-->
        <script src="{{ asset('assets/clients/js/slick/slick.js') }}"></script>
        <script src="{{ asset('assets/clients/js/slick/slick-animation.min.js') }}"></script>
        <script src="{{ asset('assets/clients/js/slick/custom_slick.js') }}"></script>

        <!-- Auto Height Js -->
        <script src="{{ asset('assets/clients/js/auto-height.js') }}"></script>

        <!-- WOW js -->
        <script src="{{ asset('assets/clients/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/clients/js/custom-wow.js') }}"></script>

        <!-- script js -->
        <script src="{{ asset('assets/clients/js/script.js') }}"></script>

        <!-- theme setting js -->
        <script src="{{ asset('assets/clients/js/theme-setting.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script>
            const colorOptions = document.querySelectorAll('#color-options .option-item');
            colorOptions.forEach(item => {
                item.addEventListener('click', function() {
                    colorOptions.forEach(option => option.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            const sizeOptions = document.querySelectorAll('#size-options .option-item');
            sizeOptions.forEach(item => {
                item.addEventListener('click', function() {
                    sizeOptions.forEach(option => option.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const qtyInputs = document.querySelectorAll('.qty-box');

                qtyInputs.forEach(qtyInput => {
                    const plusButton = qtyInput.querySelector('.qty-right-plus');
                    const minusButton = qtyInput.querySelector('.qty-left-minus');
                    const inputField = qtyInput.querySelector('.qty-input');

                    // Tăng số lượng
                    plusButton.addEventListener('click', function() {
                        let currentValue = parseInt(inputField.value);
                        if (!isNaN(currentValue)) {
                            inputField.value = currentValue + 1;
                        } else {
                            inputField.value = 1; // Nếu giá trị không hợp lệ, đặt về 1
                        }
                    });

                    // Giảm số lượng
                    minusButton.addEventListener('click', function() {
                        let currentValue = parseInt(inputField.value);
                        if (!isNaN(currentValue) && currentValue > 0) {
                            inputField.value = currentValue - 1;
                        }
                        // Không giảm dưới 0
                    });
                });
            });
        </script>

        <!-- Script để cập nhật số lượng giỏ hàng -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Hàm lấy số lượng giỏ hàng
                function fetchCartCount() {
                    axios.get('{{ route('cart.count') }}')
                        .then(response => {
                            document.getElementById('cart-count').textContent = response.data.count;
                        })
                        .catch(error => {
                            console.error('Error fetching cart count:', error);
                        });
                }

                // Gọi hàm khi trang tải
                fetchCartCount();

                // Gọi hàm khi thêm vào giỏ thành công
                window.addToCart = function() {
                    console.log('addToCart function called');
                    const variantId = document.getElementById('selected-variant-id').value;
                    const quantity = document.getElementById('quantity-input').value;

                    console.log('Variant ID:', variantId);
                    console.log('Quantity:', quantity);

                    if (!variantId) {
                        alert('Vui lòng chọn một biến thể hợp lệ.');
                        return;
                    }

                    axios.post('{{ route('cart.add') }}', {
                            variant_id: variantId,
                            quantity: quantity
                        })
                        .then(response => {
                            console.log('Add to cart response:', response);
                            alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
                            fetchCartCount(); // Cập nhật số lượng giỏ hàng
                        })
                        .catch(error => {
                            console.error('Add to cart error:', error);
                            if (error.response && error.response.data && error.response.data.message) {
                                alert(error.response.data.message);
                            } else {
                                alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
                            }
                        });
                }

                // Tương tự, cập nhật các hàm khác nếu cần
            });
        </script>

        <script>
            function togglePasswordVisibility(passwordFieldId, toggleIconId) {
                const passwordField = document.getElementById(passwordFieldId);
                const toggleIcon = document.getElementById(toggleIconId);

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    toggleIcon.classList.remove('ri-eye-fill');
                    toggleIcon.classList.add('ri-eye-off-fill');
                } else {
                    passwordField.type = 'password';
                    toggleIcon.classList.remove('ri-eye-off-fill');
                    toggleIcon.classList.add('ri-eye-fill');
                }
            }
        </script>
    </body>
    <!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 12:27:22 GMT -->

    </html>
