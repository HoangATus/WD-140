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

        <!-- start row -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="row g-3">
                    <!-- First div -->
                    @foreach ($counts as $status => $count)
                        <div class="" style="flex: 0 0 14.2857%; /* 100% / 7 */; max-width: 14.2857%;">
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
       
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thống Kê Doanh Thu và Lợi nhuận</h5>
                    </div>
                    <div class="card-body">
                        <!-- Date Filter -->
                        <div class="filter-container">
                            <div class="filter-tabs">
                                <button class="filter-tab active" onclick="selectFilter('day')">Ngày</button>
                                <button class="filter-tab" onclick="selectFilter('month')">Tháng</button>
                                <button class="filter-tab" onclick="selectFilter('year')">Năm</button>
                                <button class="filter-tab" onclick="selectFilter('range')">Khoảng thời gian</button>
                            </div>
                           
                            <div class="filter-inputs">
                                <input type="date" id="dayInput" class="filter-input" style="display: block;"
                                onchange="fetchRevenueData()" 
                                value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                                max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">    <input type="month" id="monthInput" class="filter-input" style="display: block;"
                                    onchange="fetchMonthlyRevenue()">
                             
                                    <select id="yearInput" class="filter-input" onchange="fetchYearlyRevenue()">
                                        @php
                                            $currentYear = \Carbon\Carbon::now()->year; 
                                        @endphp
                                        @for ($i = 0; $i <= 5; $i++)
                                            <option value="{{ $currentYear - $i }}">{{ $currentYear - $i }}</option>
                                        @endfor
                                    </select>
                                    

                                <div id="rangeInput" class="filter-input range-input" style="display: none;">
                                    <input type="date" id="startDate" class="range-date" max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" onchange="fetchRangeRevenue()">
                                    ~
                                    <input type="date" id="endDate" max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" class="range-date" onchange="fetchRangeRevenue()">
                                </div>
                            </div>
                        </div>
                        <!-- Render Revenue Chart -->
                        <div id="revenueChart" class="apex-charts mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <!-- Top 5 Sản Phẩm bán chạy Nhất -->
            <div class="col-md-4">
                <h5 class="fw-bold"># Top 5 Sản Phẩm Bán Chạy Nhất</h5>
                <div class="border p-3 mb-3">
                    @foreach ($topSellingProducts as $product)
                        <div class="d-flex align-items-center border-bottom py-2" style="font-size: 0.9rem;">
                            <div class="me-3"
                                style="width: 45px; height: 45px; background: #e0e0e0; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url($product->product_image_url) }}" alt="Product Image"
                                    style="width: 100%; height: auto;">
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-bold"
                                    style="max-width: 150px; overflow: hidden; white-space: normal; line-height: 1.2; font-size: 14px;">
                                    {{ $product->product_name }}</div>
                            </div>
                            <div class="fw-bold" style="white-space: nowrap;">Số lượng:
                                {{ $product->total_quantity }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Top 5 Sản Phẩm doanh thu cao Nhất -->
            <div class="col-md-4">
                <h5 class="fw-bold"># Top 5 Sản Phẩm Doanh Thu Cao Nhất</h5>
                <div class="border p-3 mb-3">
                    @foreach ($topRevenueProducts as $item)
                        <div class="d-flex align-items-center border-bottom py-2" style="font-size: 0.9rem;">
                            <div class="me-3"
                                style="width: 45px; height: 45px; background: #e0e0e0; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url($item->product_image_url) }}" alt="Product Image"
                                    style="width: 100%; height: auto;">
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-bold"
                                    style="max-width: 150px; overflow: hidden; white-space: normal; line-height: 1.2; font-size: 14px;">
                                    {{ $item->product_name }}</p>
                            </div>
                            <div class="ms-auto fw-bold" style="white-space: nowrap;">
                                {{ number_format($item->total_revenue, 0, ',', '.') }} VND</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Top 5 Sản Phẩm Lợi Nhuận Cao Nhất -->
            <div class="col-md-4">
                <h5 class="fw-bold"># Top 5 Sản Phẩm Lợi Nhuận Cao Nhất</h5>
                <div class="border p-3 mb-3 mt-3">
                    @foreach ($topProfitProducts as $item)
                        <div class="d-flex align-items-center border-bottom py-2" style="font-size: 0.9rem;">
                            <div class="me-3"
                                style="width: 45px; height: 45px; background: #e0e0e0; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url($item->product_image_url) }}" alt="Product Image"
                                    style="width: 100%; height: auto;">
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-bold"
                                    style="max-width: 150px; overflow: hidden; white-space: normal; line-height: 1.2; font-size: 14px;">
                                    {{ $item->product_name }}</p>
                            </div>
                            <div class="ms-auto fw-bold" style="white-space: nowrap;">
                                {{ number_format($item->total_profit, 0, ',', '.') }} VND</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <style>
        .filter-container {
            display: flex;
            width: 800px;
            align-items: center;
            padding: 5px;
            background-color: #f5f5f5;
            border-radius: 8px;
            margin-left: auto;
        }
    
         .filter-container { display: flex;width: 800px; align-items: center; padding: 5px; background-color: #f5f5f5; border-radius: 8px; } */
        .filter-tabs {
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
            color: #f96b3f;
            border-bottom: 2px solid #f96b3f;
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
         document.addEventListener("DOMContentLoaded", function() {
        selectFilter('month'); 
        const today = new Date();
        const currentMonth = today.getFullYear() + '-' + String(today.getMonth() + 1).padStart(2, '0'); 
        document.getElementById('monthInput').value = currentMonth;
        const currentYear = new Date().getFullYear();
        document.getElementById('yearInput').value = currentYear;
        yearInput.value = currentYear;
        fetchMonthlyRevenue();
    });
    function selectFilter(type) {
        document.querySelectorAll('.filter-tab').forEach(tab => tab.classList.remove('active'));
        document.getElementById('dayInput').style.display = 'none';
        document.getElementById('monthInput').style.display = 'none';
        document.getElementById('yearInput').style.display = 'none';
        document.getElementById('rangeInput').style.display = 'none';

        document.getElementById('dayInput').value = new Date().toISOString().slice(0, 10); 
    document.getElementById('monthInput').value = new Date().toISOString().slice(0, 7); 
    document.getElementById('yearInput').value = ''; 
    document.getElementById('startDate').value = ''; 
    document.getElementById('endDate').value = ''; 

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
        } else if (type === 'range') {
            document.getElementById('rangeInput').style.display = 'flex';
            document.querySelector('.filter-tab:nth-child(4)').classList.add('active');
        }
       
    if (type === 'year') {
        const currentYear = new Date().getFullYear(); 
        document.getElementById('yearInput').value = currentYear; 
        document.getElementById('yearInput').style.display = 'block';
        document.querySelector('.filter-tab:nth-child(3)').classList.add('active');
        fetchYearlyRevenue(); 
    }
        if (type === 'month') {
            document.getElementById('monthInput').style.display = 'block';
            document.querySelector('.filter-tab:nth-child(2)').classList.add('active');
            document.getElementById('monthInput').value = new Date().toISOString().slice(0, 7); 
            fetchMonthlyRevenue(); 
        }
        }

     
        function fetchRangeRevenue() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    if (!startDate || !endDate) {
        alert('Vui lòng chọn cả ngày bắt đầu và ngày kết thúc.');
        return;
    }

    const url = `/admins/dashboard/range?start_date=${startDate}&end_date=${endDate}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const categories = data.map(item => item.date);
            const revenues = data.map(item => item.revenue || 0);
            const profits = data.map(item => item.profit || 0);
            const title = `Doanh Thu Từ ${startDate} Đến ${endDate}`;

            if (chart) chart.destroy();
            renderChart(document.querySelector("#revenueChart"), categories, revenues, profits, title);
        })
        .catch(error => console.error('Error:', error));
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
                const title = `Doanh Thu Tháng ${selectedMonth}/${year}`;

                if (chart) chart.destroy();
                renderChart(document.querySelector("#revenueChart"), categories, revenues, profits, title);
            })
            .catch(error => console.error('Error:', error));
    }

    function fetchRevenueData() {
        const day = document.getElementById('dayInput').value;

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
                const title = `Doanh Thu Ngày ${day}`;

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
            const title = `Doanh Thu Năm ${year}`;

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
