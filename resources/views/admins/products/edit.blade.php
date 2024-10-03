@extends('layouts.admin')

@section('title')
 Trang quản trị
@endsection

@section('css')

@endsection
@section('content')
  <!-- New Product Add Start -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Chỉnh sửa sản phẩm</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"
                                            placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="state">
                                            <option disabled>Category Menu</option>
                                            <option>Electronics</option>
                                            <option>TV & Appliances</option>
                                            <option>Home & Furniture</option>
                                            <option>Another</option>
                                            <option>Baby & Kids</option>
                                            <option>Health, Beauty & Perfumes</option>
                                            <option>Uncategorized</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Ảnh sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-choose" type="file"
                                            id="formFile" multiple>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-theme">Cập nhật</button>
                                    </div>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New Product Add End -->

@endsection

@section('js')

@endsection