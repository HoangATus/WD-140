@extends('admins.layouts.admin')

@section('title')
    Trang quản trị - Tạo mới Banner
@endsection

@section('css')

@endsection

@section('content')
    <!-- New Banner Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Tạo mới Banner</h5>
                                </div>
                                
                                <form action="{{ route('admins.banners.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="theme-form theme-form-2 mega-form">

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Tiêu đề</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="title" placeholder="Banner Title" value="{{ old('title') }}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Ảnh</label>
                                            <div class="form-group col-sm-9">
                                                <input type="file" class="form-control" name="image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                           
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Đường dẫn</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="link" placeholder="Link URL" value="{{ old('link') }}">
                                                @error('link')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            
                                            <label class="col-sm-3 form-label-title">Trạng thái:</label>
                                            <div class="col-sm-9">
                                                <input class="form-check-input" type="checkbox" value="1" name="is_active"checked id="is_active" >
                                                <label for="is_active" class="form-check-label">Kích hoạt</label>
                                               
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
    <!-- New Banner Add End -->
@endsection

@section('js')

@endsection
