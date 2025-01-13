@extends('clients.layouts.client')

@section('content')
    <section class="user-dashboard-section section-b-space">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <div class="container-fluid-lg">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-10">
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-order" role="tabpanel">
                                <div class="dashboard-order">

                                    <div class="title text-center mb-5">
                                        <h2 class="fw-bold" style="font-size: 28px;">Thông tin đơn hàng</h2>
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
                                            <h5 class="fw-bold" style="font-size: 20px;">Mã đơn hàng:
                                                <span class="text-danger">{{ $order->order_code }}</span>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="order-summary mt-4">
                                        <table class="table order-summary-table table-bordered table-striped">
                                            <tr>
                                                <td class="fw-bold">Tên người nhận :</td>
                                                <td class="text-end">{{ $order->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Số điện thoại :</td>
                                                <td class="text-end">{{ $order->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Địa chỉ nhận hàng :</td>
                                                <td class="text-end">{{ $order->address }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Ngày đặt hàng :</td>
                                                <td class="text-end">{{ $order->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Ghi chú nhận hàng :</td>
                                                <td class="text-end">{{ $order->notes ?? 'Không có' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Trạng thái đơn hàng :</td>
                                                <td class="text-end">
                                                    @if ($order->status == 'pending')
                                                        <span class="badge badge-warning">Chờ xử lý</span>
                                                    @elseif ($order->status == 'confirmed')
                                                        <span class="badge badge-info">Đã xác nhận</span>
                                                    @elseif ($order->status == 'shipped')
                                                        <span class="badge badge-primary">Đang giao hàng</span>
                                                    @elseif ($order->status == 'failed')
                                                        <span class="badge bg-secondary">Giao Hàng Thất Bại</span>
                                                    @elseif ($order->status == 'delivered')
                                                        <span class="badge bg-success">Giao Hàng Thành Công </span>
                                                    @elseif ($order->status == 'completed')
                                                        <span class="badge badge-success">Hoàn thành</span>
                                                    @elseif ($order->status == 'canceled')
                                                        <span class="badge badge-danger">Đã hủy</span>
                                                        <p class="text-danger">({{ $order->cancellation_reason }})</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Phương thức thanh toán :</td>
                                                <td class="text-end">{{ $order->payment_method }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Trạng thái thanh toán :</td>
                                                <td class="text-end">{{ $order->payment }}</td>
                                            </tr>

                                            <tr>
                                                <td class="fw-bold">Tổng tiền hàng :</td>
                                                <td class="text-end">
                                                    @php
                                                        $totalAmount = 0;
                                                    @endphp
                                                    @foreach ($order->items as $item)
                                                        @php
                                                            $totalAmount += $item->price * $item->quantity;
                                                        @endphp
                                                    @endforeach
                                                    {{ number_format($totalAmount, 0, ',', '.') }} VNĐ
                                                </td>
                                            </tr>


                                            @php
                                                $voucher = $order->voucher;
                                                $displayDiscount = 'Không áp dụng';

                                                if ($voucher) {
                                                    // Kiểm tra loại giảm giá
                                                    if (
                                                        $voucher->discount_type === 'fixed' &&
                                                        $voucher->discount_value > 0
                                                    ) {
                                                        // Định dạng số tiền với dấu chấm
                                                        $displayDiscount =
                                                            '- ' .
                                                            number_format($voucher->discount_value, 0, ',', '.') .
                                                            ' VNĐ';
                                                    } elseif (
                                                        $voucher->discount_type === 'percent' &&
                                                        $voucher->discount_percent > 0
                                                    ) {
                                                        $displayDiscount = $voucher->discount_percent . '%';
                                                    }
                                                }
                                            @endphp
                                            <td class="fw-bold">Voucher :</td>
                                            <td class="text-end">{{ $displayDiscount }}</td>

                                            @php
                                                $displayPoints = 'Không sử dụng';

                                                if (!empty($order->points_discount) && $order->points_discount > 0) {
                                                    $displayPoints =
                                                        '- ' .
                                                        number_format($order->points_discount, 0, ',', '.') .
                                                        ' VNĐ';
                                                }
                                            @endphp

                                            <tr>
                                                <td class="fw-bold">Điểm tích lũy :</td>
                                                <td class="text-end">{{ $displayPoints }}</td>
                                            </tr>


                                            <tr>
                                                <th class="fw-bold" style="font-size: 18px;">Thành tiền :</th>
                                                <th class="text-end" style="color: red;">
                                                    {{ number_format($order->total, 0, ',', '.') }} VNĐ</th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="order-box dashboard-bg-box mt-4 p-4 border rounded">
                                        <h3 class="fw-bold mb-4"
                                            style="font-size: 24px; text-transform: uppercase; color: #333;">Sản phẩm
                                        </h3>
                                        @if ($orderItems->count() > 0)
                                            @foreach ($orderItems as $item)
                                                <div class="row mb-4 pb-3 border-bottom align-items-center">
                                                    <div class="col-md-3">
                                                        <a href="{{ route('products.show', $item->product->slug) }}"
                                                            class="order-image">
                                                            <img src="{{ $item->image }}" class="img-fluid rounded"
                                                                alt="" style="max-width: 50%;">
                                                        </a>
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                        class="img-fluid rounded" alt=""
                                                        style="max-width: 50%;"></a>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="order-wrap">
                                                            <a href="{{ route('products.show', $item->product->slug) }}">
                                                                <h4 class="fw-bold"
                                                                    style="font-size: 20px; color: #025e75;">
                                                                    {{ $item->product_name }}</h4>
                                                            </a>
                                                            <ul class="product-size list-unstyled mb-0">
                                                                <li class="d-flex mb-2">
                                                                    <h6 class="me-2" style="font-size: 16px;">Giá:
                                                                    </h6>
                                                                    <span style="color: red; font-size: 15px;">
                                                                        {{ number_format($item->price, 0, ',', '.') }}
                                                                        VND
                                                                    </span>
                                                                </li>
                                                                <li class="d-flex mb-2">
                                                                    <h6 class="me-2" style="font-size: 16px;">Phiên
                                                                        bản:</h6>
                                                                    <span
                                                                        style="font-size: 15px;">{{ $item->variant_name }}</span>
                                                                </li>
                                                                <li class="d-flex">
                                                                    <h6 class="me-2" style="font-size: 16px;">Số
                                                                        lượng:</h6>
                                                                    <span
                                                                        style="font-size: 15px;">{{ $item->quantity }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-center text-muted" style="font-size: 16px;">Không có sản phẩm
                                                trong đơn hàng này.</p>
                                        @endif
                                    </div>

                                    @if ($order->status == 'completed')
                                        @php
                                            $allRated = true;
                                        @endphp

                                        <h3 class="fw-bold mt-4"
                                            style="font-size: 24px; text-transform: uppercase; color: #333;">Đánh giá</h3>

                                        @foreach ($groupedItems as $productId => $items)
                                            @php
                                                $productItem = $items->first();
                                                $isRated = $productItem
                                                    ->rating()
                                                    ->where('user_id', auth()->id())
                                                    ->exists();
                                            @endphp

                                            @if (!$isRated)
                                                @php
                                                    $allRated = false;
                                                @endphp

                                                <div class="row mb-4 pb-3 border-bottom align-items-center mt-5">
                                                    <div class="col-md-3">
                                                        <img src="{{ $productItem->image }}" class="img-fluid rounded"
                                                            alt="" style="max-width: 50%;">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h4 class="fw-bold">{{ $productItem->product_name }}</h4>

                                                        <div class="mb-3">
                                                            <p><strong>Biến thể:</strong>
                                                                {{ $items->pluck('variant_name')->join(', ') }}</p>
                                                        </div>

                                                        <form
                                                            action="{{ route('orders.rate', $productItem->product_id) }}"
                                                            method="POST"
                                                            onsubmit="return validateRating({{ $productItem->product_id }});">
                                                            @csrf
                                                            <input type="hidden" name="order_id"
                                                                value="{{ $order->id }}">
                                                            <div class="d-flex align-items-center">
                                                                <div class="rating"
                                                                    id="rating-{{ $productItem->product_id }}"
                                                                    style="font-size: 24px; cursor: pointer;">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <span class="star"
                                                                            data-value="{{ $i }}"
                                                                            data-product-id="{{ $productItem->product_id }}">&starf;</span>
                                                                    @endfor
                                                                </div>
                                                                <input type="hidden" name="rating"
                                                                    id="input-rating-{{ $productItem->product_id }}"
                                                                    value="" required>
                                                                <textarea name="review" class="form-control ms-2" placeholder="Nhận xét (tùy chọn)" rows="2"></textarea>
                                                                <button type="submit" class="btn btn-primary ms-2">Gửi
                                                                    đánh giá</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        @if ($allRated)
                                            <div class="alert alert-success mt-4">
                                                <h4 class="fw-bold">Cảm ơn bạn đã đánh giá tất cả các sản phẩm!</h4>
                                            </div>
                                        @endif
                                    @endif


                                    <div class="d-flex justify-content-center align-items-center mt-4">
                                        @if ($order->status === 'pending')
                                            <a href="{{ route('orders.cancel.form', $order->id) }}"
                                                class="btn btn-danger me-3 btn-cancel-order"
                                                data-payment-method="{{ $order->payment_method }}"
                                                data-payment-status="{{ $order->payment_status }}"
                                                style="font-size: 14px; padding: 8px 16px; border-radius: 8px;">
                                                Hủy Đơn Hàng
                                            </a>
                                        @endif


                                        @if (in_array($order->payment_method, ['online']) && $order->payment_status == 'pending' && $order->status != 'canceled')
                                            <a href="{{ route('clients.retryPayment', $order->id) }}"
                                                class="btn btn-warning me-3"
                                                style="font-size: 14px; padding: 8px 16px; border-radius: 8px;">
                                                Thanh Toán Lại
                                            </a>
                                        @endif

                                        @if ($order->status == 'canceled')
                                            <form action="{{ route('orders.reorder', $order->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                            </form>
                                        @endif
                                        <a href="{{ url('/') }}" class="btn btn-secondary"
                                            style="font-size: 14px; padding: 8px 16px; border-radius: 8px; text-decoration: none;">
                                            Quay lại Trang Chủ
                                        </a>
                                    </div>
                                    @if ($order->status == \App\Models\Order::STATUS_DELIVERED)
                                        <form action="{{ route('orders.confirm-receipt', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Đã Nhận Hàng</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.rating').forEach(rating => {
                const productId = rating.getAttribute('id').split('-')[1];
                const inputRating = document.getElementById(`input-rating-${productId}`);

                document.querySelectorAll('.star').forEach(function(star) {
                    star.addEventListener('click', function() {
                        var ratingValue = this.getAttribute('data-value');
                        var productId = this.getAttribute('data-product-id');

                        document.getElementById('input-rating-' + productId).value =
                            ratingValue;

                        document.querySelectorAll('#rating-' + productId + ' .star')
                            .forEach(function(star) {
                                star.style.color = star.getAttribute('data-value') <=
                                    ratingValue ? 'gold' : 'gray';
                            });
                    });
                });
            });
        });

        function validateRating(productId) {
            const ratingInput = document.getElementById(`input-rating-${productId}`);
            if (!ratingInput.value) {
                alert("Vui lòng chọn số sao để đánh giá!");
                return false;
            }
            return true;
        }

        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const ratingValue = this.dataset.value;

                document.getElementById(`input-rating-${productId}`).value = ratingValue;

                const stars = document.querySelectorAll(`#rating-${productId} .star`);
                stars.forEach(star => {
                    if (star.dataset.value <= ratingValue) {
                        star.style.color = "gold";
                    } else {
                        star.style.color = "gray";
                    }
                });
            });
        });
        document.querySelectorAll('.btn-cancel-order').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const url = this.href;
                const isOnlinePaid = this.dataset.paymentMethod === 'online' && this.dataset
                    .paymentStatus === 'paid';

                let message = 'Bạn có chắc chắn muốn hủy đơn hàng này không?';
                if (isOnlinePaid) {
                    message =
                        'Đơn hàng đã thanh toán online. Cửa hàng sẽ không hoàn tiền nếu bạn hủy. Bạn có chắc chắn muốn tiếp tục không?';
                }

                Swal.fire({
                    title: 'Xác nhận hủy đơn hàng',
                    text: message,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .star {
            color: #d3d3d3;
            transition: color 0.3s;
        }

        .star:hover,
        .star.selected {
            color: #ffcc00;
        }

        .order-summary-table td,
        .order-summary-table th {
            padding: 12px;
            font-size: 16px;
        }

        .order-summary-table {
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .dashboard-right-sidebar {
            padding: 20px;
        }

        .rating {
            font-size: 20px;
            cursor: pointer;
        }

        .rating .star:hover,
        .rating .star.active {
            color: #ffaa00;
        }

        textarea {
            resize: none;
            font-size: 14px;
        }

        .btn {
            padding: 6px 12px;
            font-size: 14px;
        }

        img.img-fluid.rounded {
            max-width: 80%;
            height: auto;
            border-radius: 10px;
        }

        .form-control {
            max-width: 80%;
        }
    </style>

@endsection
