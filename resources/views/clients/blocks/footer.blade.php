<footer class="footer-section">
    <div class="container">
        <div class="row align-items-start">

            <div class="col-md-4 border-end">
                <a href="{{ url('/') }}" class="foot-logo">
                    <img src="{{ asset('assets/images/logoatus.png') }}" class="img-fluid mb-3" alt="Logo ATUS">
                </a>
                <p class="information-text">Shop thời trang nam ATUS là một thương hiệu nổi bật dành riêng cho nam giới,
                    mang đến phong cách hiện đại, thanh lịch và nam tính.</p>
            </div>


            <div class="col-md-4 border-end">
                <div class="footer-title">
                    <h4>ATUS</h4>
                </div>
                <ul class="footer-list">
                    <li><a href="{{ url('/gioi-thieu') }}">Về chúng tôi</a></li><br>
                    <li><a href="{{url('/contact')}}">Liên hệ với chúng tôi</a></li>
                </ul>
            </div>

            <div class="col-md-4 ">
                <div class="footer-title">
                    <h4>Thông tin liên hệ</h4>
                </div>
                <ul class="footer-address">
                    <li>
                        <i class="fa fa-map-marker-alt me-2"></i>
                        <span>số 62, Văn Tiến Dũng, Bắc Từ Liêm, Hà Nội</span>
                    </li><br>
                    <li>
                        <i class="fa fa-phone me-2"></i>
                        <span>0345174327</span>
                    </li><br>
                    <li>
                        <i class="fa fa-envelope me-2"></i>
                        <a href="mailto:hoangthanhtu135@gmail.com">
                            <span>hoangthanhtu135@gmail.com</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

        <!-- Thanh toán -->
        <div class="payment-methods text-center mt-4">
            <ul class="payment-box d-flex justify-content-center">
                <li><img src="{{ asset('assets/clients/images/icon/paymant/visa.png') }}" alt="Visa"></li>
                <li><img src="{{ asset('assets/clients/images/icon/paymant/discover.png') }}" alt="Discover"></li>
                <li><img src="{{ asset('assets/clients/images/icon/paymant/american.png') }}" alt="American Express">
                </li>
                <li><img src="{{ asset('assets/clients/images/icon/paymant/master-card.png') }}" alt="Master Card"></li>
                <li><img src="{{ asset('assets/clients/images/icon/paymant/giro-pay.png') }}" alt="Giro Pay"></li>
            </ul>
        </div>
    </div>
    <style>
        .footer-section {
            background-color: #000000d4;
            color: #fff;
            padding: 40px 0;
            font-family: Arial, sans-serif;
        }

        .footer-title h4 {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 15px;
        }
        .col-md-4.border-end {
            height: 200px;
        }
        .information-text {
            font-size: 14px;
            line-height: 1.6;
            color: #ccc;
        }

        .footer-list,
        .footer-address {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-list li,
        .footer-address li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .footer-list a,
        .footer-address span {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-list a:hover,
        .footer-address span:hover {
            color: #5d5d84;
        }

        .border-end {
            border-right: 1px solid #555;
            padding-right: 20px;
        }

        .payment-box {
            display: flex;
            /* Hiển thị các phần tử con theo chiều ngang */
            gap: 15px;
            /* Khoảng cách giữa các biểu tượng */
            justify-content: center;
            /* Canh giữa các biểu tượng */
            align-items: center;
            /* Canh giữa theo chiều dọc */
            padding: 10px 0;
            /* Khoảng cách trên dưới */
            flex-wrap: nowrap;
            /* Không cho xuống dòng */
        }

        .payment-box img {
            width: 40px;
            /* Chiều rộng biểu tượng */
            height: auto;
            /* Giữ tỷ lệ gốc */
            transition: filter 0.3s;
            /* Hiệu ứng hover mượt mà */
        }

        .payment-box img:hover {
            filter: none;
            /* Hiển thị màu đầy đủ khi hover */
        }


        .me-2 {
            margin-right: 8px;
        }

        footer {
            background-color: unset;
            /* Xóa màu nền */
            position: unset;
            /* Loại bỏ vị trí cố định */
            z-index: unset;
            /* Loại bỏ thứ tự xếp lớp */
        }
    </style>
</footer>
