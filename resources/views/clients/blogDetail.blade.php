@extends('clients.layouts.client')
@section('content')
    <!-- Breadcrumb Section Start -->
    <style>
        .banner-contain-2 {
            background-image: url('{{ asset('assets/images/banner1.jpg') }}');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 180px;
            align-items: center;
            text-align: center;
            color: white;
        }
    </style>
    <!-- Poster Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="banner-contain-2 hover-effect">
                <h3 class="banner-text mt-4">TIN TỨC MỚI NHẤT</h3>
                <h1 class="banner ">Atus News</h1>
            </div>
        </div>

        <!-- Blog Details Section Start -->
        <section class="blog-section section-b-space">


            <div class="container-fluid-lg">
                <p> <a href="{{ url('/blog') }}" class="mx-2"> Tin tức</a>|<a
                        class="mx-2">{{ $new->category->name }}</a>|<a class="mx-2">{{ $new->title }}</a>
                </p>
                <div class="row g-sm-4 g-3">


                    <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <h2 class="mb-3">{{ $new->title }}</h2>
                        <div class="blog-detail-image rounded-3 mb-4">

                            <img src="{{ Storage::url($new->image) }}" class="bg-img blur-up lazyload" alt="">
                            <div class="blog-image-contain">
                                <ul class="contain-list">
                                    <li>backpack</li>
                                    <li>life style</li>
                                    <li>organic</li>
                                </ul>
                                <h2>{{ $new->title }}</h2>
                                <ul class="contain-comment-list">
                                    <li>
                                        <div class="user-list">
                                            <i data-feather="user"></i>
                                            <span>{{ $new->author }}</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="user-list">
                                            <i data-feather="calendar"></i>
                                            <span>{{ $new->created_at }}</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="user-list">
                                            <i data-feather="message-square"></i>
                                            <span>{{ $new->view_count }} Comment</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="blog-detail-contain">
                            <p>{{ $new->content }}</p>
                        </div>
                        <div class="mt-5">
                            <h2 class="mb-3">Tham khảo thêm</h2>
                            <!-- Slideshow Section Start -->
                            <section class="related-news-carousel">
                                <div id="relatedNewsCarousel" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="5000">
                                    <div class="carousel-inner">
                                        @foreach ($relatedNews->chunk(4) as $index => $chunk)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <div class="row">
                                                    @foreach ($chunk as $related)
                                                        <div class="col-md-3 mb-4">
                                                            <div class="card" style="height: 300px;">
                                                                <a
                                                                    href="{{ route('clients.blogDetail', $related->slug) }}">
                                                                    <img src="{{ Storage::url($related->image) }}"
                                                                        class="card-img-top p-2" style="height: 120px;"
                                                                        alt="{{ $related->title }}">
                                                                </a>
                                                                <div class="card-body">
                                                                    <h6 class="card-subtitle mb-2 text-secondary">
                                                                        {{ $related->category->name }}</h6>
                                                                    <h4 class="card-title">
                                                                        {{ Str::limit($related->title, 30) }}</h4>
                                                                    <p class="card-text">
                                                                        {{ Str::limit($related->content, 50) }}</p>
                                                                    <a href="{{ route('clients.blogDetail', $related->slug) }}"
                                                                        class="text-primary">Xem thêm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </section>
                            <!-- Slideshow Section End -->

                        </div>
                        <div class="comment-box overflow-hidden">
                            <div class="leave-title">
                                <h3>Bình luận</h3>
                            </div>
                        
                            <div class="user-comment-box">
                                <ul>
                                    <li>
                                        <div class="user-box border-color">
                                            <div class="reply-button">
                                                <i class="fa-solid fa-reply"></i>
                                                <span class="theme-color">Trả lời</span>
                                            </div>
                                            <div class="user-image">
                                                <img src="../assets/images/inner-page/user/1.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <div class="user-name">
                                                    <h6>30 Tháng 1, 2022</h6>
                                                    <h5 class="text-content">Glenn Greer</h5>
                                                </div>
                                            </div>
                        
                                            <div class="user-contain">
                                                <p>"Đề xuất này là một tình huống đôi bên cùng có lợi, sẽ gây ra một sự thay đổi mô hình tuyệt vời, và tạo ra sự gia tăng gấp nhiều lần trong các sản phẩm mang lại sự hiểu biết tốt hơn."</p>
                                            </div>
                                        </div>
                                    </li>
                        
                                    <li>
                                        <div class="user-box border-color">
                                            <div class="reply-button">
                                                <i class="fa-solid fa-reply"></i>
                                                <span class="theme-color">Trả lời</span>
                                            </div>
                                            <div class="user-image">
                                                <img src="../assets/images/inner-page/user/2.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <div class="user-name">
                                                    <h6>30 Tháng 1, 2022</h6>
                                                    <h5 class="text-content">Glenn Greer</h5>
                                                </div>
                                            </div>
                        
                                            <div class="user-contain">
                                                <p>"Ừ, tôi nghĩ có thể bạn đúng. Đúng rồi, cho tôi một chai Pepsi không ga. Dĩ nhiên, điệu nhảy 'Enchantment Under The Sea' họ dự định tham gia, đó là nơi họ hôn nhau lần đầu tiên. Bạn sẽ biết thôi. Bạn chắc chắn về cơn bão này không?"</p>
                                            </div>
                                        </div>
                                    </li>
                        
                                    <li class="li-padding">
                                        <div class="user-box">
                                            <div class="reply-button">
                                                <i class="fa-solid fa-reply"></i>
                                                <span class="theme-color">Trả lời</span>
                                            </div>
                                            <div class="user-image">
                                                <img src="../assets/images/inner-page/user/3.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <div class="user-name">
                                                    <h6>30 Tháng 1, 2022</h6>
                                                    <h5 class="text-content">Glenn Greer</h5>
                                                </div>
                                            </div>
                        
                                            <div class="user-contain">
                                                <p>"Phô mai, phô mai dê, phô mai cottage, phô mai roquefort, phô mai kem, phô mai pecorino, phô mai chân, khi phô mai ra mọi người đều vui."</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="leave-box">
                            <div class="leave-title mt-0">
                                <h3>Để lại bình luận</h3>
                            </div>
                        
                            <div class="leave-comment">
                                <div class="comment-notes">
                                    <p class="text-content mb-4">Địa chỉ email của bạn sẽ không được công khai. Các trường bắt buộc được đánh dấu</p>
                                </div>
                                <div class="row g-3">
                                    <div class="col-xxl-4 col-lg-12 col-sm-6">
                                        <div class="blog-input">
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Họ và tên">
                                        </div>
                                    </div>
                        
                                    <div class="col-xxl-4 col-lg-12 col-sm-6">
                                        <div class="blog-input">
                                            <input type="email" class="form-control" id="exampleFormControlInput2"
                                                placeholder="Nhập địa chỉ email">
                                        </div>
                                    </div>
                        
                                    <div class="col-xxl-4 col-lg-12 col-sm-6">
                                        <div class="blog-input">
                                            <input type="url" class="form-control" id="exampleFormControlInput3"
                                                placeholder="Nhập URL">
                                        </div>
                                    </div>
                        
                                    <div class="col-12">
                                        <div class="blog-input">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Bình luận"></textarea>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="form-check d-flex mt-4 p-0">
                                    <input class="checkbox_animated" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label text-content" for="flexCheckDefault">
                                        <span class="color color-1">Lưu tên, email và website của tôi trong trình duyệt này để lần sau tôi bình luận.</span>
                                    </label>
                                </div>
                        
                                <button class="btn btn-animation ms-xxl-auto mt-xxl-0 mt-3 btn-md fw-bold">Đăng bình luận</button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-3 ">
                        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            <h3 class="mb-3">Khuyến mãi hot</h3>
                            @foreach ($promotions as $promotion)
                                <div class="card border-0 mb-3 promotion-card">
                                    <img src="{{ Storage::url($promotion->image) }}" class="card-img-top"
                                        alt="{{ $promotion->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $promotion->title }}</h5>
                                        <p class="card-text">{{ Str::limit($promotion->content, 80) }}</p>
                                        <a href="{{ route('clients.blogDetail', $promotion->slug) }}"
                                            class="text-primary">Xem thêm</a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
        </section>
        <!-- Blog Details Section End -->
    @endsection
