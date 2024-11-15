@extends('admins.layouts.admin')

@section('title')
    Trang quản trị
@endsection

@section('css')

@endsection

@section('content')

<h1 class="mb-4">Thêm Danh Mục</h1>

<form action="{{ route('admins.news_categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Tên Danh Mục</label>
        <input type="text" name="name" id="name" class="form-control" >
        @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    <a href="{{ route('admins.news_categories.index') }}" class="btn btn-primary ">Quay lại</a>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection

@section('js')

@endsection
