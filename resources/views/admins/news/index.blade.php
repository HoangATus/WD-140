@extends('admins.layouts.admin')

@section('title', 'Quản Lý Tin Tức')

@section('css')
<style>
    td {
        word-wrap: break-word;
        white-space: normal !important;
    }
    .table td {
        max-width: 200px;
        overflow-wrap: break-word;
        text-overflow: ellipsis;
    }
</style>
@endsection

@section('content')
<h1 class="mb-4">Quản Lý Tin Tức</h1>

<a href="{{ route('admins.news.create') }}" class="btn btn-success mb-3">Thêm Tin Tức</a>

@if (session('message'))
<div class="alert alert-danger mt-3">
    {{ session('message') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead align="center">
        <tr>
            <th>#</th>
            <th>Tiêu Đề</th>
            <th>Slug</th>
            <th>Danh Mục</th>
            <th>Ảnh</th>
            <th>Tác Giả</th>
            <th>Trạng Thái</th>
            <th>Ngày Tạo</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $item)
        <tr align="center">
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->slug }}</td>
            <td>{{ $item->category->name }}</td>
            <td>
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" width="100">
                @else
                <p>Không có ảnh</p>
                @endif
            </td>
            <td>{{ $item->author }}</td>
            <td>
                {!! $item->status
                    ? '<span class="badge bg-success text-white">Hoạt động</span>'
                    : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
            </td>
            <td>{{ $item->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('admins.news.show', $item->id) }}" class="btn btn-primary btn-sm">Xem</a>
                <a href="{{ route('admins.news.edit', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('admins.news.destroy', $item->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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