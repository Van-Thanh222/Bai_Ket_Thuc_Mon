@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Thêm loại sản phẩm</h2>
    <form action="{{ route('product-types.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Tên:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mô tả:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Hình ảnh:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
