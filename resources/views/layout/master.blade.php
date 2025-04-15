<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - Cửa hàng bánh</title>
    <link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/responsive.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('source/assets/dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('source/assets/dest/css/huong-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
 <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    @yield('css')
</head>
<body>
    @include('layout.header')
    @include('layout.slide') 
    @yield('content')
    @include('layout.footer')
<!-- Include JS files -->
 <!-- Bootstrap JS (v5) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('source/assets/dest/js/jquery.js') }}"></script>
<script src="{{ asset('source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="{{ asset('source/assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('source/assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
<script src="{{ asset('source/assets/dest/vendors/animo/Animo.js') }}"></script>
<script src="{{ asset('source/assets/dest/vendors/dug/dug.js') }}"></script>
<script src="{{ asset('source/assets/dest/js/scripts.min.js') }}"></script>
<script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('source/assets/dest/js/waypoints.min.js') }}"></script>
<script src="{{ asset('source/assets/dest/js/wow.min.js') }}"></script>
<script src="{{ asset('source/assets/dest/js/custom2.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/67fcb967e6ecad190d7cb6cb/1iopj8g11';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script>
    
    $(document).ready(function($) {
        $(window).scroll(function() {
            if($(this).scrollTop() > 150){
                $(".header-bottom").addClass('fixNav');
            } else {
                $(".header-bottom").removeClass('fixNav');
            }
        });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const loginButtons = document.querySelectorAll('.require-login');
    const loginCartButtons = document.querySelectorAll('.require-login-cart');

    loginButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            alert('⚠️ Bạn cần đăng nhập để sử dụng chức năng này.');
        });
    });

    loginCartButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            alert('🛑 Bạn cần đăng nhập để xem giỏ hàng.');
        });
    });
});
</script>

@yield('js')
</body>
</html>