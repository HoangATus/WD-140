@extends('admins.layouts.admin')

@section('title')
    Quản lý đơn hàng
@endsection

@section('content')
    <div class="row">
        <h2>Sửa Voucher: {{ $voucher->code }}</h2>
        <form action="{{ route('admins.vouchers.update', $voucher->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Sử dụng PUT để cập nhật -->

            <div class="form-group">
                <label>Mã Voucher</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', $voucher->code) }}" required disabled>
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>% Giảm Giá</label>
                <input type="number" name="discount_percent" class="form-control"
                    value="{{ old('discount_percent', $voucher->discount_percent) }}" required disabled>
                @error('discount_percent')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Số Tiền Giảm Tối Đa</label>
                <input type="number" name="max_discount_amount" class="form-control"
                    value="{{ old('max_discount_amount', $voucher->max_discount_amount) }}" disabled>
            </div>

            <div class="form-group">
                <label>Ngày Bắt Đầu</label>
                <input type="date" name="start_date" class="form-control"
                    value="{{ old('start_date', $voucher->start_date ? \Carbon\Carbon::parse($voucher->start_date)->format('Y-m-d') : '') }}"
                    required disabled>

                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Ngày Kết Thúc</label>
                <input type="date" name="end_date" class="form-control" 
                    value="{{ old('end_date', $voucher->end_date ?  \Carbon\Carbon::parse($voucher->end_date)->format('Y-m-d') : '') }}" 
                    required disabled>
                @error('end_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Trạng Thái Hoạt Động</label>
                <select name="is_active" class="form-control" disabled>
                    <option value="1" {{ old('is_active', $voucher->is_active ?? 1) == 1 ? 'selected' : '' }}>Hoạt Động</option>
                    <option value="0" {{ old('is_active', $voucher->is_active ?? 1) == 0 ? 'selected' : '' }}>Không Hoạt Động</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Công Khai</label>
                <select name="is_public" class="form-control" disabled>
                    <option value="1" {{ $voucher->is_public ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ !$voucher->is_public ? 'selected' : '' }}>Không</option>
                </select>
            </div>

            <div class="form-group">
                <label>Khách Hàng Được Sử Dụng (Nếu Không Công Khai)</label>
                <select name="user_ids[]" class="form-control" multiple disabled>
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}" {{ $voucher->users->contains($user->user_id) ? 'selected' : '' }}>
                            {{ $user->user_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            
            <a href="{{ route('admins.vouchers.index') }}" class="btn btn-secondary">Qyay Lại</a>
        </form>
    @endsection
