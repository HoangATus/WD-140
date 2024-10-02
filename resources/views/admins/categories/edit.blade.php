@extends('layouts.admin')

@section('title')
    Sửa Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Sửa Danh mục</h5>
                                </div>

                                <form action="{{ route('admins.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') 

                                    <div class="theme-form theme-form-2 mega-form">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Tên </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                       
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Ảnh </label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="cover">
                                                @if($category->cover)
                                                    <img src="{{ Storage::url($category->cover) }}" alt="Category Image" style="max-width: 200px;">
                                                @else
                                                    <p>Không có ảnh</p>
                                                @endif
                                                @error('cover')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                          <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                            <div class="col-sm-9">
                                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $category->is_active))>
                                                <label for="is_active" class="form-check-label">Kích hoạt</label>
                                                @error('is_active')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit" class="btn btn-theme">Cập nhật </button>
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
@endsection
