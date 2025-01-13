@extends('admins.layouts.admin')

@section('title')
    Quản lý Banner
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách banner</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Danh sách banner</li>
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

                    <a href="{{ route('admins.banners.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
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
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">

                        <thead class="table-secondary">
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Ảnh</th>
                                <th>Danh mục</th>

                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $item)
                                <tr class="text-center">
                                    <td class="align-middle">{{ $item->id }}</td>
                                    <td class="align-middle">{{ $item->title }}</td>
                                    <td class="align-middle">
                                        <div
                                            style="display: flex; justify-content: center; align-items: center; width: 80px; height: 80px; margin: 0 auto;">
                                            <img src="{{ Storage::url($item->image) }}"
                                                style="max-width: 100%; max-height: 100%;" alt="">
                                        </div>
                                    </td>

                                    <td>{{ $item->category->name }}</td>
                                    <td class="align-middle">

                                        {!! $item->is_active
                                            ? '<span class="badge bg-success text-white">Hoạt động</span>'
                                            : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admins.banners.show', $item) }}"
                                                class="btn btn-info mx-1">Xem</a>
                                            <a href="{{ route('admins.banners.edit', $item) }}"
                                                class="btn btn-success mx-1">Sửa</a>
                                            <form action="{{ route('admins.banners.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-1"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style-libs')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
