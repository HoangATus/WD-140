@extends('admins.layouts.admin')

@section('title')
    Chi tiết Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Chi tiết danh mục</h5>
                        </div>
                        <div class="theme-form theme-form-2 mega-form">

                            <!-- Tên -->
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Tên</label>
                                <div class="col-sm-9">
                                    <p>{{ $banner->title }}</p>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Ảnh</label>
                                <div class="col-sm-9">
                                    @if ($banner->image)
                                        <img src="{{ Storage::url($banner->image) }}" alt="Category Image" style="max-width: 200px;">
                                    @else
                                        <p>Không có ảnh</p>
                                    @endif
                                </div>
                            </div>
                            <!-- Slug -->
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Danh mục</label>
                                <div class="col-sm-9">
                                    <p>{{ $banner->category->name }}</p>
                                </div>
                            </div>

                            <!-- Trạng thái -->
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                <div class="col-sm-9">
                                    <p>{!! $banner->is_active ? '<span class="badge bg-success text-white">Hoạt động</span>' : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}</p>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <a href="{{ route('admins.banners.index') }}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
