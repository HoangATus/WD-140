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
                <label>Mã Voucher</label>
                <input type="text" name="code" class="form-control" value="{{ old('code') }}" >
                @error('code')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Số lượng Voucher</label>
                <input type="number" name="quantity" class="form-control"  min="1" value="{{ old('quantity') }}">
                @error('quantity')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Loại Giảm Giá</label>
                <select name="discount_type" id="discount_type" class="form-control" onchange="toggleDiscountInputs(this.value)">
                    <option value="fixed">Giảm Giá Theo Mệnh Giá</option>
                    <option value="percent">Giảm Giá Theo %</option>
                </select>
                @error('discount_type')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group" id="fixed_discount_container">
                <label>Giảm tối đa</label>
                <input type="number" name="discount_value" class="form-control" min="0" step="1000" value="0" required>
            </div>
            
            <div class="form-group" id="percent_discount_container" style="display: none;">
                <label>% Giảm Giá</label>
                <input type="number" name="discount_percent" class="form-control" min="0" max="100" required>
            </div>            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
            <div class="form-group" id="max_discount_container" style="display: none;">
                <label>Số Tiền Giảm Tối Đa</label>
                <input type="number" name="max_discount_amount" class="form-control" placeholder="Nhập số tiền giảm tối đa">
                @error('max_discount_amount')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Bắt Đầu</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                @error('start_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Kết Thúc</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                @error('end_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Trạng Thái Hoạt Động</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Hoạt Động</option>
                    <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>Không Hoạt Động</option>
                </select>
                @error('is_active')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Công Khai</label>
                <select name="is_public" class="form-control">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                </select>
                @error('is_public')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Khách Hàng Được Sử Dụng (Nếu Không Công Khai)</label>
                <select name="user_ids[]" class="form-control" multiple>
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user->user_name }}</option>
                    @endforeach
                </select>
                @error('user_ids')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('admins.vouchers.index') }}" class="btn btn-secondary">Hủy</a>

        </form>
    </div>

    <script>
        function toggleDiscountInputs(type) {
            const fixedDiscountContainer = document.getElementById('fixed_discount_container');
            const percentDiscountContainer = document.getElementById('percent_discount_container');
            const maxDiscountContainer = document.getElementById('max_discount_container');
    
            if (type === 'fixed') {
                fixedDiscountContainer.style.display = 'block';
                percentDiscountContainer.style.display = 'none';
                maxDiscountContainer.style.display = 'none'; // Ẩn trường tiền giảm tối đa
                document.querySelector('input[name="discount_value"]').required = true;
                document.querySelector('input[name="discount_percent"]').required = false;
                document.querySelector('input[name="max_discount_amount"]').required = false; // Không yêu cầu
            } else {
                fixedDiscountContainer.style.display = 'none';
                percentDiscountContainer.style.display = 'block';
                maxDiscountContainer.style.display = 'block'; // Hiện trường tiền giảm tối đa
                document.querySelector('input[name="discount_value"]').required = false;
                document.querySelector('input[name="discount_percent"]').required = true;
    
                // Tập trung vào trường nhập nếu nó trở thành bắt buộc
                document.querySelector('input[name="discount_percent"]').focus();
            }
        }
    
        function toggleMaxDiscountInput(percent) {
            const maxDiscountContainer = document.getElementById('max_discount_container');
            // Hiển thị ô nhập số tiền giảm tối đa
            maxDiscountContainer.style.display = percent > 0 ? 'block' : 'none';
        }
    
        // Kiểm tra tính hợp lệ trước khi gửi biểu mẫu
        document.querySelector('form').addEventListener('submit', function(event) {
            const discountType = document.getElementById('discount_type').value;
            const discountPercentField = document.querySelector('input[name="discount_percent"]');
            
            // Kiểm tra xem loại giảm giá là 'percent' và nếu trường bị ẩn
            if (discountType === 'percent' && discountPercentField.offsetParent === null) {
                event.preventDefault(); // Ngăn chặn gửi biểu mẫu
                alert('Vui lòng nhập % Giảm Giá.'); // Hiển thị thông báo hoặc xử lý xác thực cần thiết
            }
        });
    </script>
    
@endsection
