@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Thêm người dùng</h2>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Họ tên:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mật khẩu:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Số điện thoại:</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Vai trò:</label>
            <select name="role" class="form-control">
                <option value="user">Người dùng</option>
                <option value="admin">Quản trị</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Địa chỉ:</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="mb-3">
            <label>Avatar:</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <button class="btn btn-primary">Thêm</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
