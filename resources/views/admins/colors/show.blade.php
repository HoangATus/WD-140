@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xxl-8 col-lg-10 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Chi tiết Màu Sắc</h5>
                                </div>
                                <form class="theme-form theme-form-2 mega-form">

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Tên màu</label>
                                        <div class="col-sm-9">
                                            <p>{{ $color->name }}</p>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <a href="{{ route('admins.colors.index') }}" class="btn btn-secondary">Quay lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
