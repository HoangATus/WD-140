@extends('admins.layouts.admin')

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
                <div class="col-xxl-8 col-lg-10 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Thêm Mới Màu Sắc</h5>
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

                        <form action="{{ route('admins.colors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">
                                    Tên Màu Sắc</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" placeholder="Tên màu" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Số Lượng
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" name="quantity" placeholder="Số lượng" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row align-items-start">
                                <!-- <label class="col-sm-3 col-form-label form-label-title">Attribute
                                        Value</label> -->
                                <div class="col-sm-9">
                                    <div class="row g-sm-4 g-3">
                                        <!-- <div class="col-sm-10 col-9">
                                                <input class="form-control" type="text"
                                                    placeholder="Attribute Value">
                                            </div> -->

                                        <!-- <div class="col-sm-2 col-3">
                                                <button
                                                    class="btn text-danger h-100 w-100">Remove</button>
                                            </div> -->

                                        <!-- <div class="col-xxl-4">
                                                <button class="btn text-white theme-bg-color">Add
                                                    Value</button>
                                            </div> -->
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-success">Thêm mới</button>
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