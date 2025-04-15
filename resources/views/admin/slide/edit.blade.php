@extends('admin.layout.master')


@section('content')
<div class="container mt-5">
    <h2>Sửa Slide</h2>

    <form action="{{ route('slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tên Slide:</label>
            <input type="text" name="name" class="form-control" value="{{ $slide->name }}" required>
        </div>

        <div class="mb-3">
            <label>Ảnh hiện tại:</label><br>
            <img src="{{ asset('image/' . $slide->image) }}" width="200">
        </div>

        <div class="mb-3">
            <label>Chọn ảnh mới (nếu cần):</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
</html>
@endsection