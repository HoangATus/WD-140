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
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-success" href="{{ route('admins.products.create') }}"><i data-feather="plus-square"></i> Thêm sản phẩm</a>
                        </div>
                        <div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Danh mục</th>
                                                <th>Giá</th>
                                                <th>Giá sale</th>
                                                <th>Ảnh</th>
                                                <th>Số lượng</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Áo nam đẹp</td>
                                                <td>Áo nam</td>
                                                <td class="td-price">300.000 VNĐ</td>
                                                <td class="td-price">200.000 VNĐ</td>
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('admin/assets/images/product/1.png') }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                </td>
                                                
                                                <td>12</td>
                                                <td class="">
                                                    <span class="text-danger">Không còn hàng</span>
                                                </td>

                                                <td class="d-flex ms-2">
                                                    <a href="" class="btn btn-info me-3">Xem</a>
                                                    <a href="" class="btn btn-success me-3">Sửa</a>
                                                    <form action="" method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Áo nam đẹp</td>
                                                <td>Áo nam</td>
                                                <td class="td-price">300.000 VNĐ</td>
                                                <td class="td-price">200.000 VNĐ</td>
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('admin/assets/images/product/1.png') }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                </td>
                                                
                                                <td>12</td>
                                                <td class="">
                                                    <span class="text-danger">Không còn hàng</span>
                                                </td>

                                                <td class="d-flex ms-2">
                                                    <a href="" class="btn btn-info me-3">Xem</a>
                                                    <a href="" class="btn btn-success me-3">Sửa</a>
                                                    <form action="" method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Áo nam đẹp</td>
                                                <td>Áo nam</td>
                                                <td class="td-price">300.000 VNĐ</td>
                                                <td class="td-price">200.000 VNĐ</td>
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('admin/assets/images/product/1.png') }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                </td>
                                                
                                                <td>12</td>
                                                <td class="">
                                                    <span class="text-danger">Không còn hàng</span>
                                                </td>

                                                <td class="d-flex ms-2">
                                                    <a href="" class="btn btn-info me-3">Xem</a>
                                                    <a href="" class="btn btn-success me-3">Sửa</a>
                                                    <form action="" method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Áo nam đẹp</td>
                                                <td>Áo nam</td>
                                                <td class="td-price">300.000 VNĐ</td>
                                                <td class="td-price">200.000 VNĐ</td>
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('admin/assets/images/product/1.png') }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                </td>
                                                
                                                <td>12</td>
                                                <td class="">
                                                    <span class="text-danger">Không còn hàng</span>
                                                </td>

                                                <td class="d-flex ms-2">
                                                    <a href="" class="btn btn-info me-3">Xem</a>
                                                    <a href="" class="btn btn-success me-3">Sửa</a>
                                                    <form action="" method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
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
