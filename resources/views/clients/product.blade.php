@extends('clients.layouts.client')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">

                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Sản Phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Poster Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-1 slider-animate product-wrapper no-arrow">
                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="https://theme.hstatic.net/200000690725/1001078549/14/slide_4_img.jpg?v=474"
                                    class=" rounded-3 blur-up lazyload" width="100%" height="400" alt="">

                            </div>
                        </div>

                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="https://theme.hstatic.net/200000690725/1001078549/14/slide_1_img.jpg?v=474"
                                    class=" rounded-3 blur-up lazyload" width="100%" height="400" alt="">
                            </div>
                        </div>

                        {{-- <div>
                                <div class="banner-contain-2 hover-effect">
                                    <img src="https://theme.hstatic.net/200000690725/1001078549/14/slide_3_img.jpg?v=474" class=" rounded-3 blur-up lazyload" width="100%" height="400" alt="">
                                </div>
                            </div> --}}


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Poster Section End -->

    <!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-custom-3">
                    <div class="left-box wow fadeInUp">
                        <div class="shop-left-sidebar">
                            <div class="back-button">
                                <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                            </div>


                            <div class="accordion custom-accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h4 class="accordion-header" id="headingOne">
                                        <span><strong>Chọn Danh Mục:</strong></span>
                                    </h4>
                                    <div id="collapseOne" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <form method="GET" action="{{ route('products.index') }}">
                                                <ul class="category-list custom-padding custom-height">
                                                    @foreach ($listCategory as $category)
                                                        <li>
                                                            <div class="form-check ps-0 m-0 category-list-box">
                                                                <input class="checkbox_animated" type="checkbox"
                                                                    id="fruit" name="category_ids[]"
                                                                    value="{{ $category->id }}"
                                                                    {{ in_array($category->id, request()->input('category_ids', [])) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="fruit">
                                                                    <span class="name"> {{ $category->name }}</span>
                                                                    <span
                                                                        class="number">({{ $category->products_count }})</span>

                                                                </label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <h4 class="accordion-header mt-3" id="headingOne">
                                                    <span><strong>Khoảng Giá:</strong></span>
                                                </h4>

                                                <div class="form-check ps-0 m-0 category-list-box mt-3">
                                                    <input class="checkbox_animated" id="fruit" type="checkbox"
                                                        name="price_range[]" value="0-100000"
                                                        {{ in_array('0-100000', request('price_range', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="fruit">
                                                        <span class="name"> 0 - 100k</span>
                                                    </label>
                                                </div>
                                                <div class="form-check ps-0 m-0 category-list-box mt-2">
                                                    <input class="checkbox_animated" id="fruit" type="checkbox"
                                                        name="price_range[]" value="100000-200000"
                                                        {{ in_array('100000-200000', request('price_range', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="fruit">
                                                        <span class="name"> 100k - 200k</span>
                                                    </label>
                                                </div>
                                                <div class="form-check ps-0 m-0 category-list-box mt-2">
                                                    <input class="checkbox_animated" id="fruit" type="checkbox"
                                                        name="price_range[]" value="200000-500000"
                                                        {{ in_array('200000-500000', request('price_range', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="fruit">
                                                        <span class="name"> 300k - 500k</span>
                                                    </label>
                                                </div>


                                                <div class="mt-3">
                                                    <button class="btn btn-sm" type="submit"
                                                        style=" background-color: green; color: white; width:100%;">Lọc</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-custom-">
                    <div class="show-button">
                        <div class="filter-button-group mt-0">
                            <div class="filter-button d-inline-block d-lg-none">
                                <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
                            </div>
                        </div>

                        <div class="top-filter-menu">
                            <div class="category-dropdown">
                                <h5 class="text-content">Sắp xếp theo :</h5>
                                <div class="dropdown">
                                    <button class="dropdown-toggle btn btn-secondary" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>
                                            @switch(request()->get('sort'))
                                                @case('low')
                                                    Giá thấp - cao
                                                @break

                                                @case('high')
                                                    Giá cao - thấp
                                                @break

                                                @case('aToz')
                                                    Tên từ A - Z
                                                @break

                                                @case('zToa')
                                                    Tên từ Z - A
                                                @break

                                                @default
                                                    Chọn sắp xếp
                                            @endswitch
                                        </span>
                                        <i class="fa-solid fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item"
                                                href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'low'])) }}">Giá
                                                thấp - cao</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'high'])) }}">Giá
                                                cao - thấp</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'aToz'])) }}">Tên
                                                từ A - Z</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'zToa'])) }}">Tên
                                                từ Z - A</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-1 product-list-section">
                        @if ($listProduct->isEmpty())
                            <p>Không có sản phẩm nào được tìm thấy.</p>
                        @else
                            @foreach ($listProduct as $product)
                                <div>
                                    <div class="product-grid">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="{{ route('products.show', $product->slug) }}">
                                                    <img src="{{ Storage::url($product->product_image_url) }}" class="" alt="{{ $product->product_name }}">
                                                </a>
                                            </div>
                    
                                            <div class="product-detail">
                                                <div class="product-name">
                                                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->product_name }}</a>
                                                </div>
                                                @if ($product->variants->isNotEmpty())
                                                    @php
                                                        $firstVariant = $product->variants->first();
                                                    @endphp
                                                    <div class="price">
                                                        <div class="sale-price">
                                                            {{ number_format($firstVariant->variant_sale_price, 0, ',', '.') }} VNĐ
                                                        </div>
                                                        <div class="listed-price">
                                                            <del>{{ number_format($firstVariant->variant_listed_price, 0, ',', '.') }} VNĐ</del>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="add">
                                                    <button class="cart" onclick="addToCart()">Thêm vào giỏ
                                                        <span class="add-icon bg-light-gray">
                                                            <i class="bi bi-cart"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    
                        <style>
                            .product-grid {
                                display: grid;
                                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                                gap: 20px;
                            }
                    
                            .product-box {
                                border: 1px solid #ccc;
                                border-radius: 15px;
                                padding: 15px;
                                transition: transform 0.2s;
                                background-color: #fff;
                                overflow: hidden;
                                display: flex;
                                flex-direction: column;
                            }
                    
                            .product-box:hover {
                                transform: scale(1.05);
                            }
                    
                            .product-image img {
                                border-radius: 8px;
                                max-width: 100%;
                                height: 140px;
                                object-fit: cover;
                            }
                    
                            .product-detail {
                                text-align: center;
                                flex: 1;
                            }
                    
                            .product-name {
                                font-weight: bold;
                                color: #333;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }
                    
                            .price {
                                margin-top: 10px;
                                font-size: 16px;
                            }
                    
                            .sale-price {
                                font-size: 18px;
                                color: #d9534f;
                                font-weight: bold;
                            }
                    
                            .listed-price {
                                font-size: 14px;
                                color: #999;
                                text-decoration: line-through;
                            }
                    
                            .add {
                                display: flex;
                                justify-content: center;
                                margin-top: 10px;
                            }
                    
                            .cart {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                padding: 10px 20px;
                                background-color: #417394;
                                color: white;
                                border: none;
                                border-radius: 8px;
                                font-weight: bold;
                                cursor: pointer;
                                transition: background-color 0.2s, transform 0.2s;
                                width: 100%;
                                max-width: 200px;
                                text-align: center;
                            }
                    
                            .cart:hover {
                                background-color: #355c74;
                                transform: scale(1.05);
                            }
                    
                            .add-icon {
                                margin-left: 8px;
                                display: flex;
                                align-items: center;
                            }
                        </style>
                    </div>
                    

                    <div class="pagination-area text-center mt-3">
                        {{ $listProduct->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
