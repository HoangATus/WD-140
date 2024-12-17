@extends('admins.layouts.admin')

@section('title')
    Chi tiết đánh giá
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h1 class="my-4">Chi tiết đánh giá</h1>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Sản phẩm: {{ $rating->product->product_name }}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-3 text-muted">Người dùng: {{ $rating->user->user_name }}</h6>
                <p class="card-text"><strong>Hình ảnh: </strong>
                    @if ($rating->orderItem && $rating->orderItem->image)
                        <div class="mb-3">
                            <img src="{{ $rating->orderItem->image }}" alt="Ảnh sản phẩm"
                                style="width: 70px; height: auto;">
                        </div>
                    @else
                        <p>Không có hình ảnh sản phẩm</p>
                    @endif
                </p>
                <p class="card-text"><strong>Đánh giá: </strong>
                    <span class="rating-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $rating->rating)
                                <i class="fas fa-star text-warning"></i>
                            @else
                                <i class="far fa-star text-warning"></i>
                            @endif
                        @endfor
                    </span>
                </p>

                <p class="card-text"><strong>Nhận xét: </strong>{{ $rating->review }}</p>
                <p class="card-text"><strong>Thời gian: </strong>{{ $rating->created_at->format('d/m/Y H:i') }}</p>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('admins.ratings.index') }}" class="btn btn-secondary">Quay lại</a>

                    <td>
                        @if (!$rating->hidden)
                            <form action="{{ route('admins.ratings.hide', $rating->id) }}" method="POST"
                                class="d-inline-block" id="hide-rating-{{ $rating->id }}">
                                @csrf
                                @method('PATCH')
                                <button type="button" class="btn btn-warning"
                                    onclick="confirmHideRating({{ $rating->id }})">Ẩn đánh giá</button>
                            </form>
                        @else
                            <form action="{{ route('admins.ratings.unhide', $rating->id) }}" method="POST"
                                class="d-inline-block" id="unhide-rating-{{ $rating->id }}">
                                @csrf
                                @method('PATCH')
                                <button type="button" class="btn btn-success"
                                    onclick="confirmUnhideRating({{ $rating->id }})">Hiện đánh giá</button>
                            </form>
                        @endif
                    </td>
                </div>


            </div>
        </div>
    </div>
@endsection
<script>
    function confirmHideRating(id) {
        if (confirm('Bạn có chắc chắn muốn ẩn đánh giá?')) {
            document.getElementById('hide-rating-' + id).submit();
        }
    }

    function confirmUnhideRating(id) {
        if (confirm('Bạn có chắc chắn muốn hiện lại đánh giá?')) {
            document.getElementById('unhide-rating-' + id).submit();
        }
    }
</script>

@section('style-libs')
    <style>
        .card {
            border-radius: 10px;
        }

        .card-header {
            font-size: 1.25rem;
        }

        .badge {
            font-size: 1rem;
        }

        .btn {
            border-radius: 5px;
        }
    </style>
@endsection
