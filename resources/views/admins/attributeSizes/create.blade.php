@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')

@endsection

@section('content')
    <!-- New Category Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Tạo mới sizes</h5>
                                </div>
                                <form action="{{ route('admins.attributeSizes.store') }}" method="POST" >
                                    @csrf
                                    <div class="theme-form theme-form-2 mega-form">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"> Tên</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="attribute_size_name" placeholder="Sizes Name" value="{{ old('attribute_size_name') }}">
                                                @error('attribute_size_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit" class="btn btn-success">Thêm mới</button>
                                            </div>
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
    <!-- New Category Add End -->
@endsection

@section('js')

@endsection
