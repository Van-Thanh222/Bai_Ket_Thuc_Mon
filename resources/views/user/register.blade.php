<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-5/assets/css/registration-5.css">
</head>
<body>
    <!-- Registration 5 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6 text-bg-primary">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="col-10 col-xl-8 py-3">
              <hr class="border-primary-subtle mb-4">
              <h2 class="h1 mb-4">We make digital products that drive you to stand out.</h2>
              <p class="lead m-0">We write words, take photos, make videos, and interact with artificial intelligence.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h2 class="h3">Registration</h2>
                  <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                </div>
              </div>
              

            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </ul>
    </div>
@endif
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="row gy-3 gy-md-4 overflow-hidden">

        <div class="col-12">
            <label class="form-label">Họ tên <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="Họ tên" required value="{{ old('name') }}">
        </div>

        <div class="col-12">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" placeholder="name@example.com" required value="{{ old('email') }}">
        </div>

        <div class="col-12">
            <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="col-12">
            <label class="form-label">Nhập lại mật khẩu <span class="text-danger">*</span></label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="col-12">
            <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required value="{{ old('phone') }}">
        </div>

        <div class="col-12">
            <label class="form-label">Địa chỉ <span class="text-danger">*</span></label>
            <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required value="{{ old('address') }}">
        </div>

        <div class="col-12">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" name="avatar" class="form-control" accept="image/*">
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" required>
                <label class="form-check-label">
                    Tôi đồng ý với <a href="#">điều khoản</a>
                </label>
            </div>
        </div>

        <div class="col-12">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Đăng ký</button>
            </div>
        </div>
    </div>
</form>

            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <p class="m-0 text-secondary text-center">Already have an account? <a href="{{ route('login.form') }}" class="link-primary text-decoration-none">Sign in</a></p>
              </div>
            </div>
            
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
</body>
</html>