@extends('admins.layouts.admin')

@section('title')
Trang quản trị
@endsection

@section('css')

@endsection
@section('content')

<h1>Quản lí bình luận</h1>
@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

<table id="example"
    class="table table-bordered dt-responsive nowrap -5"
    style="width:100%">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>sản phẩm</th>
            <th>Tên người dùng</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->product->product_name }}</td>
            <td>{{ $comment->user->user_name }}</td>
            <td>{{ $comment->comment }}</td>
            <td>{{ $comment->created_at->format('d/m/Y') }}</td>
            <td>
                @if($comment->is_approved)
                <span style="color: green;">Đã phê duyệt</span>
                @else
                <span style="color: red;">Chưa phê duyệt</span>
                @endif
            </td>
            <td>
                @if(!$comment->is_approved)
                <form action="{{ route('admins.comments.is_approve', $comment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 5px 10px; border-radius: 5px;" onclick="return confirm('Bạn có chắc muốn phê duyệt?')">
                        Phê duyệt
                    </button>
                </form>
                @else
                <form action="{{ route('admins.comments.cancel_approve', $comment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 5px;" onclick="return confirm('Bạn có chắc muốn hủy phê duyệt?')">
                        Hủy phê duyệt
                    </button>
                </form>
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection


@section('js')
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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