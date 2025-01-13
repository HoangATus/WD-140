@extends('admins.layouts.admin')
@section('title')
    Thống Kê Doanh Thu
@endsection
@section('content')
    <div class="container-xxl">
        <h2># Thống kê Bán Hàng</h2>
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Thống kê đơn hàng</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="row g-3">
                    @foreach ($counts as $status => $count)
                        <div class="" style="flex: 0 0 14.2857%; /* 100% / 7 */; max-width: 14.2857%;">
                            <div class="card" style=" height: 80px;">
                                <div class="card-body d-flex align-items-center">
                                    <div class="fs-14 mb-1 flex-grow-1 fw-semibold text-black">{{ $status }}
                                    </div>
                                    <span class="fs-22 mb-1 ms-2 fw-semibold text-black">{{ $count }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"># Thống Kê Doanh Thu và Lợi nhuận</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thống Kê Doanh Thu và Lợi nhuận</h5>
                    </div>
                    <div class="card-body">
                        <div class="filter-container">
                            <div class="filter-tabs">
                                <button class="filter-tab active" onclick="selectFilter('day')">Ngày</button>
                                <button class="filter-tab" onclick="selectFilter('month')">Tháng</button>
                                <button class="filter-tab" onclick="selectFilter('year')">Năm</button>
                                <button class="filter-tab" onclick="selectFilter('range')">Khoảng thời gian</button>
                            </div>

                            <div class="filter-inputs">
                                <div>
                                    <input type="date" id="dayInput" class="filter-input" style="display: block;"
                                        onchange="fetchRevenueData()" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                                        max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
                                </div>
                                <div>

                                    <input type="month" id="monthInput" class="filter-input" style="display: block;"
                                        onchange="fetchMonthlyRevenue()">
                                </div>
                                <select id="yearInput" class="filter-input" onchange="fetchYearlyRevenue()">
                       
                                 @foreach ($revenu as $year)
                                 <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                                 @endforeach
                                </select>

                                <div id="rangeInput" style="display: none; border: none; outline: none;">
                                    <input type="text" class="filter-input"id="dateRangeInput" name="daterange"
                                        class="range-date">
                                </div>

                            </div>
                        </div>

                        <div id="revenueChart" class="apex-charts mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">

        <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-auto">
                    <label for="month" class="form-label fw-bold">Chọn Tháng</label>
                    <input type="month" id="month" name="month" class="form-control"
                        value="{{ request('month', now()->format('Y-m')) }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </div>
            </div>
        </form>
        @if($topSellingMessage)
        <div class="alert alert-info">
            {{ $topSellingMessage }}
        </div>
    @endif
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif

            <div class="col-md-4">
                <h5 class="fw-bold"># Top 5 Sản Phẩm Bán Chạy Nhất</h5>
                <div class="border p-3 mb-3">
                    @forelse ($topSellingProducts as $product)
                        <div class="d-flex align-items-center border-bottom py-2" style="font-size: 0.9rem;">
                            <div class="me-3"
                                style="width: 45px; height: 45px; background: #e0e0e0; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url($product->product_image_url) }}" alt="Product Image"
                                    style="width: 100%; height: auto;">
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-bold"
                                    style="max-width: 150px; overflow: hidden; white-space: normal; line-height: 1.2; font-size: 14px;">
                                    {{ $product->product_name }}
                                </div>
                            </div>
                            <div class="fw-bold" style="white-space: nowrap;">Số lượng: {{ $product->total_quantity }}
                            </div>
                        </div>
                    @empty
                        <p>Không có sản phẩm bán chạy trong tháng này.</p>
                    @endforelse
                </div>
            </div>

            <div class="col-md-4">
                <h5 class="fw-bold"># Top 5 Sản Phẩm Doanh Thu Cao Nhất</h5>
                <div class="border p-3 mb-3">
                    @forelse ($topRevenueProducts as $item)
                        <div class="d-flex align-items-center border-bottom py-2" style="font-size: 0.9rem;">
                            <div class="me-3"
                                style="width: 45px; height: 45px; background: #e0e0e0; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url($item->product_image_url) }}" alt="Product Image"
                                    style="width: 100%; height: auto;">
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-bold"
                                    style="max-width: 150px; overflow: hidden; white-space: normal; line-height: 1.2; font-size: 14px;">
                                    {{ $item->product_name }}
                                </p>
                            </div>
                            <div class="ms-auto fw-bold" style="white-space: nowrap;">
                                {{ number_format($item->total_revenue, 0, ',', '.') }} VND
                            </div>
                        </div>
                        @empty
                        <p>Không có sản phẩm doanh thu trong tháng này.</p>
                        @endforelse
                </div>
            </div>


            <div class="col-md-4">
                <h5 class="fw-bold"># Top 5 Sản Phẩm Lợi Nhuận Cao Nhất</h5>
                <div class="border p-3 mb-3">
                    @forelse ($topProfitProducts as $item)
                        <div class="d-flex align-items-center border-bottom py-2" style="font-size: 0.9rem;">
                            <div class="me-3"
                                style="width: 45px; height: 45px; background: #e0e0e0; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url($item->product_image_url) }}" alt="Product Image"
                                    style="width: 100%; height: auto;">
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-bold"
                                    style="max-width: 150px; overflow: hidden; white-space: normal; line-height: 1.2; font-size: 14px;">
                                    {{ $item->product_name }}
                                </p>
                            </div>
                            <div class="ms-auto fw-bold" style="white-space: nowrap;">
                                {{ number_format($item->total_profit, 0, ',', '.') }} VND
                            </div>
                        </div>
                        @empty
                        <p>Không có sản phẩm lợi nhuận trong tháng này.</p>
                        @endforelse
                </div>
            </div>
        </div>
    </div>


    <style>
        .filter-container {
            display: flex;
            width: 60px;
            align-items: center;
            padding: 5px;
            background-color: #f5f5f5;
            border-radius: 8px;
            margin-left: auto;
        }

        .filter-container {
            display: flex;
            width: 670px;
            align-items: center;
            padding: 5px;
            background-color: #f5f5f5;
            border-radius: 8px;
        }

        */ .filter-tabs {
            display: flex;
        }

        .filter-tab {
            background-color: transparent;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
            color: #666;
            transition: color 0.3s;
        }

        .filter-tab.active {
            color: #00A7FF;
            border-bottom: 2px solid #00A7FF;
        }

        .filter-inputs {
            margin-left: 10px;
            flex-grow: 1;
        }

        .filter-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .range-input {
            display: flex;
            gap: 5px;
        }

        .range-date {
            width: calc(50% - 5px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        #yearInput::placeholder {
            color: #aaa;
        }
    </style>

    <script>
        let chart;
        let savedStartDate, savedEndDate;

        document.addEventListener("DOMContentLoaded", function() {
            $(function() {
                const today = moment();

                $('#dateRangeInput').daterangepicker({
                    opens: 'left',
                    locale: {
                        format: 'DD/MM/YYYY',
                        applyLabel: 'Áp dụng',
                        cancelLabel: 'Hủy',
                        fromLabel: 'Từ',
                        toLabel: 'Đến',
                        customRangeLabel: 'Tùy chỉnh',
                        daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                        monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5',
                            'Tháng 6',
                            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                        ],
                        firstDay: 1
                    },
                    startDate: today,
                    endDate: today,
                    maxDate: today
                }, function(start, end) {
                    $('#dateRangeInput').val(
                        `${start.format('DD/MM/YYYY')} ~ ${end.format('DD/MM/YYYY')}`);
                    fetchRangeRevenue(start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'));
                });
            });



            selectFilter('month');
            const today = new Date();
            const currentYear = today.getFullYear();
            const currentMonth = String(today.getMonth() + 1).padStart(2, '0');
            const defaultMonthValue = `${currentYear}-${currentMonth}`;

            const monthInput = document.getElementById('monthInput');
            let previousMonthValue = defaultMonthValue;
            monthInput.value = defaultMonthValue;
            monthInput.value = defaultMonthValue;
            monthInput.setAttribute('max', defaultMonthValue);
            fetchMonthlyRevenue();

            monthInput.addEventListener('change', function() {
                const selectedMonth = this.value.trim();
                if (!selectedMonth) {
                    alert('Vui lòng chọn tháng hợp lệ.');
                    this.value = previousMonthValue;
                } else {
                    previousMonthValue = selectedMonth;
                    // fetchMonthlyRevenue();
                }
            });
        });

        function selectFilter(type) {
            document.querySelectorAll('.filter-tab').forEach(tab => tab.classList.remove('active'));
            document.getElementById('dayInput').style.display = 'none';
            document.getElementById('monthInput').style.display = 'none';
            document.getElementById('yearInput').style.display = 'none';
            document.getElementById('rangeInput').style.display = 'none';

            if (type === 'day') {
                document.getElementById('dayInput').style.display = 'block';
                document.querySelector('.filter-tab:nth-child(1)').classList.add('active');
                fetchRevenueData();
            } else if (type === 'month') {
                document.getElementById('monthInput').style.display = 'block';
                document.querySelector('.filter-tab:nth-child(2)').classList.add('active');
                fetchMonthlyRevenue();
            } else if (type === 'year') {
                document.getElementById('yearInput').style.display = 'block';
                document.querySelector('.filter-tab:nth-child(3)').classList.add('active');
                fetchYearlyRevenue();
            } else if (type === 'range') {
                document.getElementById('rangeInput').style.display = 'block';
                document.querySelector('.filter-tab:nth-child(4)').classList.add('active');

                if (savedStartDate && savedEndDate) {
                    $('#dateRangeInput').data('daterangepicker').setStartDate(savedStartDate);
                    $('#dateRangeInput').data('daterangepicker').setEndDate(savedEndDate);
                    fetchRangeRevenue(savedStartDate, savedEndDate);
                } else {
                    const today = moment().format('DD-MM-YYYY');
                    $('#dateRangeInput').data('daterangepicker').setStartDate(today);
                    $('#dateRangeInput').data('daterangepicker').setEndDate(today);
                    fetchRangeRevenue(today, today);
                }
            }
        }

        function fetchRangeRevenue(startDate, endDate) {
            if (!startDate || !endDate) {
                alert('Vui lòng chọn cả ngày bắt đầu và ngày kết thúc.');
                return;
            }
            const start = moment(startDate, 'DD-MM-YYYY');
            const end = moment(endDate, 'DD-MM-YYYY');
            const diffInDays = end.diff(start, 'days');

            if (diffInDays > 30) {
                alert('Khoảng thời gian không được vượt quá 30 ngày.');
                if (savedStartDate && savedEndDate) {
                    $('#dateRangeInput').data('daterangepicker').setStartDate(savedStartDate);
                    $('#dateRangeInput').data('daterangepicker').setEndDate(savedEndDate);
                }
                return;
            }

            const url = `/admins/dashboard/range?daterange=${startDate} - ${endDate}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    const categories = data.map(item => item.date);
                    const revenues = data.map(item => item.revenue || 0);
                    const profits = data.map(item => item.profit || 0);
                    const title = `Doanh Thu và Lợi Nhuận Từ ${startDate} Đến ${endDate}`;

                    savedStartDate = startDate;
                    savedEndDate = endDate;

                    if (chart) chart.destroy();
                    renderChart(document.querySelector("#revenueChart"), categories, revenues, profits, title);
                })
                .catch(error => {
                    error.json().then(errData => {
                        if (errData.error.includes('quá 30 ngày')) {
                            alert('Khoảng thời gian không được vượt quá 30 ngày.');
                        } else if (errData.error.includes('ngày hiện tại')) {
                            alert('Ngày kết thúc không được vượt quá ngày hiện tại.');
                        }
                    }).catch(() => alert('Đã có lỗi xảy ra.'));
                });
        }

        function fetchMonthlyRevenue() {
            const month = document.getElementById('monthInput').value;
            if (!month) return;

            const year = month.slice(0, 4);
            const selectedMonth = month.slice(5, 7);
            const url = `/admins/dashboard/revenue?month=${selectedMonth}&year=${year}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const categories = data.map(item => ` ${item.day}`);
                    const revenues = data.map(item => item.revenue || 0);
                    const profits = data.map(item => item.profit || 0);
                    const title = `Doanh Thu và Lợi Nhuận Tháng ${selectedMonth}/${year}`;

                    if (chart) chart.destroy();
                    renderChart(document.querySelector("#revenueChart"), categories, revenues, profits, title);
                })
                .catch(error => console.error('Error:', error));
        }
        let previousDay = '';

        function fetchRevenueData() {
            const dayInput = document.getElementById('dayInput');
            const day = dayInput.value.trim();

            if (!day) {
                alert('Vui lòng chọn ngày.');
                dayInput.value = previousDay;
                return;
            }
            previousDay = day;

            let url = '/admins/dashboard/revenue?';

            if (day) {
                url += `day=${day}`;
            }

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const categories = data.map(item => `${item.hour}:00`);
                    const revenues = data.map(item => item.revenue || 0);
                    const profits = data.map(item => item.profit || 0);
                    const title = `Doanh Thu và Lợi Nhuận Ngày ${day}`;

                    if (chart) chart.destroy();
                    renderChart(document.querySelector("#revenueChart"), categories, revenues, profits, title);
                })
                .catch(error => console.error('Error:', error));
        }

        function fetchYearlyRevenue() {
            const year = document.getElementById('yearInput').value || new Date().getFullYear();

            const url = `/admins/dashboard/revenue?year=${year}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const categories = data.map(item => `Tháng ${item.month}`);
                    const revenues = data.map(item => item.revenue || 0);
                    const profits = data.map(item => item.profit || 0);
                    const title = `Doanh Thu và Lợi Nhuận Năm ${year}`;

                    if (chart) chart.destroy();
                    renderChart(document.querySelector("#revenueChart"), categories, revenues, profits, title);
                })
                .catch(error => console.error('Error:', error));
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
                    enabled: false
                }
            };
            chart = new ApexCharts(chartElement, options);
            chart.render();
        }
    </script>
@endsection
@section('js')
@endsection
