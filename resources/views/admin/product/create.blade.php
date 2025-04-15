@extends('admin.layout.master')

@section('content')
<div class="container">
    <h2>Thêm Sản Phẩm Mới</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="id_type">Loại sản phẩm</label>
            <select class="form-control" id="id_type" name="id_type" required>
                <option value="">-- Chọn loại --</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_trademark">Thương hiệu</label>
            <select class="form-control" id="id_trademark" name="id_trademark" required>
                <option value="">-- Chọn thương hiệu --</option>
                @foreach($trademarks as $tm)
                    <option value="{{ $tm->id }}">{{ $tm->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="unit_price">Giá gốc</label>
            <input type="number" class="form-control" id="unit_price" name="unit_price" required>
        </div>

        <div class="form-group">
            <label for="price">Giá bán</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="promotion_price">Giá khuyến mãi</label>
            <input type="number" class="form-control" id="promotion_price" name="promotion_price">
        </div>

        <div class="form-check">
        <input type="hidden" name="new" value="0">
<input type="checkbox" class="form-check-input" id="new" name="new" value="1">
<label class="form-check-label" for="top">Sản phẩm mới</label>

        </div>

        <div class="form-check">
        <input type="hidden" name="top" value="0">
            <input type="checkbox" class="form-check-input" id="top"  name="top" value="1">
            <label class="form-check-label" for="top">Sản phẩm nổi bật</label>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="year">Năm sản xuất</label>
            <input type="number" class="form-control" id="year" name="year">
        </div>

        <div class="form-group">
            <label for="mileage">Số km đã đi</label>
            <input type="number" class="form-control" id="mileage" name="mileage">
        </div>

        <div class="form-group">
            <label for="fuel_type">Loại nhiên liệu</label>
            <input type="text" class="form-control" id="fuel_type" name="fuel_type">
        </div>

        <div class="form-group">
            <label for="transmission">Hộp số</label>
            <input type="text" class="form-control" id="transmission" name="transmission">
        </div>

        <div class="form-group">
            <label for="engine">Động cơ</label>
            <input type="text" class="form-control" id="engine" name="engine">
        </div>

        <div class="form-group">
            <label for="seats">Số chỗ ngồi</label>
            <input type="number" class="form-control" id="seats" name="seats">
        </div>

        <div class="form-group">
            <label for="color">Màu sắc</label>
            <input type="text" class="form-control" id="color" name="color">
        </div>

        <div class="form-group">
            <label for="origin">Xuất xứ</label>
            <input type="text" class="form-control" id="origin" name="origin">
        </div>

        <div class="form-group">
            <label for="condition">Tình trạng</label>
            <input type="text" class="form-control" id="condition" name="condition">
        </div>

        <div class="form-group">
            <label for="warranty">Bảo hành</label>
            <input type="text" class="form-control" id="warranty" name="warranty">
        </div>

        <div class="form-group">
            <label for="vin">Số VIN</label>
            <input type="text" class="form-control" id="vin" name="vin">
        </div>

        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
    </form>
</div>
@endsection
