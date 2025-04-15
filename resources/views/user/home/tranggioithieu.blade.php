@extends('layout.master')

@section('content')
<style>
    .hero-title {
    font-size: 3rem;
    font-weight: 700;
    text-transform: uppercase;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: #dddddd;
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
}

.section-description {
    font-size: 1.1rem;
    color: #555;
}

.value-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #fff;
}

.value-text {
    color: #cccccc;
}

.text-accent {
    color: #ffc107;
}

.testimonial-card p {
    font-style: italic;
    color: #444;
}

.cta-title {
    font-size: 1.8rem;
    font-weight: bold;
}

</style>
<!-- Hero Section -->
<section class="hero-section text-white text-center" style="background: url('{{ asset('images/hero-car.jpg') }}') center center / cover no-repeat;">
    <div class="container" data-aos="fade-up">
        <h1 class="hero-title text-accent">Weboto.VN - Khơi nguồn đam mê tốc độ</h1>
        <p class="hero-subtitle">Chuyên cung cấp các dòng xe sang - siêu xe - xe thể thao</p>
    </div>
</section>

<!-- About Us -->
<section class="about-section bg-light text-dark py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4" data-aos="fade-right">
                <img src="{{ asset('images/showroom.jpg') }}" alt="Showroom Weboto.VN" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h2 class="section-title text-uppercase mb-4">Chúng tôi là Weboto.VN</h2>
                <p class="section-description">Với hơn 10 năm trong ngành, Weboto.VN là địa chỉ tin cậy của hàng ngàn khách hàng yêu xe trên khắp Việt Nam. Chúng tôi cung cấp đa dạng dòng xe từ sedan, SUV đến siêu xe thể thao từ các thương hiệu hàng đầu như Ferrari, Porsche, Mercedes, Toyota, BMW và nhiều hãng khác.</p>
                <p class="section-description">Tầm nhìn của chúng tôi là trở thành hệ thống showroom ô tô hiện đại, chuyên nghiệp và đẳng cấp nhất tại Đông Nam Á.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="values-section bg-dark text-white py-5">
    <div class="container">
        <h2 class="section-title text-center text-accent mb-5" data-aos="zoom-in">Giá trị cốt lõi</h2>
        <div class="row text-center">
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-bolt fa-3x text-accent mb-3"></i>
                <h5 class="value-title">Tốc độ</h5>
                <p class="value-text">Giao xe nhanh chóng, xử lý thủ tục trong ngày.</p>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-shield-alt fa-3x text-accent mb-3"></i>
                <h5 class="value-title">Uy tín</h5>
                <p class="value-text">Bảo hành chính hãng, hợp đồng minh bạch, rõ ràng.</p>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-headset fa-3x text-accent mb-3"></i>
                <h5 class="value-title">Hỗ trợ 24/7</h5>
                <p class="value-text">Luôn đồng hành cùng khách hàng mọi lúc, mọi nơi.</p>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <i class="fas fa-certificate fa-3x text-accent mb-3"></i>
                <h5 class="value-title">Chất lượng</h5>
                <p class="value-text">Tất cả xe đều được kiểm định nghiêm ngặt trước khi bàn giao.</p>
            </div>
        </div>
    </div>
</section>


<!-- Testimonials -->
<!-- Services Section -->
<section class="services-section bg-light py-5">
    <div class="container">
        <h2 class="section-title text-center text-dark mb-5" data-aos="fade-up">Dịch vụ nổi bật tại Weboto.VN</h2>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card bg-white shadow-sm rounded p-4 text-center h-100">
                    <i class="fas fa-truck fa-3x text-accent mb-3"></i>
                    <h5 class="mb-2">Giao xe tận nhà</h5>
                    <p>Chúng tôi giao xe tận nơi trên toàn quốc, đảm bảo đúng hẹn và an toàn tuyệt đối.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card bg-white shadow-sm rounded p-4 text-center h-100">
                    <i class="fas fa-handshake fa-3x text-accent mb-3"></i>
                    <h5 class="mb-2">Tư vấn tài chính</h5>
                    <p>Hỗ trợ vay mua xe trả góp với lãi suất cạnh tranh, thủ tục nhanh chóng, dễ dàng.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card bg-white shadow-sm rounded p-4 text-center h-100">
                    <i class="fas fa-tools fa-3x text-accent mb-3"></i>
                    <h5 class="mb-2">Bảo dưỡng & bảo hành</h5>
                    <p>Dịch vụ hậu mãi uy tín, bảo hành chính hãng, hỗ trợ kỹ thuật 24/7 trên toàn quốc.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="bg-dark text-white py-5">
    <div class="container">
        <h2 class="text-uppercase font-weight-bold text-center mb-5 text-warning" data-aos="fade-up">Tại sao chọn Weboto.VN?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-car fa-3x mb-3 text-warning"></i>
                <h5 class="font-weight-bold text-white">Hơn 100+ mẫu xe</h5>
                <p style="color: #ccc;">Đủ chủng loại từ sedan, SUV đến siêu xe thể thao...</p>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-cogs fa-3x mb-3 text-warning"></i>
                <h5 class="font-weight-bold">Bảo hành & hậu mãi</h5>
                <p>Dịch vụ hậu mãi chuyên nghiệp, phụ tùng chính hãng, kỹ thuật viên giàu kinh nghiệm.</p>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-thumbs-up fa-3x mb-3 text-warning"></i>
                <h5 class="font-weight-bold">Uy tín & minh bạch</h5>
                <p>Giá cả rõ ràng, quy trình minh bạch, hỗ trợ trả góp và giao xe tận nơi.</p>
            </div>
        </div>
    </div>
</section>
<!-- Vision & Mission Section -->
<section class="py-5 bg-white text-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0" data-aos="zoom-in">
                <img src="{{ asset('images/vision.jpg') }}" alt="Tầm nhìn Weboto.VN" class="img-fluid rounded shadow-lg">
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h2 class="text-uppercase font-weight-bold mb-4" style="color: #0d1b2a;">Tầm nhìn & Sứ mệnh</h2>
                <p class="mb-3" style="color: #444;">Chúng tôi không chỉ bán xe – chúng tôi kiến tạo trải nghiệm lái xe đẳng cấp cho mọi khách hàng tại Việt Nam.</p>
                <p style="color: #444;">Với tầm nhìn trở thành thương hiệu tiên phong trong ngành công nghiệp ô tô, Weboto.VN luôn đặt khách hàng làm trung tâm, đổi mới công nghệ và dẫn đầu xu hướng.</p>
                <ul class="mt-3 list-unstyled">
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Cung cấp sản phẩm chất lượng, rõ nguồn gốc</li>
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Hỗ trợ tài chính minh bạch, nhanh chóng</li>
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Dịch vụ hậu mãi tận tâm, chuyên nghiệp</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Contact -->
<section class="cta-section bg-dark text-white py-5 text-center" data-aos="zoom-in">
    <div class="container">
        <h2 class="cta-title text-uppercase mb-3 text-accent">Bạn đã sẵn sàng sở hữu chiếc xe mơ ước?</h2>
        <p class="mb-4">Liên hệ ngay với chúng tôi để được tư vấn & lái thử miễn phí.</p>
        <a href="https://m.me/100054648755771" target="_blank" class="btn btn-warning btn-lg text-uppercase"><i class="fab fa-facebook-messenger"></i>Liên hệ ngay</a>
    </div>
</section>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
@endsection
@section('css')
 <!-- Bootstrap + FontAwesome -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"
@endsection