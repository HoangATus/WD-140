@extends('admins.layouts.admin')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Voucher</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <br>
    <div>
        <a href="{{ route('admins.vouchers.create') }}" class="btn btn-primary mb-3">Tạo Voucher mới</a>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admins.vouchers.index') }}" method="GET"
                        class="d-flex justify-content-between align-items-center mb-4">
                        <!-- Số dòng hiển thị mỗi trang (select bên trái) -->
                        <select name="per_page" class="form-select " onchange="this.form.submit()" style="width: 100px;">
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                        </select>

                        <div class="d-flex align-items-center">
                            <!-- Tìm kiếm -->
                            <input type="text" name="search" class="form-control mr-2"
                                placeholder="Tìm kiếm mã voucher..." value="{{ $search ?? '' }}"
                                style="width: 200px; margin-right: 10px;">

                            <!-- Nút tìm kiếm -->
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </form>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr align="center">
                                <th>Mã Voucher</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Loại</th>
                                <th>Giảm Giá</th>
                                <th>Số Lượng</th>
                                <th>Trạng Thái</th>
                                <th>Phạm Vi Sử Dụng</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr align="center">
                                    <td>{{ $voucher->code }}</td>
                                    <td>{{ \Carbon\Carbon::parse($voucher->start_date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') }}</td>
                                    <td>{{ $voucher->type == 'amount' ? 'Mệnh giá' : '%' }}</td>
                                    <td>
                                        @if ($voucher->type == 'amount')
                                            {{ number_format($voucher->discount_amount, 0) }} VND
                                        @else
                                            {{ $voucher->discount_percentage }}% (Tối đa
                                            {{ number_format($voucher->max_discount, 0) }} VND)
                                        @endif
                                    </td>
                                    <td>{{ $voucher->quantity }}</td>
                                    <td>
                                        <span
                                            class="badge 
                                            {{ $voucher->status ? 'bg-success' : 'bg-danger' }}">
                                            {{ $voucher->status ? 'Kích hoạt' : 'Vô hiệu hóa' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge 
                                            {{ $voucher->usage_type == 'all' ? 'bg-info' : 'bg-warning' }}">
                                            {{ $voucher->usage_type == 'all' ? 'Mọi người' : 'Giới hạn' }}
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('admins.vouchers.edit', $voucher->id) }}"
                                            class="btn btn-warning">Chỉnh sửa</a>
                                        <form action="{{ route('admins.vouchers.destroy', $voucher->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $vouchers->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
