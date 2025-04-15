@extends('admin.layout.master')

@section('content')
<div class="container">
    <h2>Thêm mã giảm giá</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('discount-codes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tên mã</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Giá trị</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>
        <div class="mb-3">
            <label>Đơn vị (% hoặc vnđ)</label>
            <input type="text" name="unit_price" class="form-control" value="{{ old('unit_price', '%') }}" required>
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('discount-codes.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
