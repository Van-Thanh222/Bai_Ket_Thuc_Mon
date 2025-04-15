@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
<div class="container">
    <h2>Thêm Thương hiệu mới</h2>

    <form action="{{ route('trademark.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name">Tên thương hiệu:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="avatar">Ảnh đại diện:</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <div class="mb-3">
            <label for="describe">Mô tả:</label>
            <textarea name="describe" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('trademark.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div></div>
@endsection
