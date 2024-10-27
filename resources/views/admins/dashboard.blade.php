@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')
@endsection
@section('content')
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
                        @foreach ($orderCounts as $status => $count)
                            <div class="col-md-2 col-xl-2">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="fs-14 mb-1 flex-grow-1 fw-semibold text-black">{{ $status }}</div>
                                        <span class="fs-22 mb-1 ms-2 fw-semibold text-black">{{ $count }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- end sales -->
            </div>
            <!-- end row -->

            <!-- Start Monthly Sales -->
            <div class="row">
                <form method="GET" action="{{ route('admins.dashboard') }}">
                    <label for="month">Bộ lọc Tháng:</label>
                    <select name="month" id="month" onchange="this.form.submit()">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                                Tháng {{ $i }}
                            </option>
                        @endfor
                    </select>
            
                    {{-- <label for="year">Bộ lọc Năm:</label>
                    <select name="year" id="year" onchange="this.form.submit()">
                        @for ($i = 2020; $i <= now()->year; $i++) 
                            <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>
                                Năm {{ $i }}
                            </option>
                        @endfor
                    </select> --}}
                </form>
                <br><br>
                <h4>Tổng doanh thu: {{ number_format($data['totalRevenue'], 0, ',', '.') }} VNĐ</h4> <br>
                <h4>Tổng số đơn hàng: {{ $data['totalOrders'] }} đơn</h4> 
            
                <canvas id="revenueProfitChart"></canvas>
            
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('revenueProfitChart').getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: @json($data['dates']),
                            datasets: [{
                                    label: 'Doanh thu',
                                    data: @json($data['revenue']),
                                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                },
                                {
                                    label: 'Lợi nhuận',
                                    data: @json($data['profit']),
                                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                                },
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
            
            
            <!-- End Monthly Sales -->

            {{-- <div class="row">
                <div class="col-md-6 col-xl-6">
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

                <div class="col-md-6 col-xl-6">
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
                </div>
            </div> --}}

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@section('js')
@endsection
