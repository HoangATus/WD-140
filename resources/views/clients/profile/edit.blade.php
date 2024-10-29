@extends('clients.layouts.client')

@section('content')
<h2>Chỉnh sửa thông tin cá nhân</h2>
  <div class="container">
    <form action="{{ route('clients.profile.update', $profile->user_id) }}" method="POST" enctype="multipart/form-data">
       
        @csrf
        @method('PUT')
        <div class="pt-2">
            <label for="profile_name">Tên:</label>
            <input type="text" class="form-control" name="user_name" value="{{ $profile->user_name }}">
        </div>
    
        <div class="pt-2">
            <label for="profile_phone_number">Số điện thoại::</label>
            <input type="text" class="form-control" name="user_phone_number" value="{{ $profile->user_phone_number }}">
        </div>
    
        <div class="pt-2">
            <label for="profile_email">Email:</label>
            <input type="text" class="form-control" name="user_email" value="{{ $profile->user_email }}">
        </div>
    
        <div class="pt-2">
            <label for="profile_address">Địa chỉ::</label>
            <input type="text" class="form-control" name="user_address" value="{{ $profile->user_address }}">
        </div>
    
        <div class="d-flex justify-content-end pt-3" style="padding: 10px">
                <button type="submit" class=""
                style="border-radius: 6px; width: 60px; background-color: #0e947a; padding: 10px; color: white; border: none;">Sửa</button>
    
        </div>
    </form>
  </div>
@endsection
