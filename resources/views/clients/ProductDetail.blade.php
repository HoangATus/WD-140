@extends('clients.layouts.client')

@section('content')

    <section class="">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">{{ $product->product_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">

                <div class="col-xl-6 wow fadeInUp">
                    <div class="product-left-box">
                        <div class="row g-2">

                            <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                <div class="product-main-2 no-arrow">
                                    @php

                                        $uniqueGalleries = $product->galleries->unique('image');

                                        $variantImages = $product->variants
                                            ->filter(function ($variant) use ($uniqueGalleries) {
                                                return $variant->image &&
                                                    !$uniqueGalleries->contains('image', $variant->image);
                                            })
                                            ->unique('image');
                                    @endphp

                                    <div class="slider-image">

                                        <img src="{{ Storage::url($product->product_image_url) }}" id="img-0"
                                            data-zoom-image="{{ Storage::url($product->product_image_url) }}"
                                            class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                            alt="{{ $product->product_name }}">
                                    </div>

                                    @foreach ($uniqueGalleries as $index => $gallery)
                                        <div class="slider-image">
                                            <img src="{{ Storage::url($gallery->image) }}" id="img-{{ $index + 1 }}"
                                                data-zoom-image="{{ Storage::url($gallery->image) }}"
                                                class="img-fluid image_zoom_cls-{{ $index + 1 }} blur-up lazyload"
                                                alt="{{ $product->product_name }} Gallery {{ $index + 1 }}">
                                        </div>
                                    @endforeach


                                    @foreach ($variantImages as $index => $variantImage)
                                        <div class="slider-image">
                                            <img src="{{ Storage::url($variantImage->image) }}"
                                                data-zoom-image="{{ Storage::url($variantImage->image) }}"
                                                class="img-fluid image_zoom_cls-{{ $uniqueGalleries->count() + $index + 1 }} blur-up lazyload"
                                                alt="{{ $product->product_name }} Variant">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                    <div>
                                        <div class="sidebar-image">
                                            <img src="{{ Storage::url($product->product_image_url) }}"
                                                class="img-fluid blur-up lazyload" alt="{{ $product->product_name }}">
                                        </div>
                                    </div>

                                    @foreach ($uniqueGalleries as $gallery)
                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{ Storage::url($gallery->image) }}"
                                                    class="img-fluid blur-up lazyload"
                                                    alt="{{ $product->product_name }} Gallery">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="right-box-contain">

                        <h2 class="name">{{ $product->product_name }}</h2>

                        <div class="pro" style="text-align: left; margin-left: 0;">
                            <p>Mã sản phẩm <b>: {{ $product->product_code }}</b></p>
                            <div class="product-rating custom-rate">
                                <ul class="rating">
                                    @php
                                        $averageRating = $product->ratings->avg('rating');
                                    @endphp

                                    @for ($i = 1; $i <= 5; $i++)
                                        <li>
                                            @if ($i <= $averageRating)
                                                <i data-feather="star" class="fill"></i>
                                            @else
                                                <i data-feather="star"></i>
                                            @endif
                                        </li>
                                    @endfor
                                </ul>
                                <span class="review">{{ $product->ratings->count() }} Đánh giá</span>
                            </div>
                            <div class="product-detail">
                                <h3 class="theme-color price" id="current-price" style="font-size: 26px">
                                    {{ number_format($product->variants->first()->variant_sale_price, 0, ',', '.') }}
                                    VNĐ
                                </h3>
                                <del id="current-listed-price" class="text-content">
                                    {{ number_format($product->variants->first()->variant_listed_price, 0, ',', '.') }}
                                    VNĐ
                                </del>
                            </div>

                            <div class="product-options">
                                <div class="option-title" style="margin-top: 10px">Màu sắc:</div>
                                <div class="option-list" id="color-options">
                                    @php
                                        $colorCounts = [];
                                        $sizeCounts = [];
                                        foreach ($product->variants as $variant) {
                                            $color = $variant->color->name;
                                            $size = $variant->size->attribute_size_name;
                                            $quantity = $variant->quantity ?? 0;

                                            if (!isset($colorCounts[$color])) {
                                                $colorCounts[$color] = 0;
                                            }
                                            $colorCounts[$color] += $quantity;

                                            if (!isset($sizeCounts[$size])) {
                                                $sizeCounts[$size] = 0;
                                            }
                                            $sizeCounts[$size] += $quantity;
                                        }
                                    @endphp

                                    @foreach ($colorCounts as $color => $totalQuantity)
                                        <button class="option-item-color btn-color" style="margin-bottom: 10px;"
                                            data-color="{{ $color }}" data-quantity="{{ $totalQuantity }}">
                                            <span class="color-name">{{ $color }} </span>
                                            <span class="checkmark" style="display: none; "><i
                                                    class="fa-solid fa-check"></i></span>
                                        </button>
                                    @endforeach
                                </div>

                                <div class="option-title">Kích thước:</div>
                                <div class="option-list" id="size-options">
                                    @foreach ($sizeCounts as $size => $totalQuantity)
                                        <button class="option-item-size btn-size" data-size="{{ $size }}"
                                            data-total-quantity="{{ $totalQuantity }}">
                                            <span class="size-name">{{ $size }} </span>
                                            <span class="checkmark" style="display: none;"><i
                                                    class="fa-solid fa-check"></i></span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="available-quantity" id="available-quantity" style="margin-top: 10px;">
                                Số lượng có sẵn: <span id="available-quantity-value">N/A</span>
                            </div>

                            <div class="note-box product-package">
                                <div class="cart_qty qty-box product-qty">
                                    <div class="input-group">
                                        <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input class="form-control input-number qty-input" type="number" name="quantity"
                                            value="1" min="1" max="1" id="quantity-input">
                                        <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="selected-variant-id" name="variant_id" value="">
                            <input type="hidden" id="selected-quantity" name="quantity" value="1">
                        </div>

                        <div class="note-box product-package">
                            <button onclick="addToCart()" class="btn btn-md bg-dark cart-button text-white w-50">Thêm vào
                                giỏ</button>
                            <button onclick="buyNow()" class="btn btn-md bg-danger cart-button text-white w-50">Mua
                                ngay</button>
                        </div>
                        <script>
                            function addToCart(variantId, quantity) {
                                fetch('/cart/add', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            variant_id: variantId,
                                            quantity: quantity
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.message) {
                                            // Thông báo thành công hoặc lỗi
                                            alert(data.message);
                                        }

                                        // Cập nhật số lượng giỏ hàng trên giao diện
                                        document.getElementById('cart-count').textContent = data.cart_count;
                                    })
                                    .catch(error => console.error('Lỗi khi thêm vào giỏ:', error));
                            }

                            function addToCart() {
                                if (!isLoggedIn) {
                                    alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
                                    window.location.href = '/login'; // Chuyển hướng đến trang đăng nhập
                                    return;
                                }
                                // Gọi API hoặc thực hiện logic thêm vào giỏ hàng
                            }

                            function buyNow() {
                                if (!isLoggedIn) {
                                    alert('Bạn cần đăng nhập để mua sản phẩm.');
                                    window.location.href = '/login'; // Chuyển hướng đến trang đăng nhập
                                    return;
                                }
                                // Gọi API hoặc thực hiện logic mua ngay
                            }
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="product-section-box">
                    <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab">Mô tả</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab">Đánh giá từ khách hàng</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#infoo"
                                type="button" role="tab">Bình luận từ khách hàng</button>
                        </li>
                    </ul>

                    <div class="tab-content custom-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="product-description">
                                <div class="nav-desh">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="info" role="tabpanel">
                            <div class="table-responsive">
                                <h4 class="mb-4">Đánh giá từ khách hàng</h4>

                                @if ($product->ratings->count() > 0)
                                    @foreach ($product->ratings as $rating)
                                        @if (!$rating->hidden)
                                            <div class="customer-review border p-3 mb-3 rounded"
                                                style="background-color: #f9f9f9;">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <strong class="me-2"
                                                        style="color: #008080;">{{ $rating->user->user_name }}</strong>

                                                    <small
                                                        class="text-muted">{{ $rating->created_at->format('d/m/Y') }}</small>
                                                </div>
                                                <ul class="rating list-unstyled mb-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li class="d-inline">
                                                            @if ($i <= $rating->rating)
                                                                <i data-feather="star" class="fill"></i>
                                                            @else
                                                                <i data-feather="star"></i>
                                                            @endif
                                                        </li>
                                                    @endfor
                                                </ul>
                                                <p class="mb-0">{{ $rating->review }}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <p class="text-muted">Chưa có đánh giá nào từ khách hàng.</p>
                                @endif


                            </div>
                        </div>

                        <div class="tab-pane fade" id="infoo" role="tabpanel">

                            <div class="table-responsive">

                                @if ($product->comments->isEmpty())
                                    <p>Chưa có bình luận nào.</p>
                                @else
                                    <ul style="list-style-type: none; padding: 0;">
                                        @foreach ($product->comments as $comment)
                                            @if ($comment->is_approved || auth()->id() === $comment->user_id)
                                                <li class="{{ !$comment->is_approved ? 'unapproved' : '' }}"
                                                    style="margin-bottom: 15px; display: block;">
                                                    <div
                                                        style="display: flex; justify-content: space-between; align-items: center;">
                                                        <span
                                                            style="font-weight: bold;">{{ $comment->user->user_name }}</span>
                                                        <span
                                                            style="color: gray;">{{ $comment->created_at->format('d/m/Y') }}</span>
                                                    </div>
                                                    <p
                                                        style="margin-top: 5px; @if (!$comment->is_approved) opacity: 0.5; @endif">
                                                        {{ $comment->comment }}</p>

                                                    @if (!$comment->is_approved)
                                                        <p style="color: red; margin-top: 5px; font-size: 12px;">
                                                            Đang chờ phê duyệt...</p>
                                                    @endif
                                                </li>

                                                <hr style="border: 1px solid #ccc; margin: 10px 0;">
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="">
                                    <h3>Bình luận:</h3>
                                </div>

                                @if (session('successs'))
                                    <p style="color: green; margin-top: 8px;">{{ session('successs') }}</p>
                                @endif

                                <div class="comments mt-3">
                                    <form action="{{ route('comments.store', $product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <textarea name="comment" placeholder="Viết bình luận của bạn..." required
                                            style="width: 800px; height: 50px; border-radius: 5px; padding: 15px; text-align: left; margin-bottom: 5px;"></textarea>
                                        <br>
                                        <button type="submit mt-2"
                                            style="border-radius: 5px; border: 1px solid #fff; padding: 10px 20px; background-color: #417394; color: white;">
                                            Gửi
                                        </button>
                                    </form>
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
    <style>
        .customer-review {
            transition: box-shadow 0.3s;
        }

        .customer-review:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .rating i {
            color: #FFD700;

        }
    </style>

    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Sản phẩm liên quan</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div>
                                <div class="product-box-3 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('products.show', $relatedProduct->slug) }}">
                                                <img src="{{ Storage::url($relatedProduct->product_image_url) }}"
                                                    class="img-fluid blur-up lazyload"
                                                    alt="{{ $relatedProduct->product_name }}">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="product-details">
                                        <div class="product-name">
                                            <a style="color: black"
                                                href="{{ route('products.show', $product->slug) }}">{{ $product->product_name }}</a>
                                        </div>
                                        <div class="product-ratin custom-rate">
                                            <ul class="rating" style="display: flex; justify-content: center">
                                                @php
                                                    $averageRating = $product->ratings->avg('rating');
                                                @endphp

                                                @for ($i = 1; $i <= 5; $i++)
                                                    <li>
                                                        @if ($i <= $averageRating)
                                                            <i data-feather="star" class="fill"></i>
                                                        @else
                                                            <i data-feather="star"></i>
                                                            < @endif
                                                    </li>
                                                @endfor
                                            </ul>
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
                                                    <del>{{ number_format($firstVariant->variant_listed_price, 0, ',', '.') }}
                                                        VNĐ</del>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="add-buttons d-flex align-items-center">
                                            <button class="cart" onclick="addToCart()">
                                                Thêm vào giỏ
                                                <span class="add-icon bg-light-gray">
                                                    <i class="bi bi-cart"></i>
                                                </span>
                                            </button>

                                            <form action="{{ route('clients.favorites.store') }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button class="cart-icon" name="product_id" value="{{ $product->id }}"
                                                    type="submit">
                                                    <i class="fa-regular fa-heart"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('clients.blocks.assets.js')

    <script>
        const variants = @json($variants);
    </script>

    <style>
        .note-box {
            margin-bottom: 40px;
        }

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
            height: 180px;
            object-fit: cover;
        }


        .product-details {
            text-align: center;
            flex: 1;

        }

        .product-name {
            font-weight: bold;
            color: #333;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            display: -webkit-box;
            overflow: hidden;
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

        .add-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .cart {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #417394;
            color: white;
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s, border-color 0.2s;
            font-weight: bold;
            padding: 5px 11px;
            font-size: 13px;
        }

        .cart-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #417394;
            color: white;
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s, border-color 0.2s;
            font-weight: bold;
            padding: 6px;
            font-size: 15px;
        }

        .add-icon {
            margin-left: 5px;
        }


        .cart:hover {
            background-color: #355c74;
            transform: scale(1.05);
            border-color: #355c74;
            border: none;

        }

        .cart-icon:hover {
            background-color: #417394;
            color: white;

            transform: scale(1.05);
            border-color: #355c74;
            border: none;

        }
    </style>

    <script>
        const variantStock = @json($variantStock);
    </script>
    <script>
        const cartData = @json(session('cart_' . Auth::id(), []));
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorOptions = document.querySelectorAll('#color-options .btn-color');
            const sizeOptions = document.querySelectorAll('#size-options .btn-size');
            const quantityInput = document.getElementById('quantity-input');
            const availableQuantity = document.getElementById('available-quantity-value');
            const currentPrice = document.getElementById('current-price');
            const currentListedPrice = document.getElementById('current-listed-price');
            const mainImage = document.querySelector('.slider-image img');

            let selectedColor = null;
            let selectedSize = null;
            let selectedVariant = null;

            function resetSelections() {
                sizeOptions.forEach(btn => {
                    btn.classList.remove('active');
                    btn.querySelector('.checkmark').style.display = 'none';
                });
                selectedSize = null;
                selectedVariant = null;
                document.getElementById('selected-variant-id').value = '';
                document.getElementById('selected-quantity').value = 1;
                quantityInput.value = 1;
                updateUI(null);
            }

            function findVariant(color, size) {
                return variants.find(variant => variant.color === color && variant.size === size);
            }

            function updateUI(variant) {
                if (variant) {

                    currentPrice.textContent = new Intl.NumberFormat('vi-VN').format(variant.sale_price) + ' ₫';
                    currentListedPrice.textContent = new Intl.NumberFormat('vi-VN').format(variant.listed_price) +
                        ' ₫';


                    availableQuantity.textContent = variant.quantity;

                    mainImage.src = variant.image;
                    mainImage.setAttribute('data-zoom-image', variant.image);

                    quantityInput.max = variant.quantity;
                    if (variant.quantity > 0) {
                        quantityInput.value = 1;
                    } else {
                        quantityInput.value = 0;
                    }

                    document.getElementById('selected-variant-id').value = variant.id;
                    document.getElementById('selected-quantity').value = quantityInput.value;
                } else {

                    currentPrice.textContent = 'N/A';
                    currentListedPrice.textContent = 'N/A';
                    availableQuantity.textContent = 'N/A';
                    mainImage.src = "{{ Storage::url($product->product_image_url) }}";
                    mainImage.setAttribute('data-zoom-image', "{{ Storage::url($product->product_image_url) }}");
                    quantityInput.max = 1;
                    quantityInput.value = 1;

                    document.getElementById('selected-variant-id').value = '';
                    document.getElementById('selected-quantity').value = 1;
                }
            }

            colorOptions.forEach(btn => {
                btn.addEventListener('click', function() {

                    colorOptions.forEach(b => {
                        b.classList.remove('active');
                        b.querySelector('.checkmark').style.display = 'none';
                    });

                    this.classList.add('active');
                    this.querySelector('.checkmark').style.display = 'block';

                    selectedColor = this.getAttribute('data-color');

                    resetSelections();

                    const availableSizes = variants
                        .filter(variant => variant.color === selectedColor && variant.quantity > 0)
                        .map(variant => variant.size);

                    const uniqueAvailableSizes = [...new Set(availableSizes)];

                    sizeOptions.forEach(btn => {
                        const size = btn.getAttribute('data-size');
                        if (uniqueAvailableSizes.includes(size)) {
                            btn.disabled = false;
                            btn.classList.remove('disabled');
                        } else {
                            btn.disabled = true;
                            btn.classList.add('disabled');
                            btn.classList.remove('active');
                            btn.querySelector('.checkmark').style.display = 'none';
                        }
                    });

                    if (uniqueAvailableSizes.length === 1) {
                        sizeOptions.forEach(btn => {
                            if (btn.getAttribute('data-size') === uniqueAvailableSizes[0]) {
                                btn.click();
                            }
                        });
                    }
                });
            });

            sizeOptions.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (this.disabled) return;

                    sizeOptions.forEach(b => {
                        b.classList.remove('active');
                        b.querySelector('.checkmark').style.display = 'none';
                    });
                    this.classList.add('active');
                    this.querySelector('.checkmark').style.display = 'block';

                    selectedSize = this.getAttribute('data-size');

                    selectedVariant = findVariant(selectedColor, selectedSize);

                    updateUI(selectedVariant);
                });
            });

            quantityInput.addEventListener('change', function() {
                const max = parseInt(this.max);
                let value = parseInt(this.value);

                if (isNaN(value) || value < 1) {
                    value = 1;
                } else if (value > max) {
                    value = max;
                }

                this.value = value;
                document.getElementById('selected-quantity').value = value;
            });
        });


        // hàm thêm sản phẩm 
        document.addEventListener('DOMContentLoaded', function() {
            // Biến chứa số lượng tồn kho của các biến thể
            const variantStock = @json($variantStock);


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


            // Hàm kiểm tra trạng thái đăng nhập
            function checkLogin() {
                return {{ auth()->check() ? 'true' : 'false' }};
            }

            // Hàm thêm sản phẩm vào giỏ hàng
            window.addToCart = function() {
                console.log('addToCart function called');

                const isLoggedIn = checkLogin();
                if (!isLoggedIn) {
                    alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
                    window.location.href = '/login';
                    return;
                }

                const variantId = document.getElementById('selected-variant-id').value;
                const quantity = parseInt(document.getElementById('quantity-input').value);

                console.log('Variant ID:', variantId);
                console.log('Quantity:', quantity);

                if (!variantId) {
                    alert('Vui lòng chọn đầy đủ thông tin của sản phẩm.');
                    return;
                }

                if (!variantStock[variantId]) {
                    alert('Sản phẩm đã được thêm toàn bộ số lượng vào giỏ hàng.');
                    return;
                }

                const availableStock = variantStock[variantId];
                if (quantity > availableStock) {
                    alert(`Không thể thêm quá số lượng tồn kho. Tồn kho hiện tại: ${availableStock}`);
                    return;
                }

                axios.post('{{ route('cart.add') }}', {
                        variant_id: variantId,
                        quantity: quantity
                    })
                    .then(response => {
                        console.log('Add to cart response:', response);
                        alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
                        fetchCartCount(); // Cập nhật số lượng giỏ hàng sau khi thêm sản phẩm
                        // Cập nhật tồn kho sau khi thêm
                        variantStock[variantId] -= quantity;

                        // Cập nhật số lượng giỏ hàng từ response
                        const cartCount = response.data.cart_count;
                        document.getElementById('cart-count').textContent = cartCount;
                    })
                    .catch(error => {
                        console.error('Add to cart error:', error);
                        if (error.response && error.response.data && error.response.data.message) {
                            alert(error.response.data.message);
                        } else {
                            alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
                        }
                    });

            };

            // Hàm Mua ngay
            window.buyNow = function() {
                console.log('buyNow function called');

                const isLoggedIn = checkLogin();
                console.log('isLoggedIn:', isLoggedIn);

                if (!isLoggedIn) {
                    alert('Bạn cần đăng nhập để mua sản phẩm.');
                    window.location.href = '/login';
                    return;
                }

                const variantId = document.getElementById('selected-variant-id').value;
                const quantity = parseInt(document.getElementById('quantity-input').value);

                if (!variantId) {
                    alert('Vui lòng chọn một biến thể hợp lệ.');
                    return;
                }

                if (quantity <= 0) {
                    alert('Vui lòng chọn số lượng hợp lệ.');
                    return;
                }

                if (typeof cartData === 'undefined') {
                    console.error('cartData is undefined. Setting it to an empty object.');
                    var cartData = {}; // Khởi tạo nếu chưa tồn tại
                }

                if (!variantStock[variantId]) {
                    alert('Biến thể này không tồn tại trong kho.');
                    return;
                }

                const availableStock = variantStock[variantId];
                const cartQuantity = cartData[variantId] || 0; // Lấy số lượng trong giỏ hàng (0 nếu không có)
                const remainingStock = availableStock - cartQuantity;

                if (quantity > remainingStock) {
                    alert(`Không thể mua quá số lượng tồn kho. Số lượng còn lại: ${remainingStock}`);
                    return;
                }

                window.location.href = `/checkout2?variant_id=${variantId}&quantity=${quantity}`;
            };

        });
    </script>
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
@endsection
