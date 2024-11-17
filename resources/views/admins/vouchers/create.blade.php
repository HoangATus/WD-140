@extends('admins.layouts.admin')



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

            <div class="form-group" id="discount-amount-group"
                style="{{ old('type') == 'amount' ? 'display:block;' : 'display:none;' }}">
                <label for="discount-amount">Mệnh Giá Giảm Giá:</label>
                <input type="text" name="discount_amount"
                    class="form-control @error('discount_amount') is-invalid @enderror"
                    value="{{ old('discount_amount') }}" id="discount-amount" oninput="formatCurrency(this)"
                    onblur="formatCurrency(this)">

                @error('discount_amount')
                    <span class="text-danger" id="discount-amount-error">{{ $message }}</span>
                @enderror
            </div>

            <script>
                // Hàm định dạng giá trị theo tiền tệ Việt Nam (VND)
                function formatCurrency(input) {
                    let value = input.value.replace(/\D/g, ''); // Loại bỏ ký tự không phải là số
                    if (value) {
                        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Thêm dấu phẩy cho hàng nghìn
                        input.value = value; // Thêm ký hiệu ₫ vào cuối
                    } else {
                        input.value = ""; // Nếu không có giá trị thì để trống
                    }
                }

                // Hàm làm sạch giá trị trước khi gửi form
                document.querySelector("form").addEventListener("submit", function() {
                    let discountInput = document.getElementById("discount-amount");
                    let rawValue = discountInput.value.replace(/\D/g, ''); // Loại bỏ ký tự không phải là số
                    discountInput.value = rawValue; // Cập nhật giá trị input với giá trị số
                });
            </script>

            <div class="form-group" id="discount-percentage-group"
                style="{{ old('type') == 'percentage' ? 'display:block;' : 'display:none;' }}">
                <label>Phần Trăm Giảm Giá:</label>
                <input type="number" name="discount_percentage"
                    class="form-control @error('discount_percentage') is-invalid @enderror"
                    value="{{ old('discount_percentage') }}" min="1" max="100" id="discount-percentage">
                @error('discount_percentage')
                    <span class="text-danger" id="discount-percentage-error">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="max-discount">Tối Đa Giảm Giá:</label>
                    <input type="text" name="max_discount"
                        class="form-control @error('max_discount') is-invalid @enderror" value="{{ old('max_discount') }}"
                        id="max-discount" oninput="formatCurrency(this)" onblur="formatCurrency(this)">

                    @error('max_discount')
                        <span class="text-danger" id="max-discount-error">{{ $message }}</span>
                    @enderror
                </div>

                <script>
                    // Hàm định dạng giá trị theo tiền tệ Việt Nam (VND)
                    function formatCurrency(input) {
                        let value = input.value.replace(/\D/g, ''); // Loại bỏ các ký tự không phải là số
                        if (value) {
                            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Thêm dấu phẩy phân cách hàng nghìn
                            input.value = value; // Thêm ký hiệu ₫ vào cuối
                        } else {
                            input.value = ""; // Nếu không có giá trị thì để trống
                        }
                    }

                    // Làm sạch giá trị trước khi gửi form
                    document.querySelector("form").addEventListener("submit", function() {
                        let maxDiscountInput = document.getElementById("max-discount");
                        let rawValue = maxDiscountInput.value.replace(/\D/g, ''); // Loại bỏ dấu phẩy và ký tự không phải số
                        maxDiscountInput.value = rawValue; // Cập nhật giá trị của input với giá trị số thuần túy
                    });
                </script>

            </div>

            <div class="form-group">
                <label for="min_discount">Giá tối thiểu được giảm: </label>
                <input type="text" name="min_discount" class="form-control @error('min_discount') is-invalid @enderror"
                    value="{{ old('min_discount') }}" id="min_discount" oninput="formatCurrency(this)"
                    onblur="formatCurrency(this)">

                @error('min_discount')
                    <span class="text-danger" id="min_discount-error">{{ $message }}</span>
                @enderror
            </div>

            <script>
                // Hàm định dạng giá trị theo tiền tệ Việt Nam (VND)
                function formatCurrency(input) {
                    let value = input.value.replace(/\D/g, ''); // Loại bỏ các ký tự không phải là số
                    if (value) {
                        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Thêm dấu phẩy phân cách hàng nghìn
                        input.value = value; // Thêm ký hiệu ₫ vào cuối
                    } else {
                        input.value = ""; // Nếu không có giá trị thì để trống
                    }
                }

                // Làm sạch giá trị trước khi gửi form
                document.querySelector("form").addEventListener("submit", function() {
                    let maxDiscountInput = document.getElementById("min_discount");
                    let rawValue = maxDiscountInput.value.replace(/\D/g, ''); // Loại bỏ dấu phẩy và ký tự không phải số
                    maxDiscountInput.value = rawValue; // Cập nhật giá trị của input với giá trị số thuần túy
                });
            </script>


            <div class="form-group">
                <label>Số Lượng Voucher:</label>
                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                    value="{{ old('quantity') }}" min="1" id="quantity">
                @error('quantity')
                    <span class="text-danger" id="quantity-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Trạng Thái Hiển Thị:</label>
                <select name="visibility" class="form-control" id="visibility">
                    <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Công khai</option>
                    <option value="hidden" {{ old('visibility') == 'hidden' ? 'selected' : '' }}>Ẩn</option>
                </select>
                @error('visibility')
                    <span class="text-danger" id="visibility-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Trạng Thái:</label>
                <select name="status" class="form-control" id="status">
                    <option value="0" {{ old('status', 1) == 1 ? 'selected' : '' }}>Kích hoạt</option>
                    <option value="1" {{ old('status') == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
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

            <!-- Div chứa danh sách người dùng với tìm kiếm và chọn tất cả -->
            <div class="form-group" id="user-list-group"
                style="{{ old('usage_type') == 'restricted' ? 'display:block;' : 'display:none;' }}">
                <label>Chọn Người Dùng:</label>

                <div class="d-flex align-items-center mb-2">
                    <!-- Ô tìm kiếm -->
                    <input type="text" id="user-search" class="form-control me-2" style="width:200px"
                        placeholder="Tìm kiếm người dùng..." onkeyup="filterUsers()">

                    <!-- Nút chọn tất cả -->
                    <button type="button" id="select-all" class="btn btn-primary btn-sm"
                        onclick="toggleSelectAll()">Chọn tất cả</button>
                </div>

                <div class="checkbox-group mt-2" id="user-checkboxes">
                    @foreach ($users as $user)
                        <label class="user-checkbox">
                            <input type="checkbox" name="users[]" value="{{ $user->user_id }}"
                                {{ is_array(old('users')) && in_array($user->user_id, old('users')) ? 'checked' : '' }}>
                            {{ $user->user_name }}
                        </label><br>
                    @endforeach
                </div>
                @error('users')
                    <span class="text-danger" id="users-error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success mt-4">Tạo Voucher</button>
            <a href="{{ route('admins.vouchers.index') }}" class="btn btn-secondary  mt-4">Hủy</a>
        </form>

        <script>
            // Hàm định dạng giá trị theo tiền tệ Việt Nam (VND)
            function formatCurrency(input) {
                let value = input.value.replace(/\D/g, ''); // Loại bỏ các ký tự không phải là số
                if (value) {
                    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Thêm dấu phẩy phân cách hàng nghìn
                    input.value = value; // Thêm ký hiệu ₫ vào cuối
                } else {
                    input.value = ""; // Nếu không có giá trị thì để trống
                }
            }

            // Làm sạch giá trị trước khi gửi form
            document.querySelector("form").addEventListener("submit", function() {
                let maxDiscountInput = document.getElementById("min_discount");
                let rawValue = maxDiscountInput.value.replace(/\D/g, ''); // Loại bỏ dấu phẩy và ký tự không phải số
                maxDiscountInput.value = rawValue; // Cập nhật giá trị của input với giá trị số thuần túy
            });

            // Hàm ẩn thông báo lỗi và lớp 'is-invalid' khi người dùng nhập vào bất kỳ trường nào
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
            const checkboxes = document.querySelectorAll('#user-checkboxes input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const feedback = document.getElementById('users-error');
                    if (feedback) {
                        feedback.style.display = 'none'; // Ẩn thông báo lỗi khi checkbox thay đổi
                    }
                });
            });
            // Áp dụng cho tất cả các trường
            hideErrorMessage('max_discount', 'max_discount-error');
            hideErrorMessage('min_discount', 'min_discount-error');
            hideErrorMessage('voucher-code', 'code-error');
            hideErrorMessage('start-date', 'start-date-error');
            hideErrorMessage('end-date', 'end-date-error');
            hideErrorMessage('discount-amount', 'discount-amount-error');
            hideErrorMessage('discount-percentage', 'discount-percentage-error');
            hideErrorMessage('quantity', 'quantity-error');
            hideErrorMessage('status', 'status-error');
            hideErrorMessage('usage-type', 'usage-type-error');

            // Hiển thị hoặc ẩn các nhóm giảm giá dựa trên loại giảm giá
            document.getElementById('discount-type').addEventListener('change', function() {
                const type = this.value;
                document.getElementById('discount-amount-group').style.display = type === 'amount' ? 'block' : 'none';
                document.getElementById('discount-percentage-group').style.display = type === 'percentage' ? 'block' :
                    'none';
            });

            // Hiển thị hoặc ẩn nhóm người dùng dựa trên phạm vi sử dụng
            document.getElementById('usage-type').addEventListener('change', function() {
                const usageType = this.value;
                document.getElementById('user-list-group').style.display = usageType === 'restricted' ? 'block' :
                'none';
            });

            // Chức năng tìm kiếm người dùng
            function filterUsers() {
                const searchQuery = document.getElementById('user-search').value.toLowerCase();
                const checkboxes = document.getElementsByClassName('user-checkbox');

                for (let i = 0; i < checkboxes.length; i++) {
                    const label = checkboxes[i].textContent.toLowerCase();
                    checkboxes[i].style.display = label.includes(searchQuery) ? 'block' : 'none';
                }
            }

            // Chức năng chọn tất cả / bỏ chọn tất cả
            let selectAll = false;

            function toggleSelectAll() {
                const checkboxes = document.querySelectorAll('#user-checkboxes input[type="checkbox"]');
                selectAll = !selectAll;

                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll;
                });

                // Thay đổi text của nút dựa trên trạng thái chọn
                document.getElementById('select-all').textContent = selectAll ? 'Bỏ chọn tất cả' : 'Chọn tất cả';
            }
        </script>

    </div>
@endsection
