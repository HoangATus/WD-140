@extends('admins.layouts.admin')

@section('title')
    Quản lý Tài khoản
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Tài khoản</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables: </a></li>
                        <li >Danh sách Tài khoản</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>
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
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr align="center">
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->user_name }}</td>

                            <td>{{ $user->user_email }}</td>
                            <td>{{ $user->user_phone_number }}</td>
                            <td>
                                <span class="badge bg-primary">{{ $user->role }}</span>
                            </td>
                            <td>
                              
                                @if ($user->is_banned)
                                    @if ($user->banned_until)
                                        <span class="badge bg-danger">Bị cấm đến {{ \Carbon\Carbon::parse($user->banned_until)->format('d/m/Y H:i') }}</span>
                                    @else
                                        <span class="badge bg-danger">Bị cấm </span>
                                    @endif
                                @else
                                    <span class="badge bg-success">Hoạt động</span>
                                @endif
                            </td>
                            
                            
                            <td>
                                <a href="{{ route('admins.users.show', $user) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
            @if ($user->role !== 'Admin')
                                
                                @if (!$user->is_banned)
                                    <form action="{{ route('admins.users.ban', $user) }}" method="POST" class="d-inline"onsubmit="return confirm('Bạn có chắc muốn cấm tài khoản này không?');">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">Cấm</button>
                                    </form>
                                @else
                                    <form action="{{ route('admins.users.unban', $user) }}" method="POST" class="d-inline"onsubmit="return confirm('Bạn có chắc muốn gỡ cấm tài khoản này không?');">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Gỡ cấm</button>
                                    </form>
                                @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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


