<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="index.html" data-bs-original-title="" title="">
                <img class="img-fluid for-white" src="{{ asset('admin/assets/images/logo/full-white.png')}}" alt="logo">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="index.html">
                <img class="img-fluid main-logo main-white" src="{{ asset('assets/images/logo/logo.png')}}" alt="logo">
                <img class="img-fluid main-logo main-dark" src="{{ asset('assets/images/logo/logo-white.png')}}"
                    alt="logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="index.html">
                            <i class="ri-home-line"></i>
                            <span>Trang quản trị</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-store-3-line"></i>
                            <span>Sản phẩm</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="products.html">Quản lý sản phẩm</a>
                            </li>

                            <li>
                                <a href="add-new-product.html">Thêm mới sản phẩm</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Danh mục</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="category.html">Quản lý danh mục</a>
                            </li>

                            <li>
                                <a href="add-new-category.html">Thêm mới danh mục</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-settings-line"></i>
                            <span>Thuộc tính</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="attributes.html">Thuộc tính</a>
                            </li>

                            <li>
                                <a href="add-new-attributes.html">Thêm thuộc tính</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Người dùng</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-users.html">Người dùng</a>
                            </li>
                            <li>
                                <a href="add-new-user.html">Thêm mới người dùng</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Vai trò</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="role.html">Tất cả các vai trò</a>
                            </li>
                            <li>
                                <a href="create-role.html">Tạo Vai trò</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="media.html">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Truyền thông</span>
                        </a>
                    </li> --}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-archive-line"></i>
                            <span>Đơn hàng</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="order-list.html">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="order-detail.html">Chi tiết đơn hàng</a>
                            </li>
                            <li>
                                <a href="order-tracking.html">Theo dõi đơn hàng</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-focus-3-line"></i>
                            <span>Bản đồ</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="translation.html">Translation</a>
                            </li>

                            <li>
                                <a href="currency-rates.html">Currency Rates</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Phiếu giảm giá</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="coupon-list.html">Danh sách phiếu giảm giá</a>
                            </li>

                            <li>
                                <a href="create-coupon.html">Tạo phiếu giảm giá</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="taxes.html">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Thuế</span>
                        </a>
                    </li> --}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                            <i class="ri-star-line"></i>
                            <span>Quản lý đánh giá</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                            <i class="ri-phone-line"></i>
                            <span>Vé hỗ trợ</span>
                        </a>
                    </li> --}}

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-settings-line"></i>
                            <span>Cài đặt</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="profile-setting.html">Thiết lập hồ sơ</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                            <i class="ri-file-chart-line"></i>
                            <span>Báo cáo</span>
                        </a>
                    </li> --}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="list-page.html">
                            <i class="ri-list-check"></i>
                            <span>Trang danh sách</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>