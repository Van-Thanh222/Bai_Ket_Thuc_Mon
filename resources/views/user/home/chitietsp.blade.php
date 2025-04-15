@extends('layout.master')

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Hình ảnh -->
        <div class="col-md-6">
            <img src="{{ asset($product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h2 class="mb-3">{{ $product->name }}</h2>
            <p><strong>Thương hiệu:</strong> {{ $product->trademark->name }}</p>
            <p><strong>Loại xe:</strong> {{ $product->productType->name }}</p>

            <div class="my-3">
                @if ($product->promotion_price && $product->promotion_price < $product->price)
                    <h4 class="text-danger">{{ number_format($product->promotion_price, 0, ',', '.') }}₫ 
                        <small class="text-muted"><del>{{ number_format($product->price, 0, ',', '.') }}₫</del></small>
                    </h4>
                @else
                    <h4>{{ number_format($product->price, 0, ',', '.') }}₫</h4>
                @endif
            </div>

            <p class="text-muted">{{ $product->description }}</p>

            <a href="{{ route('order.now', $product->id) }}" class="btn btn-primary btn-lg">Mua ngay</a>
            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-outline-secondary btn-lg">Thêm vào giỏ</a>
        </div>
    </div>

    <!-- Thông số kỹ thuật -->
    <div class="row mt-5">
        <div class="col-12">
            <h4>Thông số kỹ thuật</h4>
            <table class="table table-bordered mt-3">
                <tbody>
                    <tr><th>Năm sản xuất</th><td>{{ $product->year }}</td></tr>
                    <tr><th>Quãng đường đã đi</th><td>{{ $product->mileage }} km</td></tr>
                    <tr><th>Loại nhiên liệu</th><td>{{ $product->fuel_type }}</td></tr>
                    <tr><th>Hộp số</th><td>{{ $product->transmission }}</td></tr>
                    <tr><th>Động cơ</th><td>{{ $product->engine }}</td></tr>
                    <tr><th>Số ghế</th><td>{{ $product->seats }}</td></tr>
                    <tr><th>Màu sắc</th><td>{{ $product->color }}</td></tr>
                    <tr><th>Xuất xứ</th><td>{{ $product->origin }}</td></tr>
                    <tr><th>Tình trạng</th><td>{{ $product->condition }}</td></tr>
                    <tr><th>Bảo hành</th><td>{{ $product->warranty }}</td></tr>
                    <tr><th>Số VIN</th><td>{{ $product->vin }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
