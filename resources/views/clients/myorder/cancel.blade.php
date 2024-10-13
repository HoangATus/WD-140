@extends('clients.layouts.client')

@section('content')
<div class="container">
    <h1>Hủy Đơn Hàng: {{ $order->order_code }}</h1>

    <div class="card">
        <div class="card-header">
            Xác nhận hủy đơn hàng
        </div>
        <div class="card-body">
            <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="cancellation_reason">Lý do hủy đơn hàng:</label>
                    <textarea name="cancellation_reason" id="cancellation_reason" class="form-control @error('cancellation_reason') is-invalid @enderror" rows="4" required>{{ old('cancellation_reason') }}</textarea>
                    @error('cancellation_reason')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-danger">Hủy Đơn Hàng</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
