<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .voucher-icon {
            width: 70px;
            height: 70px;
            margin-right: 12px;
        }
    </style>

    <div class="container mt-5">

        <div class="card shadow-lg" style="max-width: 700px; margin: auto;">

            <div class="card-header bg-warning text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/clients/images/voucher1.png') }}" alt="Voucher Icon"
                            class="voucher-icon">

                            <div>
                                <span class="fw-bold">Mã: {{ $voucher->code }}</span>
                                
                                @if($voucher->discount_type === 'percent')
                                    <p class="mb-0">
                                        Giảm {{ $voucher->discount_percent }}% - Giảm tối đa {{ number_format($voucher->max_discount_amount, 0, ',', '.') }}₫<br>
                                        Đơn tối thiểu: {{ number_format($voucher->min_order_amount, 0, ',', '.') }}₫
                                    </p>
                                @elseif($voucher->discount_type === 'fixed')
                                    <p class="mb-0">
                                        Giảm {{ number_format($voucher->discount_value, 0, ',', '.') }}₫<br>
                                        Đơn tối thiểu: {{ number_format($voucher->min_order_amount, 0, ',', '.') }}₫
                                    </p>
                                @endif
                            </div>
                            
                    </div>
                    <div>
                        <span class="badge bg-danger mb-2">Dành riêng cho bạn</span>
                        @php
                            use Carbon\Carbon;
                            $currentDate = Carbon::now();
                            $endDate = Carbon::parse($voucher->end_date);
                            $daysRemaining = $currentDate->diffInDays($endDate, false); 
                        @endphp
                        @if ($daysRemaining > 0 && $daysRemaining <= 50)
                            <p class="text-muted mb-0">Sắp hết hạn: Còn {{ $daysRemaining }} ngày</p>
                        @elseif ($daysRemaining > 0 && $daysRemaining <= 5)
                            <p class=" mb-0 text-danger">Sắp hết hạn: Còn {{ $daysRemaining }} ngày</p>
                        @elseif ($daysRemaining == 0)
                            <p class=" mb-0 text-danger">Sắp hết hạn: Còn ít hơn 1 ngày</p>
                        @elseif ($daysRemaining < 0)
                            <p class=" mb-0 text-bg-danger">Voucher này đã hết hạn</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">


                    <li>
                        <strong>Hạn sử dụng mã</strong><br>
                        {{ \Carbon\Carbon::parse($voucher->start_date)->format('d/m/Y') }} 00:00 -
                        {{ \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') }} 23:58
                    </li>



                    <hr>
                    <li><strong>Ưu đãi</strong><br><a href="{{ url('/products') }}">Mua sắm ngay tại đây</a></li>
                    <hr>
                    <li><strong>Thanh Toán</strong><br>Tất cả các hình thức thanh toán</li>
                    <hr>
                    <li><strong>Thiết bị</strong><br>iOS, Android</li>
                    <hr>
                    <li><strong>Xem chi tiết</strong><br>
                        Sử dụng mã giảm phí vận chuyển và thỏa điều kiện ưu đãi khi mua hàng trên Shopee:<br>
                        - Giảm tối đa ₫300K cho đơn hàng từ ₫100K.<br>
                        Chỉ áp dụng cho một số người bán tham gia chương trình Freeship Xtra, Freeship Xtra Plus.<br>
                        Đơn vị vận chuyển khả dụng: Nhanh, Hàng cồng kềnh và Quốc Tế.<br>
                        Chỉ áp dụng cho một số người dùng nhất định.<br>
                        Mã chỉ được hoàn theo quy định của Shopee.<br>
                        Số lượt sử dụng có hạn, chương trình và mã có thể kết thúc khi hết lượt ưu đãi hoặc khi hết hạn
                        ưu đãi, tùy điều kiện nào đến trước.
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-danger w-100" id="confirmVoucherBtn" data-voucher-id="{{ $voucher->id }}">Đồng Ý</button>

            </div>
        </div>
    </div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const confirmBtn = document.getElementById('confirmVoucherBtn');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function () {
            const voucherId = this.getAttribute('data-voucher-id');
            localStorage.setItem('selectedVoucher', voucherId);
            window.history.back();
        });
    }

    const selectedVoucherId = localStorage.getItem('selectedVoucher');
    if (selectedVoucherId) {
        const checkbox = document.getElementById(`voucher${selectedVoucherId}`);
        if (checkbox) {
            checkbox.checked = true;
            localStorage.removeItem('selectedVoucher');
        }
    }
});


</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
