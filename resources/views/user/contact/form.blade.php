@extends('layout.master')

@section('content')
<Style>
    /* Tổng thể body */
body {
    font-family: 'Arial', sans-serif;
    color: #333;
    background-color: #f9f9f9;
}


/* Tiêu đề trang */
h1, h2, h3, h4 {
    font-family: 'Roboto', sans-serif;
    color: #222;
}

/* Hiệu ứng hover cho button */
.btn-primary {
    background-color: #0f2027;
    border-color: #0f2027;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #203a43;
    border-color: #203a43;
}

/* Card form liên hệ */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
}

/* Các ô nhập liệu trong form */
.form-control {
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #0f2027;
}

/* Hover effect trên câu hỏi thường gặp */
.accordion-button {
    background-color: #fff;
    color: #0f2027;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.accordion-button:hover {
    background-color: #f8f9fa;
}

.accordion-button:not(.collapsed) {
    background-color: #f8f9fa;
    color: #203a43;
}

/* Bảng điều hướng Social Media */
.social-links a {
    color: #fff;
    font-size: 20px;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #0f2027;
}

/* Footer - Hotline */
footer p {
    color: #fff;
    font-size: 1.2rem;
}

footer .btn-footer {
    background-color: #203a43;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

footer .btn-footer:hover {
    background-color: #0f2027;
}

</Style>
<!-- Banner mở đầu -->
<section class="py-5 text-white text-center" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
    <div class="container">
        <h1 class="display-5 fw-bold">Liên hệ với AutoZone</h1>
        <p class="lead" style="color: white;">Đừng ngần ngại, chúng tôi ở đây để đồng hành cùng bạn!</p>

    </div>
</section>

<!-- Thông tin liên hệ -->
<section class="py-5 bg-dark">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-md-4" data-aos="fade-up">
                <i class="fas fa-map-marker-alt fa-2x mb-2 text-primary"></i>
                <h5 class="fw-bold">Địa chỉ</h5>
                <p>123 Đường Lái Xe, Quận Auto, TP.HCM</p>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-phone fa-2x mb-2 text-primary"></i>
                <h5 class="fw-bold">Hotline</h5>
                <p>1900 9999 | 0988 888 888</p>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-envelope fa-2x mb-2 text-primary"></i>
                <h5 class="fw-bold">Email</h5>
                <p>support@autozone.vn</p>
            </div>
        </div>
    </div>
</section>

<!-- Form liên hệ -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" data-aos="fade-up">
                @if(session('success'))
                    <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
                @endif

                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-4">
                        <h4 class="text-center text-primary mb-4">📨 Gửi tin nhắn cho chúng tôi</h4>

                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">👤 Họ và tên</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', Auth::user()->name ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">📧 Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', Auth::user()->email ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">💬 Nội dung liên hệ</label>
                                <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Gửi ngay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-4">⏱ Thời gian phản hồi từ 9h đến 18h mỗi ngày làm việc.</p>
            </div>
        </div>
    </div>
</section>

<!-- Bản đồ Google Maps -->
<section class="bg-light py-5">
    <div class="container">
        <h4 class="text-center mb-4 text-dark fw-bold" data-aos="fade-down">📍 Showroom AutoZone</h4>
        <div class="ratio ratio-16x9 shadow rounded" data-aos="zoom-in">
            <iframe src="https://www.google.com/maps/embed?pb=..." allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>


<!-- Social + Hotline -->
<section class="bg-dark text-white py-4">
    <div class="container text-center">
        <p class="mb-2">Kết nối với AutoZone:</p>
        <a href="#" class="text-white mx-2"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="#" class="text-white mx-2"><i class="fab fa-youtube fa-lg"></i></a>
        <a href="#" class="text-white mx-2"><i class="fab fa-tiktok fa-lg"></i></a>
        <p class="mt-3">📞 Hotline 24/7: <strong>1900 9999</strong></p>
    </div>
</section>
<Script>
    // Chạy AOS (Animation on Scroll)
AOS.init({
    duration: 1200,
    easing: 'ease-in-out',
    once: true
});

// Hiệu ứng show/hide khi gửi form thành công
$(document).ready(function() {
    // Flash success message
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
    
    // Hiệu ứng nút Gửi liên hệ
    $('form').submit(function(e) {
        var button = $(this).find('button');
        button.html('<i class="fas fa-spinner fa-spin"></i> Đang gửi...');
    });
});

// Bản đồ Google Maps (Zoom In/Out)
// Giả sử bạn đã có iframe trong trang để hiển thị bản đồ Google
function initializeMap() {
    var mapOptions = {
        center: new google.maps.LatLng(10.8231, 106.6297), // Lat, Long của TP.HCM
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}

google.maps.event.addDomListener(window, 'load', initializeMap);

</Script>
@endsection

@section('css')
<!-- Thêm Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Thêm AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- Thêm AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>


@endsection