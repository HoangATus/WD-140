@extends('admins.layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Chi tiết người dùng: {{ $user->user_name }}</h1>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Thông tin người dùng</h2>
                <p><strong>Tên:</strong> {{ $user->user_name }}</p>
                <p><strong>Email:</strong> {{ $user->user_email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $user->user_phone_number }}</p>
                <p><strong>Vai trò:</strong> <span class="badge bg-primary">{{ $user->role }}</span></p>
                <p><strong>Trạng thái:</strong>
                 @if ($user->is_banned)
                        <span class="badge bg-danger">Bị cấm</span>
                    @else
                        <span class="badge bg-success">Hoạt động</span>
                    @endif
                </p>

                @if ($user->is_banned)
                    <p><strong>Bị cấm đến:</strong>
                        @if ($user->banned_until)
                            <span class="badge bg-danger">
                                {{ \Carbon\Carbon::parse($user->banned_until)->format('d/m/Y H:i') }}
                            </span>
                        @else
                            Vĩnh viễn
                        @endif
                    </p>
                @endif


                <a href="{{ route('admins.users.index') }}" class="btn btn-primary mt-3">Trở lại danh sách người dùng</a>

            </div>
            @if ($user->role !== 'Admin' && !$user->is_banned)
            <div class="m-3">
                <form action="{{ route('admins.users.ban', $user) }}" method="POST" id="banForm">
                    @csrf
                    <div class="mb-3">
                        <label for="banned_until" class="form-label">Cấm đến ngày:</label>
                        <input type="date" name="banned_until" class="form-control" id="bannedUntil">
                        <span id="error-message" class="text-danger"></span> <!-- Thông báo lỗi -->
                    </div>
                    <button type="submit" class="btn btn-warning">Cấm người dùng</button>
                </form>
            </div>
        @endif
        
        <script>
            document.getElementById('banForm').onsubmit = function (e) {
    const bannedUntil = document.getElementById('bannedUntil').value;
    const errorMessage = document.getElementById('error-message');
    const today = new Date().toISOString().split('T')[0]; 
    errorMessage.textContent = '';
    if (!bannedUntil) {
        e.preventDefault(); 
        errorMessage.textContent = 'Vui lòng chọn ngày cấm.';
        return false;
    }

    if (bannedUntil < today) {
        e.preventDefault(); 
        errorMessage.textContent = 'Ngày cấm phải lớn hơn hoặc bằng ngày hiện tại.';
        return false;
    }
    return confirm('Bạn có chắc muốn cấm tài khoản này đến ngày đã chọn?');
};

        </script>
        </div>
    @endsection
