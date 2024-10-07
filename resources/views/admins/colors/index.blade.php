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
                        <h5>Danh sách màu sắc</h5>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admins.colors.create') }}" class="align-items-center btn btn-success d-flex">
                            <i data-feather="plus-square"></i>Thêm màu mới
                        </a>
                    </div>

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
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="d-flex ms-2">
                                        <a href="{{ route('admins.colors.show', $item) }}"
                                            class="btn btn-info me-3">Xem</a>
                                        <a href="{{ route('admins.colors.edit', $item) }}"
                                            class="btn btn-success me-3">Sửa</a>
                                        <form action="{{ route('admins.colors.destroy', $item) }}"
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
<!-- All User Table Ends-->

@endsection