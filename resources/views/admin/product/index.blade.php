@extends('admin.layout.master')

@section('content')
<div class="container">
    <h3>Danh sách sản phẩm</h3>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">+ Thêm sản phẩm</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>Giá gốc</th>
                <th>Giá giảm</th>
                <th>Khuyến mãi</th>
                <th>Top</th>
                <th>Mới</th>
                <th>Mô tả</th>
                <th>Năm</th>
<th>Km</th>
<th>Động cơ</th>
<th>Nhiên liệu</th>
<th>Số chỗ</th>
<th>Màu</th>
<th>Xuất xứ</th>
                <th>Tình trạng</th>
<th>Bảo hành</th>
<th>Mã VIN</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" width="80">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->productType->name ?? '---' }}</td>
                    <td>{{ number_format($product->unit_price) }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>{{ number_format($product->promotion_price) }}</td>
                    <td>{{ $product->top ? '✔️' : '' }}</td>
                    <td>{{ $product->new ? '✔️' : '' }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->year }}</td>
<td>{{ $product->mileage }}</td>
<td>{{ $product->engine }}</td>
<td>{{ $product->fuel_type }}</td>
<td>{{ $product->seats }}</td>
<td>{{ $product->color }}</td>
<td>{{ $product->origin }}</td>
                    <td>{{ $product->condition }}</td>
                    <td>{{ $product->warranty }}</td>
                    <td>{{ $product->vin }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if(count($products) == 0)
                <tr>
                    <td colspan="11" class="text-center">Không có sản phẩm nào.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
