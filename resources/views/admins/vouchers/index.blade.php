@extends('admins.layouts.admin')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Voucher</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables: </a></li>
                        <li>Danh sách Voucher</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>

                </div>
                <div class="card-body">
                    <a href="{{ route('admins.vouchers.create') }}" class="btn btn-primary mb-3">Tạo Voucher mới</a>
                    @if (session('success'))
                        <div class="aler alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th>Mã Voucher</th>
                                <th>% Giảm Giá</th>
                                <th>Giảm Tối Đa</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Trạng thái </th>
                                <th>Công Khai</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr align="center">
                                    <td>{{ $voucher->code }}</td>
                                    <td>{{ intval($voucher->discount_percent) }}%</td>
                                    <td>{{ number_format($voucher->max_discount_amount, 0, ',', '.') }} VNĐ</td>
                                    <td>{{ $voucher->start_date }}</td>
                                    <td>{{ $voucher->end_date }}</td>
                                    <td>
                                        @if ($voucher->is_active)
                                            <span class="badge bg-success">Hoạt Động</span>
                                        @else
                                            <span class="badge bg-danger">Không Hoạt Động</span>
                                        @endif
                                    </td>

                                    <td>{{ $voucher->is_public ? 'Có' : 'Không' }}</td>
                                    <td>
                                        <a href="{{ route('admins.vouchers.edit', $voucher->id) }}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <a href="{{ route('admins.vouchers.show', $voucher->id) }}"
                                            class="btn btn-warning btn-sm">Xem</a>
                                        <form action="{{ route('admins.vouchers.destroy', $voucher->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa voucher này không?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @endsection

        @section('style-libs')
            <!--datatable css-->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
            <!--datatable responsive css-->
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
