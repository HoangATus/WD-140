@extends('admins.layouts.admin')

@section('title')
    Quản lý Tài khoản
@endsection

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Chi Tiết Đơn Hàng #AHBGHF12313115</h3>
    <div class="card mb-4">
        <div class="card-body">
            <h5>#1. Thông Tin Đơn Hàng</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Mã Đơn Hàng</label>
                    <input type="text" class="form-control" value="AHBGHF12313115" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Trạng Thái Thanh Toán</label>
                    <input type="text" class="form-control" value="Đã Thanh Toán" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tên Khách Hàng</label>
                    <input type="text" class="form-control" value="Nguyễn Văn A" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Điện Thoại</label>
                    <input type="text" class="form-control" value="09123123123" readonly>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Địa Chỉ</label>
                    <input type="text" class="form-control" value="Số 1, Trịnh Văn Bô, Nam Từ Liêm, Hà Nội" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5>#2. Thông Tin Sản Phẩm</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Biến Thể</th>
                        <th>Số Lượng</th>
                        <th>Giá Bán</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sản Phẩm A</td>
                        <td>Màu: Đen, Size: M</td>
                        <td>2</td>
                        <td>5,000,000</td>
                        <td>10,000,000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sản Phẩm B</td>
                        <td>Màu: Đen, Size: L</td>
                        <td>1</td>
                        <td>3,000,000</td>
                        <td>3,000,000</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-3 offset-md-9">
                    <div class="d-flex justify-content-between">
                        <span><b>Mã giảm giá (Voucher):</b></span>
                        <span class="text-danger">-100,000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span><b>Tổng:</b></span>
                        <span class="fw-bold">12,900,000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5>#3. Lịch Sử Thay Đổi Trạng Thái</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Trạng Thái Thay Đổi</th>
                        <th>Ghi Chú</th>
                        <th>Người Thay Đổi</th>
                        <th>Thời Gian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Đã Xác Nhận --> Đang Giao Hàng</td>
                        <td>-</td>
                        <td>Admin01</td>
                        <td>11:30 05/09/2024</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Chờ Xác Nhận --> Đã Xác Nhận</td>
                        <td>-</td>
                        <td>Admin01</td>
                        <td>10:30 05/09/2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5>#4. Thay Đổi Trạng Thái Đơn Hàng</h5>
            <div class="mb-3">
                <label for="status">Trạng Thái</label>
                <select id="status" class="form-select">
                    <option selected>Đang Giao Hàng</option>
                    <option>Đã Giao Hàng</option>
                    <option>Đã Hủy</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="note">Ghi Chú</label>
                <textarea id="note" class="form-control" rows="3"></textarea>
            </div>
            <button class="btn btn-secondary">Hủy</button>
            <button class="btn btn-primary">Lưu</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

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


