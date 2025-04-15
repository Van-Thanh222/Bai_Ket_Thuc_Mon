@extends('admin.layout.master')

@section('content')
<div class="container">
    <h3>Cập nhật sản phẩm ô tô</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Loại sản phẩm</label>
            <select name="id_type" class="form-control" required>
                <option value="">-- Chọn loại --</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $product->id_type ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Giá gốc</label>
            <input type="number" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Giá bán</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Giá khuyến mãi</label>
            <input type="number" name="promotion_price" value="{{ old('promotion_price', $product->promotion_price) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Hình ảnh</label><br>
            @if ($product->image)
                <img src="{{ asset($product->image) }}" width="120" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control-file">
        </div>
        <div class="form-group">
    <label>Thương hiệu</label>
    <select name="id_trademark" class="form-control" required>
        <option value="">-- Chọn thương hiệu --</option>
        @foreach($trademarks as $trademark)
            <option value="{{ $trademark->id }}" {{ $trademark->id == $product->id_trademark ? 'selected' : '' }}>
                {{ $trademark->name }}
            </option>
        @endforeach
    </select>
</div>

        <div class="form-check">
            <input type="checkbox" name="new" value="1" class="form-check-input" id="new" {{ $product->new ? 'checked' : '' }}>
            <label class="form-check-label" for="new">Mới</label>
        </div>

        <div class="form-check">
            <input type="checkbox" name="top" value="1" class="form-check-input" id="top" {{ $product->top ? 'checked' : '' }}>
            <label class="form-check-label" for="top">Top</label>
        </div>

        <div class="form-group mt-2">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <hr>

        <h5>Thông tin chi tiết ô tô</h5>

        <div class="form-group">
            <label>Năm sản xuất</label>
            <input type="number" name="year" value="{{ old('year', $product->year) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Km đã đi</label>
            <input type="number" name="mileage" value="{{ old('mileage', $product->mileage) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Nhiên liệu</label>
            <input type="text" name="fuel_type" value="{{ old('fuel_type', $product->fuel_type) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Hộp số</label>
            <input type="text" name="transmission" value="{{ old('transmission', $product->transmission) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Động cơ</label>
            <input type="text" name="engine" value="{{ old('engine', $product->engine) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Số chỗ</label>
            <input type="number" name="seats" value="{{ old('seats', $product->seats) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Màu xe</label>
            <input type="text" name="color" value="{{ old('color', $product->color) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Xuất xứ</label>
            <input type="text" name="origin" value="{{ old('origin', $product->origin) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Tình trạng</label>
            <input type="text" name="condition" value="{{ old('condition', $product->condition) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Bảo hành</label>
            <input type="text" name="warranty" value="{{ old('warranty', $product->warranty) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Mã VIN</label>
            <input type="text" name="vin" value="{{ old('vin', $product->vin) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </form>
</div>
@endsection
