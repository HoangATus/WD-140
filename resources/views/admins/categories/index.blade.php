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
                        <h5>Danh sách danh mục</h5>
                        @if(session('message'))
                        <h4 class="text-primary">{{session('message')}}</h4>
                    @endif
                        <form class="d-inline-flex">
                            <a href="{{route('admins.categories.create')}}"
                                class="align-items-center btn btn-theme d-flex">
                                <i data-feather="plus-square"></i>Thêm Danh mục
                            </a>
                        </form>
                    </div>

                    <div class="table-responsive category-table">
                        <div>
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Tên</th>
                                        <th>Ảnh</th>
                                        <th>Trạng thái</th>
                                        {{-- <th>Slug</th> --}}
                                        <th>Hành động</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($categories as $item)
                <tr >
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td >
                    <div style="width: 80px;height: 80px;">
                        <img src="{{Storage::url($item->cover)}}" style="max-width: 100%; max-height: 100%;" alt="">
                    </div>
                </td>
                <td>
                    {!! $item->is_active ? '<span class="badge bg-success text-white">Hoạt động</span>'
                        : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                </td>
{{-- 
                                     <td>
                                        {{$item->slug}}
                                     </td> --}}

                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('admins.categories.show',$item)}}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{route('admins.categories.edit',$item)}}">
                                                   <i class="ri-pencil-line"></i> 
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{route('admins.categories.destroy', $item)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="ri-delete-bin-line"></i></button>
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
</div>
<!-- All User Table Ends-->

@endsection

@section('js')

@endsection