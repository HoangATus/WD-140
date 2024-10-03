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
                        <h5>Danh sách Sizes</h5>
                        <form class="d-inline-flex">
                            <a href="{{route('admins.attributeSizes.create')}}"
                                class="align-items-center btn btn-theme d-flex">
                                <i data-feather="plus-square"></i>Thêm Sizes
                            </a>
                        </form>
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
                        <div>
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($attributeSizes as $item)
                                <tr >
                              <td>{{$item->id}}</td>
                             <td>{{$item->attribute_size_name}}</td>
                          <td>
                            <ul>
                                <li>
                                    <a href="{{route('admins.attributeSizes.edit',$item)}}">
                                   <i class="ri-pencil-line"></i> 
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('admins.attributeSizes.destroy', $item)}}" method="POST">
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