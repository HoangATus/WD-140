@extends('layouts.admin')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Chi tiết sản phẩm</h5>
                        </div>
                        <div class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label
                                    class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="state">
                                        <option disabled>Category Menu</option>
                                        <option>Electronics</option>
                                        <option>Uncategorized</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Ảnh sản phẩm</label>
                                <div class="col-lg-9">
                                          <img
                                            src="{{asset('admin/assets/images/product/1.png')}}"alt class="mx-auto d-block" height="100"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <a href="{{ route('admins.products.index') }}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
