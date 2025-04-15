@extends('admin.layout.master')

@section('content')
<div class="container">
    <h2>Danh sách mã giảm giá</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('discount-codes.create') }}" class="btn btn-primary mb-3">Thêm mã giảm giá</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Giá trị</th>
                <th>Đơn vị</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($codes as $code)
            <tr>
                <td>{{ $code->name }}</td>
                <td>{{ $code->price }}</td>
                <td>{{ $code->unit_price }}</td>
                <td>{{ $code->description }}</td>
                <td>
                    <a href="{{ route('discount-codes.edit', $code->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('discount-codes.destroy', $code->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xoá?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Xoá</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
