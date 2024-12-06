@extends('admins.layouts.admin')

@section('title')
    Sửa Banner
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
                                    <h5>Sửa Banner</h5>
                                </div>

                                <form action="{{ route('admins.banners.update', $banner->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="theme-form theme-form-2 mega-form">

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Tiêu đề</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="title"
                                                    value="{{ old('title', $banner->title) }}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Ảnh</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="image">
                                                @if ($banner->image)
                                                    <img src="{{ Storage::url($banner->image) }}" alt="Banner Image"
                                                        style="max-width: 200px;">
                                                @else
                                                    <p>Không có ảnh</p>
                                                @endif
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Danh mục: </label>
                                            <div class="col-sm-9">
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="">Chọn danh mục</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id', $banner->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                            <div class="col-sm-9">
                                                <input class="form-check-input" type="checkbox" name="is_active"
                                                    id="is_active" value="1" @checked(old('is_active', $banner->is_active))>
                                                <label for="is_active" class="form-check-label">Kích hoạt</label>
                                                @error('is_active')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
