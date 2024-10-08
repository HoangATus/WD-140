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
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Tên </label>
                                <div class="col-sm-9">
                                    <p>{{ $category->name }}</p>
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Slug</label>
                                <div class="col-sm-9">
                                    <p>{{ $category->slug }}</p>
                                </div>
                            </div>

                          

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Ảnh </label>
                                <div class="col-sm-9">
                                    @if($category->cover)
                                        <img src="{{ Storage::url($category->cover) }}" alt="Category Image" style="max-width: 200px;">
                                    @else
                                        <p>Không có ảnh</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <a href="{{ route('admins.categories.index') }}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
