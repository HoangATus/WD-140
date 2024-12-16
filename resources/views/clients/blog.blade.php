@extends('clients.layouts.client')
@section('content')
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

        .popular-article-card img {
            height: 200px;
            object-fit: cover;
        }

        .popular-article-card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            height: 350px;
        }

        .card-img-top {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            /* height: 200px; */
            object-fit: cover;
        }

        .carousel-inner .row {
            display: flex;
            justify-content: space-between;
        }



        .card-title {
            font-weight: bold;
        }

        .text {
            color: black
        }

        .card-text {
            font-size: 14px;
            color: #555;
        }

        h3 {
            font-size: 1rem;
            font-weight: bold;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-5 {
            margin-bottom: 3rem;
        }
    </style>

    <!-- Poster Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="banner-contain-2 hover-effect">
                <h3 class="banner-text mt-4">TIN TỨC MỚI NHẤT</h3>
                <h1 class="banner">Atus News</h1>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="blog-section section-b-space">
        @if ($hotNews || $relatedNews->isNotEmpty() || $popularNews->isNotEmpty() || $album->isNotEmpty() || $categories->isNotEmpty())
        @if ($hotNews)
        <div class="container-fluid-lg">
            <div class="row mb-5">
                <div class="col-md-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <h3 class="mb-3">Đọc ngay cho nóng</h3>
                    <div class="row">
                        <div class="col-md-7 mb-3 ">
                            <div class="card border-0 main-article-card"style="height: 610px;">
                                <a href="{{ route('clients.blogDetail', $hotNews->slug) }}" class="text">

                                    <img src="{{ Storage::url($hotNews->image) }}" class="card-img-top"
                                        alt="{{ $hotNews->title }}">

                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-secondary">{{ $hotNews->category->name }}</h6>
                                        <h4 class="card-title">{{ $hotNews->title }}</h4>
                                        <p class="card-text">
                                            {{ Str::limit($hotNews->content, 150) }}
                                            <a href="{{ route('clients.blogDetail', $hotNews->slug) }}"
                                                class="text-primary">Xem thêm</a>
                                        </p>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div style="height: 610px;" class="col-md-5   d-flex flex-column justify-content-between">
                        @foreach ($relatedNews as $news)
                            <a href="{{ route('clients.blogDetail', $news->slug) }}"class="text">

                                <div class="card border-0  related-article-card d-flex flex-row mb-3">
                                    <div class="  p-2">
                                        <img src="{{ Storage::url($news->image) }}"style="width: 170px; height: 165px;"
                                            alt="{{ $news->title }}">
                                    </div>
                                    <div class="card-body w-50 d-flex flex-column justify-content-center">
                                        <h6 class="card-subtitle mb-2 text-secondary">{{ $news->category->name }}</h6>
                                        <h5 class="card-title">{{ Str::limit($news->title, 50) }}</h5>
                                        <p class="card-text">{{ Str::limit($news->content, 100) }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <h3 class="mt-5 mb-3">Nhiều người quan tâm</h3>
                <div id="popularNewsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        @foreach ($popularNews as $index => $newsChunk)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($newsChunk as $news)
                                        <div class="col-md-6 ">


                                            <div class="card border-0 popular-article-card"> <a
                                                    href="{{ route('clients.blogDetail', $news->slug) }}"class="text">
                                                    <img src="{{ Storage::url($news->image) }}" class="card-img-top"
                                                        alt="{{ $news->title }}">
                                                    <div class="card-body">
                                                        <h6 class="card-subtitle mb-2 text-secondary">
                                                            {{ $news->category->name }}</h6>
                                                        <h5 class="card-title">{{ $news->title }}</h5>
                                                        <p class="card-text">
                                                            {{ Str::limit($news->content, 100) }}
                                                            <a href="{{ route('clients.blogDetail', $news->slug) }}"
                                                                class="text-primary">Xem thêm</a>
                                                        </p>
                                                </a>
                                            </div>

                                        </div>
                                </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#popularNewsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#popularNewsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h3 class="mt-5 mb-3">Bộ sưu tập</h3>

        <div class="d-flex flex-column justify-content-between">
            @foreach ($album as $news)
                <a href="{{ route('clients.blogDetail', $news->slug) }}"class="text">

                    <div class="card border-0 related-article-card d-flex flex-row mb-3">
                        <div class="p-2">
                            <img src="{{ Storage::url($news->image) }}" style="width: 220px; height: 200px;"
                                alt="{{ $news->title }}">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="card-subtitle mb-2 text-secondary">{{ $news->category->name }}</h6>
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">
                                {{ Str::limit($news->content, 100) }}
                                <a href="{{ route('clients.blogDetail', $news->slug) }}" class="text-primary">Xem thêm</a>
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        @foreach ($categories as $category)
            @if ($category->latestNews->isNotEmpty())
                <h3 class="mt-5 mb-3">{{ $category->name }}</h3>

                @foreach ($category->latestNews as $news)
                    <div class="d-flex flex-column justify-content-between">
                        <a href="{{ route('clients.blogDetail', $news->slug) }}" class="text">
                            <div class="card border-0 related-article-card d-flex flex-row mb-3">
                                <div class="p-2">
                                    <img src="{{ Storage::url($news->image) }}" style="width: 220px; height: 200px;"
                                        alt="{{ $news->title }}">
                                </div>
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h6 class="card-subtitle mb-2 text-secondary">{{ $news->category->name }}</h6>
                                    <h5 class="card-title">{{ $news->title }}</h5>
                                    <p class="card-text">
                                        {{ Str::limit($news->content, 100) }}
                                        <a href="{{ route('clients.blogDetail', $news->slug) }}" class="text-primary">Xem
                                            thêm</a>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        @endforeach


        </div>
        <div class="col-md-3 ">
            <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <h3 class="mb-3">Khuyến mãi hot</h3>
                @foreach ($promotions as $promotion)
                    <a href="{{ route('clients.blogDetail', $promotion->slug) }}"class="text">

                        <div class="card border-0 mb-3 promotion-card">
                            <img src="{{ Storage::url($promotion->image) }}" class="card-img-top"
                                alt="{{ $promotion->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $promotion->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($news->content, 100) }}
                                    <a href="{{ route('clients.blogDetail', $news->slug) }}" class="text-primary">Xem
                                        thêm</a>
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        </div>
        </div>

        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/6752f2c24304e3196aed5b3c/1iee08htm';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>

             @else
            <!-- No News Section -->
            <div class="container">
                <div class="no-news">
                    Không có tin tức nào
                </div>
            </div>
        @endif

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybrrJHXkckJgqD4IbLFwwD5hcj3m6MR5gFvfJ0GnSTg6i4p2g" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+dvpLPY86j3C9I2EioPoFNyw7Z8iZkW3h7" crossorigin="anonymous">
    </script>
@endsection
