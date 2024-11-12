@extends('admins.layouts.admin')

@section('title')
    Quản lý Voucher
@endsection

@section('content')
    <div class="row">
        <h2>{{ isset($voucher) ? 'Cập Nhật Voucher' : 'Tạo Voucher' }}</h2>
        <form action="{{ route('admins.vouchers.update', $voucher->id) }}" method="POST" id="voucher-form">
            @csrf
            @method('PUT')
    
            <div class="form-group">
                <label for="code">Mã Voucher:</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $voucher->code) }}" >
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="start_date">Ngày Bắt Đầu:</label>
                <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $voucher->start_date) }}" >
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="end_date">Ngày Kết Thúc:</label>
                <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $voucher->end_date) }}" >
                @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="type">Loại Giảm Giá:</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" >
                    <option value="amount" {{ old('type', $voucher->type) == 'amount' ? 'selected' : '' }}>Mệnh giá</option>
                    <option value="percentage" {{ old('type', $voucher->type) == 'percentage' ? 'selected' : '' }}>Phần trăm</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group" id="discount-amount-group" style="{{ old('type', $voucher->type) == 'amount' ? '' : 'display: none;' }}">
                <label for="discount_amount">Mệnh Giá Giảm Giá:</label>
                <input type="number" name="discount_amount" id="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" value="{{ old('discount_amount', $voucher->discount_amount) }}">
                @error('discount_amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group" id="discount-percentage-group" style="{{ old('type', $voucher->type) == 'percentage' ? '' : 'display: none;' }}">
                <label for="discount_percentage">Phần Trăm Giảm Giá:</label>
                <input type="number" name="discount_percentage" id="discount_percentage" class="form-control @error('discount_percentage') is-invalid @enderror" min="1" max="100" value="{{ old('discount_percentage', $voucher->discount_percentage) }}">
                @error('discount_percentage')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="max_discount">Tối Đa Giảm Giá:</label>
                <input type="number" name="max_discount" id="max_discount" class="form-control @error('max_discount') is-invalid @enderror" value="{{ old('max_discount', $voucher->max_discount) }}">
                @error('max_discount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="quantity">Số Lượng Voucher:</label>
                <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" min="1" value="{{ old('quantity', $voucher->quantity) }}" >
                @error('quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="status">Trạng Thái:</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" >
                    <option value="1" {{ old('status', $voucher->status) == 1 ? 'selected' : '' }}>Kích hoạt</option>
                    <option value="0" {{ old('status', $voucher->status) == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="usage_type">Phạm Vi Sử Dụng:</label>
                <select name="usage_type" id="usage_type" class="form-control @error('usage_type') is-invalid @enderror" >
                    <option value="all" {{ old('usage_type', $voucher->usage_type) == 'all' ? 'selected' : '' }}>Mọi người</option>
                    <option value="restricted" {{ old('usage_type', $voucher->usage_type) == 'restricted' ? 'selected' : '' }}>Giới hạn</option>
                </select>
                @error('usage_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success">Cập Nhật Voucher</button>
            <a href="{{ route('admins.vouchers.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    
        <script>
            document.getElementById('type').addEventListener('change', function () {
                const type = this.value;
                document.getElementById('discount-amount-group').style.display = type === 'amount' ? 'block' : 'none';
                document.getElementById('discount-percentage-group').style.display = type === 'percentage' ? 'block' : 'none';
            });

            // Ẩn thông báo lỗi khi người dùng nhập vào trường input
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.classList.contains('is-invalid')) {
                        this.classList.remove('is-invalid');
                        let feedback = this.nextElementSibling;
                        if (feedback && feedback.classList.contains('invalid-feedback')) {
                            feedback.style.display = 'none';
                        }
                    }
                });
            });
        </script>
    
@endsection
