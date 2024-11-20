@extends('admins.layouts.admin')

@section('title')
    Sửa Category
@endsection

@section('content')

<h1 class="mb-4">Sửa Danh Mục</h1>

<form action="{{ route('admins.news_categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Tên Danh Mục</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" >
        @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    <a href="{{ route('admins.news_categories.index') }}" class="btn btn-primary ">Quay lại</a>

    <button type="submit" class="btn btn-primary">Cập Nhật</button>
</form>


@endsection
