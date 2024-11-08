@extends('admins.layouts.admin')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    <div class="row">
        <h2>Tạo Voucher</h2>
        <form action="{{ route('admins.vouchers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Mã Voucher:</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                    value="{{ old('code') }}" id="voucher-code">
                @error('code')
                    <span class="text-danger" id="code-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Bắt Đầu:</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                    value="{{ old('start_date') }}" id="start-date">
                @error('start_date')
                    <span class="text-danger" id="start-date-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Kết Thúc:</label>
                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                    value="{{ old('end_date') }}" id="end-date">
                @error('end_date')
                    <span class="text-danger" id="end-date-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Loại Giảm Giá:</label>
                <select name="type" class="form-control" id="discount-type" value="{{ old('type') }}">
                    <option value="amount" {{ old('type') == 'amount' ? 'selected' : '' }}>Mệnh giá</option>
                    <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Phần trăm</option>
                </select>
                @error('type')
                    <span class="text-danger" id="type-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="discount-amount-group" style="{{ old('type') == 'amount' ? 'display:block;' : 'display:none;' }}">
                <label>Mệnh Giá Giảm Giá:</label>
                <input type="number" name="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" value="{{ old('discount_amount') }}" id="discount-amount">
                @error('discount_amount')
                    <span class="text-danger" id="discount-amount-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="discount-percentage-group" style="{{ old('type') == 'percentage' ? 'display:block;' : 'display:none;' }}">
                <label>Phần Trăm Giảm Giá:</label>
                <input type="number" name="discount_percentage"
                    class="form-control @error('discount_percentage') is-invalid @enderror" value="{{ old('discount_percentage') }}" min="1" max="100" id="discount-percentage">
                @error('discount_percentage')
                    <span class="text-danger" id="discount-percentage-error">{{ $message }}</span>
                @enderror

                <br>
                <label>Tối Đa Giảm Giá:</label>
                <input type="number" name="max_discount"
                    class="form-control @error('max_discount') is-invalid @enderror" value="{{ old('max_discount') }}" id="max-discount">
                @error('max_discount')
                    <span class="text-danger" id="max-discount-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Số Lượng Voucher:</label>
                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" min="1" id="quantity">
                @error('quantity')
                    <span class="text-danger" id="quantity-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Trạng Thái:</label>
                <select name="status" class="form-control" id="status">
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Kích hoạt</option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
                </select>
                @error('status')
                    <span class="text-danger" id="status-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Phạm Vi Sử Dụng:</label>
                <select name="usage_type" class="form-control" id="usage-type">
                    <option value="all" {{ old('usage_type') == 'all' ? 'selected' : '' }}>Mọi người</option>
                    <option value="restricted" {{ old('usage_type') == 'restricted' ? 'selected' : '' }}>Giới hạn</option>
                </select>
                @error('usage_type')
                    <span class="text-danger" id="usage-type-error">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success">Tạo Voucher</button>
            <a href="{{ route('admins.vouchers.index') }}" class="btn btn-secondary">Hủy</a>

        </form>

        <script>
            // Ẩn thông báo lỗi và lớp 'is-invalid' khi người dùng nhập vào bất kỳ trường nào
            function hideErrorMessage(inputId, errorMessageId) {
                document.getElementById(inputId).addEventListener('input', function() {
                    const errorMessage = document.getElementById(errorMessageId);
                    const inputField = document.getElementById(inputId);

                    if (errorMessage) {
                        errorMessage.style.display = 'none'; // Ẩn thông báo lỗi khi người dùng nhập
                    }

                    // Loại bỏ lớp 'is-invalid' khi người dùng nhập dữ liệu
                    inputField.classList.remove('is-invalid');
                });
            }

            // Áp dụng cho tất cả các trường
            hideErrorMessage('voucher-code', 'code-error');
            hideErrorMessage('start-date', 'start-date-error');
            hideErrorMessage('end-date', 'end-date-error');
            hideErrorMessage('discount-amount', 'discount-amount-error');
            hideErrorMessage('discount-percentage', 'discount-percentage-error');
            hideErrorMessage('max-discount', 'max-discount-error');
            hideErrorMessage('quantity', 'quantity-error');
            hideErrorMessage('status', 'status-error');
            hideErrorMessage('usage-type', 'usage-type-error');

            // Hiển thị hoặc ẩn các nhóm giảm giá dựa trên loại giảm giá
            document.getElementById('discount-type').addEventListener('change', function() {
                const type = this.value;
                document.getElementById('discount-amount-group').style.display = type === 'amount' ? 'block' : 'none';
                document.getElementById('discount-percentage-group').style.display = type === 'percentage' ? 'block' : 'none';
            });
        </script>
    </div>
@endsection
