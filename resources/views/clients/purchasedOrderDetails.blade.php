@extends('layouts.theme');
@section('content')
    <!-- User Dashboard Section Start -->
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
                                        <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>User name</h3>
                                    <h6 class="text-content">email@gmail.com</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button"><i data-feather="home"></i>
                                    Trang Chủ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button"><i data-feather="shopping-bag"></i>Đặt
                                    Hàng</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-wishlist" type="button"><i data-feather="heart"></i>
                                    Wishlist</button>
                            </li> --}}
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-card-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-card" type="button" role="tab"><i
                                        data-feather="credit-card"></i> Saved Card</button>
                            </li> --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"><i
                                        data-feather="map-pin"></i>Địa Chỉ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"><i
                                        data-feather="user"></i>
                                    Thông tin cá nhân</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-download-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-download" type="button" role="tab"><i
                                        data-feather="download"></i>Download</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button" role="tab"><i
                                        data-feather="shield"></i>
                                    Privacy</button>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel">
                            </div>

                            <div class="tab-pane fade" id="pills-order" role="tabpanel">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>Chi tiết đơn hàng của tôi</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use
                                                    xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-contain">
                                        <div class="text-end">
                                            <h3 style="color: red;">ĐƠN HÀNG ĐÃ HOÀN THÀNH</h3>
                                        </div>
                                        {{-- <div class="col-12 overflow-hidden">
                                            <ol class="progtrckr">
                                                <li class="progtrckr-done">
                                                    <h5>Order Processing</h5>
                                                    <h6>05:43 AM</h6>
                                                </li>
                                                <li class="progtrckr-done">
                                                    <h5>Pre-Production</h5>
                                                    <h6>01:21 PM</h6>
                                                </li>
                                                <li class="progtrckr-done">
                                                    <h5>In Production</h5>
                                                    <h6>03:21 PM</h6>
                                                </li>
                                                <li class="progtrckr-todo">
                                                    <h5>Shipped</h5>
                                                    <h6>04:21 PM</h6>
                                                </li>
                                                <li class="progtrckr-todo">
                                                    <h5>Delivered</h5>
                                                    <h6>05:21 PM</h6>
                                                </li>
                                            </ol>
                                        </div> --}}
                                        
                                        <div class="order-box dashboard-bg-box">

                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="../assets/images/vegetable/product/1.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Áo nam ngắn tay</h3>
                                                    </a>
                                                    <p class="text-content">Vải nhẹ, mềm mịn giúp người mặc có cảm giác
                                                        thoải mái, dễ chịu.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Giá : </h6>
                                                                <h5 style="color: red;">200.000 VND</h5>
                                                                <h5 style="text-decoration: line-through;">299.000 VND</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Số lượng : </h6>
                                                                <h5>2</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-summary mt-4">
                                        <table class="table order-summary-table">
                                            <tr>
                                                <td>Tên người nhận</td>
                                                <td class="text-end">Lê Văn Đô</td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại</td>
                                                <td class="text-end">0976888999</td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ nhận hàng</td>
                                                <td class="text-end">Ngách 44/86 Trần Thái Tông, Làng Vòng, Phường Dịch
                                                    Vọng Hậu, Quận Cầu Giấy, Hà Nội</td>
                                            </tr>
                                            <tr>
                                                <td>Tổng tiền hàng</td>
                                                <td class="text-end">400.000 VND</td>
                                            </tr>
                                            <tr>
                                                <td>Giảm giá</td>
                                                <td class="text-end">-100.000 VND</td>
                                            </tr>
                                            <tr>
                                                <th>Thành tiền</th>
                                                <th class="text-end" style="color: red;">300.000 VND</th>
                                            </tr>
                                        </table>

                                        <div class="row">
                                            <div class="col-6">
                                                <h4>Phương thức Thanh toán</h4>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p>Thanh toán khi nhận hàng</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
    <style>
        .progtrckr {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .progtrckr li {
            position: relative;
            flex: 1;
            text-align: center;
        }

        .progtrckr li h5 {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .progtrckr li h6 {
            margin: 5px 0 0;
            font-size: 12px;
            color: #999;
        }

        .progtrckr li::before {
            content: '';
            position: absolute;
            top: 15px;
            left: -50%;
            width: 100%;
            height: 2px;
            background-color: #ccc;
            z-index: 0;
        }

        .progtrckr li:first-child::before {
            display: none;
            /* Ẩn đường trên đầu tiên */
        }

        .progtrckr-done h5 {
            color: green;
            /* Màu cho trạng thái đã hoàn thành */
        }

        .progtrckr-done::before {
            background-color: green;
            /* Màu cho đường trạng thái đã hoàn thành */
        }

        .progtrckr-todo h5 {
            color: green;
            /* Màu cho trạng thái chưa hoàn thành */
        }

        .progtrckr-todo::before {
            background-color: green;
            /* Màu cho đường trạng thái chưa hoàn thành */
        }

        .progtrckr li:last-child::before {
            display: none;
            /* Ẩn đường cuối cùng */
        }
    </style>
@endsection
