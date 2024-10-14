@extends('clients.layouts.client')

@section('content')
    <div class="container my-5">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mb-4">
                    <h2 class="font-weight-bold">Hủy Đơn Hàng</h2>
                    <h5>Mã đơn hàng: <span class="text-danger font-weight-bold mt-4">{{ $order->order_code }}</span></h5>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-info text-warning text-center">
                        Xác nhận hủy đơn hàng
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="cancellation_reason" class="font-weight-bold">Lý do hủy đơn hàng:</label>
                                <textarea name="cancellation_reason" id="cancellation_reason"
                                    class="form-control @error('cancellation_reason') is-invalid @enderror" rows="5" required
                                    placeholder="Nhập lý do bạn muốn hủy đơn hàng">{{ old('cancellation_reason') }}</textarea>

                                @error('cancellation_reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="submit" class="btn btn-danger btn-lg">
                                    <i class="fas fa-times-circle"></i> Hủy Đơn Hàng
                                </button>
                                <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-arrow-left"></i> Quay Lại
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
