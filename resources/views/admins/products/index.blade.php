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
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>

                                            <th>Ảnh sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Danh mục</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="table-image">
                                                    <img src=" {{ asset('admin/assets/images/product/1.png') }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </td>

                                            <td>Aata Buscuit</td>

                                            <td>Buscuit</td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>

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
