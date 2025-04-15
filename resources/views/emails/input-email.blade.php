<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h4 class="text-center mb-4">Khôi phục mật khẩu</h4>

            @if (session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif

            <form action="{{ route('postInputEmail') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="txtPhone" class="form-label">Số điện thoại</label>
                    <input type="text" name="txtPhone" id="txtPhone" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Gửi mật khẩu mới</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
