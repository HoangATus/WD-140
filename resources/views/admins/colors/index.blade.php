@extends('layouts.admin')

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
                        <form class="d-inline-flex">
                            <a href="{{ route('admins.colors.create') }}" class="align-items-center btn btn-theme d-flex">
                                <i data-feather="plus-square"></i>Thêm màu mới
                            </a>
                        </form>
                    </div>

                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Số lượng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('admins.colors.show',$item)}}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{route('admins.colors.edit',$item)}}">
                                                   <i class="ri-pencil-line"></i> 
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{route('admins.colors.destroy',$item)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="ri-delete-bin-line"></i></button>
                                                    <!-- <button type="submit">Xoa</button> -->
                                                    </form>
                                                   
                                                </li>
                                            </ul>
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