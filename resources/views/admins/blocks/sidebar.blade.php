<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admins/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admins/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admins/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logoatus.png') }}" alt="" height="50">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title"></li>

                <li>
                    <a href="{{ route('admins.dashboard') }}">
                        <i data-feather="home"></i>Bảng điều khiển
                    </a>
                </li>
                <li>
                    <a href="#sidebarError" data-bs-toggle="collapse">
                        <i class="fa-solid fa-list"></i>
                        <span> Danh Mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarError">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{route('admins.categories.index')}}">- Quản lý danh mục</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{route('admins.categories.create')}}">- Thêm mới danh mục</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Sản Phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href= "{{route('admins.products.index')}}">- Quản lý sản phẩm</a>
                            </li>
                            <li>
                                <a class='tp-link' href= "{{route('admins.products.create')}}">- Thêm mới sản phẩm</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

             

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="ri-list-settings-line"></i>
                        <span> Thuộc tính </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{route('admins.colors.index')}}">- Màu sắc</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{route('admins.attributeSizes.index')}}">- Kích thước</a>
                            </li>
                        </ul>
                    </div>
                </li> <li>
                    <a href="{{ route('admins.users.index') }}">
                        <i class="ri-list-settings-line"></i>
                        Tài khoản

                    </a>
                </li>
                <li>
                    <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                        <i data-feather="cpu"></i>
                        <span>Quản lý banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdvancedUI">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admins.banners.index') }}">- Quản lý Banner</a>

                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admins.banners.create') }}">- Thêm mới Banner</a>

                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li>
                    <a class='tp-link' href="{{ route('admins.orders.index') }}">
                        <i data-feather="briefcase"></i>

                        <span>  Quản lý đơn hàng  </span>
                    </a>
                </li>
               
                <li>
                    <a class='tp-link' href="{{ route('admins.comments.index') }}">
                    <i class="fa-regular fa-comment"></i>

                        <span>  Quản lý bình luận  </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>