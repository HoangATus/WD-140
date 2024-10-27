@extends('admins.layouts.admin')
@section('title')
    Thống Kê Doanh Thu
@endsection
@section('content')
    <div class="content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-xxl">

                <h2># Thống kê Bán Hàng</h2>

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Thống kê đơn hàng</h4>
                    </div>
                </div>

                <!-- start row -->
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="row g-3">
                            <!-- First div -->
                            @foreach ($counts as $status => $count)
                                <div class="col-md-2 col-xl-2">
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="fs-14 mb-1 flex-grow-1 fw-semibold text-black">{{ $status }}
                                            </div>
                                            <span class="fs-22 mb-1 ms-2 fw-semibold text-black">{{ $count }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- end sales -->
                </div>
                <div class="container-xxl">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Thống Kê Doanh Thu</h5>
                                </div>
                                <div class="card-body">
                                    <form id="revenueFilterForm">
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label for="yearSelect" class="form-label">Chọn Năm</label>
                                                <select id="yearSelect" class="form-control" required>
                                                    <option value="" disabled>-- Chọn Năm --</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="monthSelect" class="form-label">Chọn Tháng</label>
                                                <select id="monthSelect" class="form-control" disabled>
                                                    <option value="">-- Chọn Tháng --</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">Tháng {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="daySelect" class="form-label">Chọn Ngày</label>
                                                <input type="date" id="daySelect" class="form-control" disabled>
                                            </div>
                                            <div class="col-md-3 d-flex align-items-end">
                                                <button type="submit" class="btn btn-primary w-100">Tìm Kiếm</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="rangeRevenueForm">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="startDate" class="form-label">Ngày Bắt Đầu</label>
                                                <input type="date" id="startDate"name="startDate" class="form-control"
                                                    max="{{ date('Y-m-d') }}">
                                                <span id="startDateError" style="color: red; font-size: 12px;"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="endDate" class="form-label">Ngày Kết Thúc</label>
                                                <input type="date" id="endDate"name="endDate" class="form-control"
                                                    max="{{ date('Y-m-d') }}">
                                                <span id="endDateError" style="color: red; font-size: 12px;"></span>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <button type="submit" class="btn btn-primary w-100">Xem Doanh Thu</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div id="revenueChart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const today = new Date();
                    const yearSelect = document.getElementById('yearSelect');
                    const monthSelect = document.getElementById('monthSelect');
                    const daySelect = document.getElementById('daySelect');
                    const revenueFilterForm = document.getElementById('revenueFilterForm');
                    const rangeRevenueForm = document.getElementById('rangeRevenueForm');
                    let chart;

                    yearSelect.value = today.getFullYear();
                    handleYearChange();
                    fetchRevenueData();
                    const maxDate =
                        `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;
                    daySelect.setAttribute('max', maxDate);

                    yearSelect.addEventListener('change', handleYearChange);
                    monthSelect.addEventListener('change', handleMonthChange);
                    revenueFilterForm.addEventListener('submit', handleFormSubmit);
                    rangeRevenueForm.addEventListener('submit', handleRangeFormSubmit);

                    function handleYearChange() {
                        const selectedYear = parseInt(yearSelect.value);
                        monthSelect.value = "";
                        daySelect.value = "";
                        monthSelect.disabled = false;
                        daySelect.disabled = true;
                        Array.from(monthSelect.options).forEach(option => {
                            option.disabled = selectedYear === today.getFullYear() && parseInt(option.value) > (
                                today.getMonth() + 1);
                        });
                    }

                    function handleMonthChange() {
                        const selectedYear = parseInt(yearSelect.value);
                        const selectedMonth = parseInt(monthSelect.value);
                        daySelect.disabled = false;
                        const daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();
                        const maxDay = selectedYear === today.getFullYear() && selectedMonth === (today.getMonth() + 1) ?
                            today.getDate() :
                            daysInMonth;

                        daySelect.setAttribute('min', `${selectedYear}-${String(selectedMonth).padStart(2, '0')}-01`);
                        daySelect.setAttribute('max',
                            `${selectedYear}-${String(selectedMonth).padStart(2, '0')}-${String(maxDay).padStart(2, '0')}`
                            );
                    }

                    function handleFormSubmit(event) {
                        event.preventDefault();
                        fetchRevenueData();
                    }

                    function handleRangeFormSubmit(event) {
                        event.preventDefault();
                        const startDate = document.getElementById('startDate').value;
                        const endDate = document.getElementById('endDate').value;
                        const startDateError = document.getElementById('startDateError');
                        const endDateError = document.getElementById('endDateError');

                        startDateError.textContent = "";
                        endDateError.textContent = "";
                        if (startDate && endDate) {
                            const start = new Date(startDate);
                            const end = new Date(endDate);
                            const timeDiff = Math.abs(end - start);
                            const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                            if (start > end) {
                                startDateError.textContent = "Ngày bắt đầu phải nhỏ hơn ngày kết thúc.";
                                return;
                            }
                            if (dayDiff > 30) {
                                endDateError.textContent = "Vui lòng chọn khoảng thời gian không quá 30 ngày.";
                                return;
                            }

                            daySelect.value = "";

                            fetchRangeRevenueData(startDate, endDate);
                        } else {
                            if (!startDate) startDateError.textContent = "Vui lòng chọn ngày bắt đầu.";
                            if (!endDate) endDateError.textContent = "Vui lòng chọn ngày kết thúc.";
                        }
                    }

                    function fetchRevenueData() {
                        const year = yearSelect.value;
                        const month = monthSelect.value;
                        const day = daySelect.value;
                        let url = `/admins/dashboard/revenue?year=${year}`;
                        if (month) url += `&month=${month}`;
                        if (day) url += `&day=${day}`;

                        fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                let categories, revenues, profits, title;
                                if (day) {
                                    categories = data.map(item => `${item.hour}:00`);
                                    title = `Doanh Thu và Lợi Nhuận Theo Giờ của Ngày ${day}`;
                                } else if (month) {
                                    categories = data.map(item => `Ngày ${item.day}`);
                                    title = `Doanh Thu và Lợi Nhuận Theo Ngày của Tháng ${month} Năm ${year}`;
                                } else {
                                    categories = data.map(item => `Tháng ${item.month}`);
                                    title = `Doanh Thu và Lợi Nhuận Theo Tháng của Năm ${year}`;
                                }
                                revenues = data.map(item => item.revenue);
                                profits = data.map(item => item.profit);

                                if (chart) chart.destroy();
                                renderChart(document.querySelector("#revenueChart"), categories, revenues, profits,
                                    title);
                            })
                            .catch(error => console.error('Error:', error));
                    }

                    function fetchRangeRevenueData(startDate, endDate) {
                        const url = `/admins/dashboard/range?start_date=${startDate}&end_date=${endDate}`;

                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    console.error(`HTTP error! Status: ${response.status}`);
                                    throw new Error(`HTTP error! Status: ${response.status}`);
                                }
                                return response.json();
                            })
                            .then(data => {
                                console.log(data);


                                if (!data || data.length === 0) {
                                    console.log('Không có dữ liệu cho khoảng thời gian này.');
                                    return;
                                }

                                const categories = data.map(item => item.date);
                                const revenues = data.map(item => item.revenue || 0);
                                const profits = data.map(item => item.profit || 0);
                                const title = `Doanh Thu Từ ${startDate} Đến ${endDate}`;

                                if (chart) {
                                    chart.destroy();
                                }

                                renderChart(document.querySelector("#revenueChart"), categories, revenues, profits,
                                    title);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }

                    function renderChart(chartElement, categories, revenues, profits, title) {
                        const options = {
                            chart: {
                                type: 'bar',
                                height: 350
                            },
                            title: {
                                text: title,
                                align: 'center'
                            },
                            xaxis: {
                                categories: categories
                            },
                            series: [{
                                    name: 'Doanh Thu',
                                    data: revenues,
                                    color: '#00A7FF'
                                },
                                {
                                    name: 'Lợi Nhuận',
                                    data: profits,
                                    color: '#28a745'
                                }
                            ],
                            dataLabels: {
                                enabled: false,
                                formatter: function(val) {
                                    return val + ' đ';
                                },
                                style: {
                                    colors: ['#212529'],
                                    fontSize: '10px',
                                }
                            }
                        };
                        chart = new ApexCharts(chartElement, options);
                        chart.render();
                    }
                });
            </script>
        @endsection
        @section('js')
        @endsection
