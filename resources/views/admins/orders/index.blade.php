@extends('admins.layouts.admin')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Đơn Hàng</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables: </a></li>
                        <li>Danh sách Đơn Hàng</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>
                    @if (session('success'))
                        <div class="alert alert-danger mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">


                        <thead class="table-secondary">

                            <tr align="center">
                                <th class="d-none">ID</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Khách Hàng</th>
                                <th>SDT</th>
                                <th>Tổng Tiền</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Trạng Thái</th>

                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr align="center">
                                    <td class="d-none">{{ $order->id }}</td>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ number_format($order->total) }} VNĐ</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case('pending')
                                                <span class="badge bg-warning text-dark">Đang Chờ Xác Nhận</span>
                                            @break

                                            @case('confirmed')
                                                <span class="badge bg-primary">Đã Xác Nhận</span>
                                            @break

                                            @case('shipped')
                                                <span class="badge bg-info">Đang Giao Hàng</span>
                                            @break

                                            @case('delivered')
                                                <span class="badge bg-success">Giao Hàng Thành Công</span>
                                            @break

                                            @case('completed')
                                                <span class="badge bg-success">Đã Hoàn Thành</span>
                                            @break

                                            @case('canceled')
                                                <span class="badge bg-danger">Đã Hủy</span>
                                            @break

                                            @case('failed')
                                                <span class="badge bg-secondary">Giao Hàng Thất Bại</span>
                                            @break

                                            @default
                                                <span class="badge bg-light text-dark">Không Rõ</span>
                                        @endswitch
                                    </td>


                                    <td>
                                        <a href="{{ route('admins.orders.show', $order->id) }}" class="btn btn-primary">Xem
                                            Chi Tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @endsection

        @section('style-libs')
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

            <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
            <style>
                .d-none {
                    display: none;
                }
            </style>
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        @endsection

        @section('script-libs')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

            <!--datatable js-->
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

            <script>
                new DataTable("#example", {
                    order: [
                        [0, 'desc']
                    ]
                });
            </script>
        @endsection
