@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Cập nhật loại sản phẩm</h2>
    <form action="{{ route('product-types.update', $productType->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tên:</label>
            <input type="text" name="name" value="{{ $productType->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mô tả:</label>
            <textarea name="description" class="form-control">{{ $productType->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Hình ảnh:</label>
            @if($productType->image)
                <div><img src="{{ asset($productType->image) }}" width="80"></div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection
