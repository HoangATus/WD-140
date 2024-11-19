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
            <p><strong>View:</strong>  Đã xem:{{ $news->view_count }}
            </p>
            <p><strong>Ảnh:</strong>                 
                <img src="{{ Storage::url($news->image) }}" alt="Ảnh tin tức" style="max-width: 100%; height: auto; max-height: 200px;">
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


                        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách Bình luận</h5>
                    @if (session('success'))
                    <div class="alert alert-danger mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">

                        
                <thead class="table-secondary">
                    <tr align="center">
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Nội dung bình luận</th>
                        <th scope="col">Ngày bình luận</th>
                       <th scope="col"> Số Bình luận:</th> 
                       
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news->comments as $comment)

                        <tr align="center">
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->user->user_name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td> Bình luận:{{$commentCount}}</td>

                            <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                {!!$comment->approved
                                    ? '<span class="badge bg-success text-white">Đã phê duyệt</span>'
                                    : '<span class="badge bg-danger text-white">Chưa phê duyệt</span>' !!}
                            </td>
                          
                            <td>
                               
                                @if(!$comment->approved)
                                    <form action="{{ route('admins.news.comments.approve', $comment->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Phê duyệt</button>
                                    </form>
                                @else
                                    <form action="{{ route('admins.news.comments.unapprove', $comment->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Hủy phê duyệt</button>
                                    </form>
                                @endif
                            </td>
                            
                            
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
                        
                 
        </div>
    </div>

    <a href="{{ route('admins.news.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ]
        });
    </script>
@endsection
