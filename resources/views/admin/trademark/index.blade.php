@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
<div class="container">
    <h2>Danh sách Thương hiệu</h2>

    <a href="{{ route('trademark.create') }}" class="btn btn-success mb-3">+ Thêm Thương hiệu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trademarks as $trademark)
                <tr>
                    <td>{{ $trademark->id }}</td>
                    <td>{{ $trademark->name }}</td>
                    <td>
                        @if($trademark->avatar)
                            <img src="{{ asset($trademark->avatar) }}" alt="" width="80">
                        @else
                            Không có
                        @endif
                    </td>
                    <td>{{ $trademark->describe }}</td>
                    <td>
                        <a href="{{ route('trademark.edit', $trademark->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="{{ route('trademark.delete', $trademark->id) }}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div></div>
@endsection
