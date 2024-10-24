@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        {{-- < class="container-xxl"> --}}

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                </div>
            </div>

            <!-- start row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="row g-3">

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1">Website Traffic</div>
                                    </div>

                                    <div class="d-flex align-items-baseline mb-2">
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">91.6K</div>
                                        <div class="me-auto">
                                            <span class="text-primary d-inline-flex align-items-center">
                                                15%
                                                <i data-feather="trending-up" class="ms-1"
                                                    style="height: 22px; width: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="website-visitors" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1">Conversion rate</div>
                                    </div>

                                    <div class="d-flex align-items-baseline mb-2">
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">15%</div>
                                        <div class="me-auto">
                                            <span class="text-danger d-inline-flex align-items-center">
                                                10%
                                                <i data-feather="trending-down" class="ms-1"
                                                    style="height: 22px; width: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="conversion-visitors" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1">Session duration</div>
                                    </div>

                                    <div class="d-flex align-items-baseline mb-2">
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">90 Sec</div>
                                        <div class="me-auto">
                                            <span class="text-success d-inline-flex align-items-center">
                                                25%
                                                <i data-feather="trending-up" class="ms-1"
                                                    style="height: 22px; width: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="session-visitors" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1">Active Users</div>
                                    </div>

                                    <div class="d-flex align-items-baseline mb-2">
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">2,986</div>
                                        <div class="me-auto">
                                            <span class="text-success d-inline-flex align-items-center">
                                                4%
                                                <i data-feather="trending-up" class="ms-1"
                                                    style="height: 22px; width: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="active-users" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end sales -->
            </div> <!-- end row -->
            <!-- Start Monthly Sales -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div
                                class="border border-dark rounded-2 me-2 p-2 widget-icons-sections d-flex align-items-center justify-content-center">
                                <i data-feather="bar-chart" class="widgets-icons"></i>
                            </div>
                            <h5 class="card-title mb-0">Doanh Thu</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="revenueFilterForm" onsubmit="return validateForm()">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="yearSelect" class="form-label">Chọn Năm</label>
                                    <select id="yearSelect" class="form-control" required>
                                        <option value="">-- Chọn Năm --</option>
                                        <script>
                                            const currentYear = new Date().getFullYear();
                                            for (let year = 2023; year <= currentYear; year++) {
                                                document.write(`<option value="${year}">${year}</option>`);
                                            }
                                        </script>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="monthSelect" class="form-label">Chọn Tháng</label>
                                    <select id="monthSelect" class="form-control" disabled>
                                        <option value="">-- Chọn Tháng --</option>
                                        <option value="1">Tháng 1</option>
                                        <option value="2">Tháng 2</option>
                                        <option value="3">Tháng 3</option>
                                        <option value="4">Tháng 4</option>
                                        <option value="5">Tháng 5</option>
                                        <option value="6">Tháng 6</option>
                                        <option value="7">Tháng 7</option>
                                        <option value="8">Tháng 8</option>
                                        <option value="9">Tháng 9</option>
                                        <option value="10">Tháng 10</option>
                                        <option value="11">Tháng 11</option>
                                        <option value="12">Tháng 12</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="daySelect" class="form-label">Chọn Ngày</label>
                                    <input type="date" id="daySelect" class="form-control" disabled>
                                    <div id="error-message" class="text-danger" style="display: none;"></div>
                                    <!-- Phần tử hiển thị lỗi -->
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">Tìm Kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="monthly-sales" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            {{-- <script>
                // Kích hoạt lựa chọn tháng khi chọn năm
                document.getElementById('yearSelect').addEventListener('change', function() {
                    const monthSelect = document.getElementById('monthSelect');
                    monthSelect.disabled = !this.value; // Bật/ tắt chọn tháng
                    if (!monthSelect.disabled) {
                        monthSelect.selectedIndex = 0; // Đặt lại lựa chọn tháng
                        document.getElementById('daySelect').disabled = true; // Tắt chọn ngày
                        updateMonths(); // Cập nhật tháng hợp lệ
                    }
                });

                // Cập nhật tháng hợp lệ dựa trên năm đã chọn
                function updateMonths() {
                    const year = parseInt(document.getElementById('yearSelect').value);
                    const monthSelect = document.getElementById('monthSelect');

                    // Lấy tháng hiện tại
                    const currentMonth = new Date().getMonth() + 1; // Tháng được tính từ 0

                    // Nếu năm là năm hiện tại, chỉ cho phép chọn đến tháng hiện tại
                    for (let i = 1; i <= 12; i++) {
                        const option = monthSelect.querySelector(`option[value="${i}"]`);
                        if (year === new Date().getFullYear() && i > currentMonth) {
                            option.disabled = true; // Vô hiệu hóa tháng tương lai
                        } else {
                            option.disabled = false; // Bật lại tháng
                        }
                    }
                }

                // Kích hoạt lựa chọn ngày khi chọn tháng
                document.getElementById('monthSelect').addEventListener('change', function() {
                    const daySelect = document.getElementById('daySelect');
                    daySelect.disabled = !this.value; // Bật/ tắt chọn ngày
                    if (!daySelect.disabled) {
                        updateDaysRange(); // Cập nhật ngày hợp lệ
                    }
                });

                // Cập nhật ngày hợp lệ dựa trên tháng và năm đã chọn
                function updateDaysRange() {
                    const year = parseInt(document.getElementById('yearSelect').value);
                    const month = parseInt(document.getElementById('monthSelect').value);
                    const daySelect = document.getElementById('daySelect');

                    // Kiểm tra nếu giá trị năm và tháng hợp lệ
                    if (!year || !month) {
                        daySelect.disabled = true;
                        return;
                    }

                    // Xác định ngày bắt đầu và kết thúc
                    const startDate = new Date(year, month - 1, 1); // Ngày đầu tiên của tháng
                    const endDate = new Date(year, month, 0); // Ngày cuối cùng của tháng
                    const minDate = startDate.toISOString().split('T')[0];
                    const maxDate = endDate.toISOString().split('T')[0];

                    // Thiết lập giá trị min và max cho input type date
                    daySelect.setAttribute("min", minDate);
                    daySelect.setAttribute("max", maxDate);

                    // Đặt lại giá trị hiện tại nếu không nằm trong phạm vi mới
                    const selectedDate = new Date(daySelect.value);
                    if (selectedDate < startDate || selectedDate > endDate) {
                        daySelect.value = ''; // Xóa giá trị không hợp lệ
                    }

                    daySelect.disabled = false;
                }



                // Xác thực ngày
                function validateForm() {
                    const year = parseInt(document.getElementById('yearSelect').value);
                    const month = parseInt(document.getElementById('monthSelect').value);
                    const day = new Date(document.getElementById('daySelect').value);
                    const errorMessage = document.getElementById('error-message');

                    // Xóa thông báo lỗi trước đó
                    errorMessage.style.display = 'none';
                    errorMessage.innerText = '';

                    // Lấy ngày hiện tại
                    const today = new Date();

                    // Kiểm tra ngày tương lai
                    if (day > today) {
                        errorMessage.innerText = 'Ngày, tháng, năm không được chọn ngày tương lai.';
                        errorMessage.style.display = 'block'; // Hiển thị thông báo lỗi
                        return false; // Ngăn gửi biểu mẫu
                    }

                    return true; // Cho phép gửi biểu mẫu
                }
            </script> --}}

            <script>
                // Kích hoạt lựa chọn tháng khi chọn năm
                document.getElementById('yearSelect').addEventListener('change', function() {
                    const monthSelect = document.getElementById('monthSelect');
                    monthSelect.disabled = !this.value; // Bật/ tắt chọn tháng
                    if (!monthSelect.disabled) {
                        monthSelect.selectedIndex = 0; // Đặt lại lựa chọn tháng
                        document.getElementById('daySelect').value = ''; // Xóa lựa chọn ngày
                        document.getElementById('daySelect').disabled = true; // Tắt chọn ngày
                        updateMonths(); // Cập nhật tháng hợp lệ
                    }
                });

                // Cập nhật tháng hợp lệ dựa trên năm đã chọn
                function updateMonths() {
                    const year = parseInt(document.getElementById('yearSelect').value);
                    const monthSelect = document.getElementById('monthSelect');

                    // Lấy tháng hiện tại
                    const currentMonth = new Date().getMonth() + 1; // Tháng được tính từ 0

                    // Nếu năm là năm hiện tại, chỉ cho phép chọn đến tháng hiện tại
                    for (let i = 1; i <= 12; i++) {
                        const option = monthSelect.querySelector(`option[value="${i}"]`);
                        if (year === new Date().getFullYear() && i > currentMonth) {
                            option.disabled = true; // Vô hiệu hóa tháng tương lai
                        } else {
                            option.disabled = false; // Bật lại tháng
                        }
                    }
                }

                // Kích hoạt lựa chọn ngày khi chọn tháng
                document.getElementById('monthSelect').addEventListener('change', function() {
                    const daySelect = document.getElementById('daySelect');
                    daySelect.disabled = !this.value; // Bật/ tắt chọn ngày
                    if (!daySelect.disabled) {
                        updateDaysRange(); // Cập nhật ngày hợp lệ
                    }
                });

                // Cập nhật ngày hợp lệ dựa trên tháng và năm đã chọn
                function updateDaysRange() {
                    const year = parseInt(document.getElementById('yearSelect').value);
                    const month = parseInt(document.getElementById('monthSelect').value);
                    const daySelect = document.getElementById('daySelect');

                    // Kiểm tra nếu giá trị năm và tháng hợp lệ
                    if (!year || !month) {
                        daySelect.disabled = true;
                        return;
                    }

                    // Xác định số ngày của tháng, bao gồm cả năm nhuận
                    const daysInMonth = new Date(year, month, 0).getDate();

                    // Thiết lập giá trị min và max cho input type date
                    const minDate = new Date(year, month - 1, 2).toISOString().split('T')[0];
                    const maxDate = new Date(year, month - 1, daysInMonth + 1).toISOString().split('T')[0];
                    daySelect.setAttribute("min", minDate);
                    daySelect.setAttribute("max", maxDate);

                    // Đặt lại giá trị hiện tại nếu không nằm trong phạm vi mới
                    const selectedDate = new Date(daySelect.value);
                    if (selectedDate < new Date(minDate) || selectedDate > new Date(maxDate)) {
                        daySelect.value = ''; // Xóa giá trị không hợp lệ
                    }

                    daySelect.disabled = false;
                }

                // Xác thực ngày
                function validateForm() {
                    const year = parseInt(document.getElementById('yearSelect').value);
                    const month = parseInt(document.getElementById('monthSelect').value);
                    const day = new Date(document.getElementById('daySelect').value);
                    const errorMessage = document.getElementById('error-message');

                    // Xóa thông báo lỗi trước đó
                    errorMessage.style.display = 'none';
                    errorMessage.innerText = '';

                    // Lấy ngày hiện tại
                    const today = new Date();
                    today.setHours(0, 0, 0, 0); // Đặt thời gian về 00:00:00 để tránh sai lệch thời gian

                    // Kiểm tra ngày tương lai
                    if (day > today) {
                        errorMessage.innerText = 'Ngày, tháng, năm không được chọn ngày tương lai.';
                        errorMessage.style.display = 'block'; // Hiển thị thông báo lỗi
                        return false; // Ngăn gửi biểu mẫu
                    }

                    return true; // Cho phép gửi biểu mẫu
                }
            </script>


            <!-- End Monthly Sales -->

            <div class="row">
                {{-- <div class="col-md-6 col-xl-6"> --}}
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                <i data-feather="minus-square" class="widgets-icons"></i>
                            </div>
                            <h5 class="card-title mb-0">Audiences By Time Of Day</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="audiences-daily" class="apex-charts mt-n3"></div>
                    </div>

                </div>
            </div>

            {{-- <div class="col-md-6 col-xl-6">
                <div class="card overflow-hidden">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                <i data-feather="table" class="widgets-icons"></i>
                            </div>
                            <h5 class="card-title mb-0">Most Visited Pages</h5>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-traffic mb-0">
                                <tbody>

                                    <thead>
                                        <tr>
                                            <th>Page name</th>
                                            <th>Visitors</th>
                                            <th>Unique</th>
                                            <th colspan="2">Bounce rate</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        <td>
                                            /home
                                            <a href="#" class="ms-1" aria-label="Open website">
                                                <i data-feather="link" class="ms-1 text-primary"
                                                    style="height: 15px; width: 15px;"></i>
                                            </a>
                                        </td>
                                        <td>5,896</td>
                                        <td>3,654</td>
                                        <td>82.54%</td>
                                        <td class="w-25">
                                            <div id="sparkline-bounce-1" class="apex-charts"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            /about.html
                                            <a href="#" class="ms-1" aria-label="Open website">
                                                <i data-feather="link" class="ms-1 text-primary"
                                                    style="height: 15px; width: 15px;"></i>
                                            </a>
                                        </td>
                                        <td>3,898</td>
                                        <td>3,450</td>
                                        <td>76.29%</td>
                                        <td class="w-25">
                                            <div id="sparkline-bounce-2" class="apex-charts"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            /index.html
                                            <a href="#" class="ms-1" aria-label="Open website">
                                                <i data-feather="link" class="ms-1 text-primary"
                                                    style="height: 15px; width: 15px;"></i>
                                            </a>
                                        </td>
                                        <td>3,057</td>
                                        <td>2,589</td>
                                        <td>72.68%</td>
                                        <td class="w-25">
                                            <div id="sparkline-bounce-3" class="apex-charts"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            /invoice.html
                                            <a href="#" class="ms-1" aria-label="Open website">
                                                <i data-feather="link" class="ms-1 text-primary"
                                                    style="height: 15px; width: 15px;"></i>
                                            </a>
                                        </td>
                                        <td>867</td>
                                        <td>795</td>
                                        <td>44.78%</td>
                                        <td class="w-25">
                                            <div id="sparkline-bounce-4" class="apex-charts"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            /docs/
                                            <a href="#" class="ms-1" aria-label="Open website">
                                                <i data-feather="link" class="ms-1 text-primary"
                                                    style="height: 15px; width: 15px;"></i>
                                            </a>
                                        </td>
                                        <td>958</td>
                                        <td>801</td>
                                        <td>41.15%</td>
                                        <td class="w-25">
                                            <div id="sparkline-bounce-5" class="apex-charts"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            /service.html
                                            <a href="#" class="ms-1" aria-label="Open website">
                                                <i data-feather="link" class="ms-1 text-primary"
                                                    style="height: 15px; width: 15px;"></i>
                                            </a>
                                        </td>
                                        <td>658</td>
                                        <td>589</td>
                                        <td>32.65%</td>
                                        <td class="w-25">
                                            <div id="sparkline-bounce-6" class="apex-charts"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            /analytical.html
                                            <a href="#" class="ms-1" aria-label="Open website">
                                                <i data-feather="link" class="ms-1 text-primary"
                                                    style="height: 15px; width: 15px;"></i>
                                            </a>
                                        </td>
                                        <td>457</td>
                                        <td>859</td>
                                        <td>32.65%</td>
                                        <td class="w-25">
                                            <div id="sparkline-bounce-7" class="apex-charts"></div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div> --}}
    </div>

    </div> <!-- container-fluid -->
    </div> <!-- content -->
    </div> <!-- content -->

    </div> <!-- content -->
@endsection

@section('js')
@endsection
