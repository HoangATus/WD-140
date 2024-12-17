@extends('clients.layouts.client')

@section('content')

<div class="about-container">
    <div class="banner">
        <h1>Chào mừng đến với ATUS</h1>
        <p>Nơi mang đến cho bạn những bộ quần áo thời trang và phong cách.</p>
    </div>

    <div class="about-content">
        <h2>Về Chúng Tôi</h2>
        <p>
            ATUS là một thương hiệu thời trang nam dẫn đầu xu hướng, mang đến sự kết hợp hoàn hảo giữa phong cách hiện đại và chất lượng vượt trội. Chúng tôi hiểu rằng thời trang không chỉ là trang phục mà còn là cách bạn thể hiện bản thân và cá tính. Chính vì thế, mỗi sản phẩm của ATUS đều được thiết kế tỉ mỉ, từ áo thun, áo khoác, quần shorts đến các phụ kiện độc đáo, giúp bạn tự tin tỏa sáng trong mọi khoảnh khắc.
             Đội ngũ ATUS luôn đặt sự hài lòng của khách hàng lên hàng đầu, cam kết mang đến trải nghiệm mua sắm dễ dàng, nhanh chóng và đáng nhớ.
        </p>
        <h2>Tầm Nhìn</h2>
        <p>
            Trở thành thương hiệu thời trang được yêu thích nhất tại Việt Nam, với các sản phẩm sáng tạo và bền vững. Website ATUS là cầu nối giữa khách hàng và các sản phẩm thời trang nam cao cấp. Chúng tôi không ngừng đổi mới để trở thành lựa chọn hàng đầu cho nam giới yêu thích sự lịch lãm, năng động và cá tính. Với tầm nhìn hướng tới tương lai, ATUS không chỉ chú trọng vào việc nâng cao chất lượng sản phẩm mà còn quan tâm đến yếu tố bền vững trong sản xuất. Chúng tôi mong muốn xây dựng một thương hiệu mà mọi khách hàng đều cảm nhận được giá trị thật sự, từ chất liệu an toàn, thân thiện với môi trường đến dịch vụ tận tâm.
             ATUS kỳ vọng trở thành biểu tượng của phong cách sống hiện đại và sự tinh tế trong từng chi tiết.
        </p>
    </div>

    <div class="team-section">
        <h2>Đội Ngũ ATUS</h2>
        <div class="team-members">
            <div class="member">
                <img src="{{ asset('assets/clients/images/CEO.jpg') }}" alt="CEO">
                <h3>Hoàng Thanh Tú</h3>
                <p>Trưởng nhóm</p>
            </div>
            <div class="member">
                <img src="{{ asset('assets/clients/images/dat.jpg') }}" alt="CEO">
                <h3>Nguyễn Quang Đạt</h3>
                <p>Thành viên</p>
            </div>
            <div class="member">
                <img src="{{ asset('assets/clients/images/do.png') }}" alt="CEO">
                <h3>Lê Quang Đô</h3>
                <p>Thành viên</p>
            </div>
            <div class="member">
                <img src="{{ asset('assets/clients/images/kien.jpg') }}" alt="CEO">
                <h3>Nguyễn Trung Kiên</h3>
                <p>Thành viên</p>
            </div>
            <div class="member">
                <img src="{{ asset('assets/clients/images/son.jpg') }}" alt="CEO">
                <h3>Nguyễn Nhất Sơn</h3>
                <p>Thành viên</p>
            </div>
            <div class="member">
                <img src="{{ asset('assets/clients/images/thuan.jpg') }}" alt="CEO">
                <h3>Trần Văn Thuần</h3>
                <p>Thành viên</p>
            </div>
            <div class="member">
                <img src="{{ asset('assets/clients/images/tho.jpg') }}" alt="CEO">
                <h3>Phạm Quang Thọ</h3>
                <p>Thành viên</p>
            </div>
        </div>
    </div>
</div>

<style>
    .about-container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }
    .banner {
        text-align: center;
        background: #f4f4f4;
        padding: 40px;
        margin-bottom: 20px;
    }
    .banner h1 {
        font-size: 2.5em;
        color: #333;
    }
    .banner p {
        color: #555;
    }
    .about-content h2 {
        color: #007bff;
        margin-top: 20px;
    }
    .about-content p {
        color: #666;
        line-height: 1.6;
    }
    .team-section {
        margin-top: 30px;
    }
    .team-members {
        display: flex;
        justify-content: space-around;
    }
    .member {
        text-align: center;
        margin: 10px;
    }
    .member img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    .member h3 {
        color: #333;
    }
    .member p {
        color: #666;
    }
</style>
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

