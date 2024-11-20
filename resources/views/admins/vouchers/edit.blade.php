@extends('admins.layouts.admin')



@section('content')
    <div class="row">
        <h2>Cập nhật Voucher</h2>
        <form action="{{ route('admins.vouchers.update', $voucher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Mã Voucher:</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                    value="{{ old('code', $voucher->code) }}" id="voucher-code">
                @error('code')
                    <span class="text-danger" id="code-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Bắt Đầu:</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                    value="{{ old('start_date',  \Carbon\Carbon::parse($voucher->start_date)->format('Y-m-d')) }}" id="start-date">
                @error('start_date')
                    <span class="text-danger" id="start-date-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Kết Thúc:</label>
                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                value="{{ old('end_date', \Carbon\Carbon::parse($voucher->end_date)->format('Y-m-d')) }}" id="end-date">            
                @error('end_date')
                    <span class="text-danger" id="end-date-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Loại Giảm Giá:</label>
                <select name="discount_type" class="form-control" id="discount-type" value="{{ old('discount_type') }}">
                    <option value="fixed" {{ old('discount_type', $voucher->discount_type) == 'fixed' ? 'selected' : '' }}>Mệnh giá</option>
                    <option value="percent" {{ old('discount_type', $voucher->discount_type) == 'percent' ? 'selected' : '' }}>Phần trăm</option>
                </select>
                @error('discount_type')
                    <span class="text-danger" id="discount-type-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="discount-value-div">
                <label for="discount-value">Mệnh Giá Giảm Giá:</label>
                <input type="text" name="discount_value"
                    class="form-control @error('discount_value') is-invalid @enderror" value="{{ old('discount_value', $voucher->discount_value) }}"
                    id="discount-value">
                @error('discount_value')
                    <span class="text-danger" id="discount-value-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="discount-percent-div" style="display: none;">
                <label>Phần Trăm Giảm Giá (%):</label>
                <input type="number" name="discount_percent"
                    class="form-control @error('discount_percent') is-invalid @enderror"
                    value="{{ old('discount_percent', $voucher->discount_percent) }}" min="1" max="100" id="discount-percent">
                @error('discount_percent')
                    <span class="text-danger" id="discount-percent-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="max-discount-amount-div" style="display: none;">
                <label for="max_discount_amount">Tối Đa Giảm Giá:</label>
                <input type="text" name="max_discount_amount"
                    class="form-control @error('max_discount_amount') is-invalid @enderror"
                    value="{{ old('max_discount_amount', $voucher->max_discount_amount) }}" id="max-discount-amount">
                @error('max_discount_amount')
                    <span class="text-danger" id="max-discount-amount-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="min_order_amount">Giá tối thiểu được giảm: </label>
                <input type="text" name="min_order_amount"
                    class="form-control @error('min_order_amount') is-invalid @enderror"
                    value="{{ old('min_order_amount', $voucher->min_order_amount) }}" id="min_order_amount">

                @error('min_order_amount')
                    <span class="text-danger" id="min_order_amount-error">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label>Số Lượng Voucher:</label>
                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                    value="{{ old('quantity', $voucher->quantity) }}" min="1" id="quantity">
                @error('quantity')
                    <span class="text-danger" id="quantity-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_public">Trạng Thái Công Khai:</label>
                <select name="is_public" id="is_public" class="form-control">
                    <option value="1" {{ old('is_public', $voucher->is_public) == 1 ? 'selected' : '' }}>Công khai</option>
                    <option value="0" {{ old('is_public', $voucher->is_public) == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
                @error('visibility')
                    <span class="text-danger" id="visibility-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_active">Trạng Thái Hoạt Động:</label>
                <select name="is_active" id="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $voucher->is_active) == 1 ? 'selected' : '' }}>Kích hoạt</option>
                    <option value="0" {{ old('is_active', $voucher->is_active) == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
                </select>
                @error('status')
                    <span class="text-danger" id="status-error">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label>Phạm Vi Sử Dụng:</label>
                <select name="usage_type" class="form-control" id="usage-type">
                    <option value="all" {{ old('usage_type', $voucher->usage_type) == 'all' ? 'selected' : '' }}>Mọi người</option>
                    <option value="restricted" {{ old('usage_type', $voucher->usage_type) == 'restricted' ? 'selected' : '' }}>Giới hạn</option>
                </select>
                @error('usage_type')
                    <span class="text-danger" id="usage-type-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" id="user-list-group"
                style="{{ old('usage_type', $voucher->usage_type) == 'restricted' ? 'display:block;' : 'display:none;' }}">
                <label>Chọn Người Dùng:</label>

                <div class="d-flex align-items-center mb-2">
                    <input type="text" id="user-search" class="form-control me-2" style="width:200px"
                        placeholder="Tìm kiếm người dùng..." onkeyup="filterUsers()">
                    <button type="button" id="select-all" class="btn btn-primary btn-sm"
                        onclick="toggleSelectAll()">Chọn tất cả</button>
                </div>

                <div class="checkbox-group mt-2" id="user-checkboxes">
                    @foreach ($users as $user)
                        <label class="user-checkbox">
                            <input type="checkbox" name="users[]" value="{{ $user->user_id }}" 
                                {{ in_array($user->user_id, old('users', $selectedUsers) ?? []) ? 'checked' : '' }}>
                            {{ $user->user_name }}
                        </label><br>
                    @endforeach
                </div>
                @error('users')
                    <span class="text-danger" id="users-error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success mt-4">Cập nhật</button>
            <a href="{{ route('admins.vouchers.index') }}" class="btn btn-secondary  mt-4">Hủy</a>
        </form>
    </div>

    <script>
        function filterUsers() {
            const searchTerm = document.getElementById("user-search").value.toLowerCase();
            const checkboxes = document.querySelectorAll(".user-checkbox");
            checkboxes.forEach(function(checkbox) {
                const userName = checkbox.textContent.toLowerCase();
                if (userName.includes(searchTerm)) {
                    checkbox.style.display = "block";
                } else {
                    checkbox.style.display = "none";
                }
            });
        }

        function toggleSelectAll() {
            const checkboxes = document.querySelectorAll("#user-checkboxes input[type='checkbox']");
            const selectAllButton = document.getElementById("select-all");
            let allChecked = true;


            checkboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });

            checkboxes.forEach(function(checkbox) {
                checkbox.checked = !allChecked;
            });

            selectAllButton.textContent = allChecked ? "Chọn tất cả" : "Bỏ chọn tất cả";
        }

        document.getElementById("usage-type").addEventListener("change", function() {
            const usageType = this.value;

            if (usageType === 'restricted') {
                document.getElementById('user-list-group').style.display = 'block';
            } else {
                document.getElementById('user-list-group').style.display = 'none';
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            const discountTypeSelect = document.getElementById('discount-type');
            const discountValueDiv = document.getElementById('discount-value-div');
            const discountPercentDiv = document.getElementById('discount-percent-div');
            const maxDiscountAmountDiv = document.getElementById('max-discount-amount-div');

            function toggleDiscountFields() {
                const discountType = discountTypeSelect.value;

                if (discountType === 'fixed') {
                    discountValueDiv.style.display = 'block';
                    discountPercentDiv.style.display = 'none';
                    maxDiscountAmountDiv.style.display = 'none';
                } else if (discountType === 'percent') {
                    discountValueDiv.style.display = 'none';
                    discountPercentDiv.style.display = 'block';
                    maxDiscountAmountDiv.style.display = 'block';
                }
            }

            toggleDiscountFields();
            discountTypeSelect.addEventListener('change', toggleDiscountFields);
        });
    </script>
@endsection
