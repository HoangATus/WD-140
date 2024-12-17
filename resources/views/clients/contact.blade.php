@extends('clients.layouts.client')

@section('content')

<div class="container mt-5">
    <h2 class="text-center">Liên hệ với chúng tôi</h2><br>
    
    <form action="{{ route('contact.send') }}" method="POST"class="mx-auto" style="max-width: 800px;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập họ và tên">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"placeholder="Nhập email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Ghi chú</label>
            <textarea class="form-control form-control-sm @error('message') is-invalid @enderror" id="message" name="message" rows="5">{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>  
            @enderror
        </div>
        <button type="submit" class="btn btn-primary no-hover">Gửi</button>

    </form>
</div>
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6752f2c24304e3196aed5b3c/1iee08htm';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
@endsection

