@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
<div class="container">
    <h2>Sửa Thương hiệu</h2>

    <form action="{{ route('trademark.update', $trademark->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name">Tên thương hiệu:</label>
            <input type="text" name="name" value="{{ $trademark->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="avatar">Ảnh đại diện hiện tại:</label><br>
            @if($trademark->avatar)
                <img src="{{ asset($trademark->avatar) }}" width="100">
            @else
                Không có ảnh
            @endif
        </div>

        <div class="mb-3">
            <label for="avatar">Chọn ảnh mới (nếu muốn thay):</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <div class="mb-3">
            <label for="describe">Mô tả:</label>
            <textarea name="describe" class="form-control" rows="3">{{ $trademark->describe }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('trademark.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div></div>
@endsection
