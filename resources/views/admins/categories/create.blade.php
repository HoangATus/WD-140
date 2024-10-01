@extends('layouts.admin')

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
                                    <h5>Tạo mới danh mục</h5>
                                </div>
                                {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                                <form action="{{ route('admins.categories.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="theme-form theme-form-2 mega-form">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"> Tên</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name" placeholder="Category Name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Ảnh</label>
                                            <div class="form-group col-sm-9">
                                                <input type="file" class="form-control" name="cover">
                                               
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 form-label-title">Trạng thái:</label>
                                            <div class="col-sm-9">
                                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{ old('is_active', 1) ? 'checked' : '' }}>
                                                <label for="is_active" class="form-check-label">Kích hoạt</label>
                                               
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit" class="btn btn-theme">Thêm mới</button>
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
