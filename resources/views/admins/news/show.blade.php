@extends('admins.layouts.admin')

@section('title', 'Chi tiết Tin Tức')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Chi tiết Tin Tức</h2>

    <div class="card mb-3">
        <div class="card-header">
            <strong>Thông tin tin tức</strong>
        </div>
        <div class="card-body">
            <p><strong>Tiêu đề:</strong> {{ $news->title }}</p>
            <p><strong>Danh mục:</strong> {{ $news->category->name ?? 'Không xác định' }}</p>
            <p><strong>Slug:</strong> {{ $news->slug }}</p>
            <p><strong>Ảnh:</strong>                 <img src="{{ Storage::url($news->image) }}" alt="Ảnh tin tức" style="max-width: 100%; height: auto; max-height: 200px;">
            </p>
            <p><strong>Trạng thái:</strong> 
                <span class="badge {{ $news->status ? 'bg-success' : 'bg-danger' }}">
                    {{ $news->status ? 'Hoạt động' : 'Không hoạt động' }}
                </span>
            </p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <strong>Nội dung</strong>
        </div>
        <div class="card-body">
            <textarea class="form-control" rows="10" disabled>{{ $news->content }}</textarea>
        </div>
    </div>

  

    <a href="{{ route('admins.news.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection
