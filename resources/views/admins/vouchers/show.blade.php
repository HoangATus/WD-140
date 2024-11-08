@extends('admins.layouts.admin')

@section('title')
    Quản lý Voucher
@endsection

@section('content')
    <div class="row">
        <h2>{{ isset($voucher) ? 'Cập Nhật Voucher' : 'Tạo Voucher' }}</h2>
        <form action="{{ isset($voucher) ? route('admins.vouchers.update', $voucher->id) : route('admins.vouchers.store') }}" method="POST">
            @csrf
            @if(isset($voucher))
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Mã Voucher</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', isset($voucher) ? $voucher->code : '') }}" disabled>
                @error('code')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Số lượng Voucher</label>
                <input type="number" name="quantity" class="form-control" min="1" value="{{ old('quantity', isset($voucher) ? $voucher->quantity : '') }}" disabled>
                @error('quantity')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Loại Giảm Giá</label>
                <select name="discount_type" id="discount_type" class="form-control" onchange="toggleDiscountInputs(this.value)" disabled>
                    <option value="fixed" {{ (old('discount_type', isset($voucher) ? $voucher->discount_type : '') == 'fixed') ? 'selected' : '' }}>Giảm Giá Theo Mệnh Giá</option>
                    <option value="percent" {{ (old('discount_type', isset($voucher) ? $voucher->discount_type : '') == 'percent') ? 'selected' : '' }}>Giảm Giá Theo %</option>
                </select>
                @error('discount_type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group" id="fixed_discount_container" style="{{ (old('discount_type', isset($voucher) ? $voucher->discount_type : '') == 'fixed') ? 'display:block;' : 'display:none;' }}">
                <label>Giảm tối đa</label>
                <input type="number" name="discount_value" class="form-control" value="{{ old('discount_value', isset($voucher) ? $voucher->discount_value : '') }}" disabled>
                @error('discount_value')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group" id="percent_discount_container" style="{{ (old('discount_type', isset($voucher) ? $voucher->discount_type : '') == 'percent') ? 'display:block;' : 'display:none;' }}">
                <label>% Giảm Giá</label>
                <input type="number" name="discount_percent" class="form-control" value="{{ old('discount_percent', isset($voucher) ? $voucher->discount_percent : '') }}" disabled>
                @error('discount_percent')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label>Ngày Bắt Đầu</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', isset($voucher) ? $voucher->start_date : '') }}" disabled>
                @error('start_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Kết Thúc</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', isset($voucher) ? $voucher->end_date : '') }}" disabled>
                @error('end_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Trạng Thái Hoạt Động</label>
                <select name="is_active" class="form-control" disabled>
                    <option value="1" {{ old('is_active', isset($voucher) ? $voucher->is_active : 1) == 1 ? 'selected' : '' }}>Hoạt Động</option>
                    <option value="0" {{ old('is_active', isset($voucher) ? $voucher->is_active : 1) == 0 ? 'selected' : '' }}>Không Hoạt Động</option>
                </select>
                @error('is_active')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Công Khai</label>
                <select name="is_public" class="form-control" disabled>
                    <option value="1" {{ old('is_public', isset($voucher) ? $voucher->is_public : 1) == 1 ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ old('is_public', isset($voucher) ? $voucher->is_public : 1) == 0 ? 'selected' : '' }}>Không</option>
                </select>
                @error('is_public')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Khách Hàng Được Sử Dụng (Nếu Không Công Khai)</label>
                <select name="user_ids[]" class="form-control" multiple disabled>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ isset($voucher) && in_array($user->id, old('user_ids', $voucher->user_ids ?? [])) ? 'selected' : '' }}>{{ $user->user_name }}</option>
                    @endforeach
                </select>
                
                @error('user_ids')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <a href="{{ route('admins.vouchers.index') }}" class="btn btn-secondary">Quay Lại</a>

        </form>
    </div>

    <script>
        function toggleDiscountInputs(type) {
            const fixedDiscountContainer = document.getElementById('fixed_discount_container');
            const percentDiscountContainer = document.getElementById('percent_discount_container');
            
            const discountValueField = document.querySelector('input[name="discount_value"]');
            const discountPercentField = document.querySelector('input[name="discount_percent"]');
    
            if (type === 'fixed') {
                fixedDiscountContainer.style.display = 'block';
                percentDiscountContainer.style.display = 'none';
                discountValueField.required = true;
                discountPercentField.required = false;
            } else if (type === 'percent') {
                fixedDiscountContainer.style.display = 'none';
                percentDiscountContainer.style.display = 'block';
                discountValueField.required = false;
                discountPercentField.required = true;
            }
        }
    
        // Gọi hàm khi trang được tải để đảm bảo trạng thái đúng
        document.addEventListener('DOMContentLoaded', function() {
            toggleDiscountInputs(document.getElementById('discount_type').value);
        });
    </script>
    
@endsection
