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
                        <div class="title-header option-title">
                            <h1>Danh sách danh mục</h1>
                            @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        </div>
                        <div class="d-flex align-items-end justify-content-end">
                            <a href="{{ route('admins.categories.create') }}" class="d-flex align-items-end btn btn-success">
                                <i data-feather="plus-square"></i> Thêm Danh mục
                            </a>
                        </div>                        

                        <div class="table-responsive category-table">
                            <div>
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">Tên</th>
                                            <th class="align-middle">Ảnh</th>
                                            <th class="align-middle">Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $item)

                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <div style="width: 80px;height: 80px;">
                                                        <img src="{{ asset('storage/' . $item->cover) }}"

                                            <tr class="text-center">
                                                <td class="align-middle">{{ $item->id }}</td>
                                                <td class="align-middle">{{ $item->name }}</td>
                                                <td class="align-middle">
                                                    <div style="width: 80px;height: 80px; margin: 0 auto;">
                                                        <img src="{{ Storage::url($item->cover) }}"

                                                            style="max-width: 100%; max-height: 100%;" alt="">
                                                    </div>
                                                </td>
                                              

                                                <td class="align-middle">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('admins.categories.show', $item) }}" class="btn btn-info mx-1">Xem</a>
                                                        <a href="{{ route('admins.categories.edit', $item) }}" class="btn btn-success mx-1">Sửa</a>
                                                        <form action="{{ route('admins.categories.destroy', $item) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
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
            </div>
        </div>
    </div>
    <!-- All User Table Ends-->
@endsection

@section('js')
@endsection
