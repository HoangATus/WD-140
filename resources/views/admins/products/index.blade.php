@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')
@endsection
@section('content')
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Danh sách sản phẩm</h5>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success mt-3">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="d-flex justify-content-end">
                            <a class="btn btn-success" href="{{ route('admins.products.create') }}"><i
                                    data-feather="plus-square"></i> Thêm sản phẩm</a>
                        </div>
                        <div class="mt-3">
                            <div>
                                <div class="">
                                    {{-- <div class="card-body"> --}}
                                    <table id="example" class="table table-bordered" style="width:100%">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Danh mục</th>
                                                <th>Giá</th>
                                                <th>Giá sale</th>
                                                <th>Số lượng</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        <div style="width: 80px;height: 80px;">
                                                            @if (str_contains($item->product_image_url, 'products/'))
                                                                <img src="{{ Storage::url($item->product_image_url) }}"
                                                                    alt=""
                                                                    style="max-width: 100%; max-height: 100%">
                                                            @else
                                                                <img src="{{ $item->product_image_url }}" alt=""
                                                                    style="max-width: 100%; max-height: 100%">
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>{{ number_format($item->variants->min('variant_listed_price'), 0, ',', '.') }}
                                                        VNĐ</td>
                                                    <td>{{ number_format($item->variants->min('variant_sale_price'), 0, ',', '.') }}
                                                        VNĐ</td>
                                                    <td>{{ $item->variants->sum('quantity') }}</td>
                                                    <td>
                                                        {!! $item->is_active
                                                            ? '<span class="badge bg-success text-white">Hoạt động</span>'
                                                            : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                                                    </td>

                                                    <td class="d-flex ms-2">
                                                        <a href="{{ route('admins.products.show', $item) }}"
                                                            class="btn btn-info me-3">Xem</a>
                                                        <a href="{{ route('admins.products.edit', $item) }}"
                                                            class="btn btn-success me-3">Sửa</a>
                                                        <form action="{{ route('admins.products.destroy', $item) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All User Table Ends-->
@endsection
@section('js')
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
