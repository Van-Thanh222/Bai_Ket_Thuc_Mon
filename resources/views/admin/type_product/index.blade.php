@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Danh sách loại sản phẩm</h2>
    <a href="{{ route('product-types.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    <table class="table table-bordered">
        <tr>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        @foreach ($types as $type)
        <tr>
            <td>{{ $type->name }}</td>
            <td>
                @if($type->image)
                <img src="{{ asset($type->image) }}" width="80">
                @endif
            </td>
            <td>{{ $type->description }}</td>
            <td>
                <a href="{{ route('product-types.edit', $type->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('product-types.destroy', $type->id) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
