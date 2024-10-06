@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')
@endsection
@section('content')
    @if (session('message'))
        <h4>{{ session('message') }}</h4>
    @endif
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Danh sách sản phẩm</h5>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-success" href="{{ route('admins.products.create') }}"><i
                                    data-feather="plus-square"></i> Thêm sản phẩm</a>
                        </div>
                        <div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
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
                                                <td>{{$item->id}}</td>
                                                <td>
                                                    <div style="width: 80px;height: 80px;">
                                                        @if (str_contains($item->product_image_url, 'products/'))
                                                            <img src="{{ Storage::url($item->product_image_url) }}" alt=""
                                                                style="max-width: 100%; max-height: 100%">
                                                        @else
                                                            <img src="{{ $item->product_image_url}}" alt=""
                                                                style="max-width: 100%; max-height: 100%">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{$item->product_name}}</td>
                                                <td>{{$item->category->name }}</td>
                                                <td>1</td>
                                                {{-- <td>{{$item->variants->variant_listed_price}}</td> --}}
                                                <td class="td-price">200.000 VNĐ</td>
                                                <td>12</td>
                                                <td>
                                                    {!! $item->is_active
                                                        ? '<span class="badge bg-success text-white">Hoạt động</span>'
                                                        : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                                                </td>

                                                <td class="d-flex ms-2">
                                                    <a href="{{ route('admins.products.show', $item) }}" class="btn btn-info me-3">Xem</a>
                                                    <a href="{{ route('admins.products.edit', $item) }}" class="btn btn-success me-3">Sửa</a>
                                                    <form action="{{route('admins.products.destroy', $item) }}" method="POST"
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
