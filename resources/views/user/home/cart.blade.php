@extends('layout.master')

@section('content')
<style>
    .cart-table th {
        background-color: #f8f9fa;
        text-transform: uppercase;
        font-size: 13px;
        text-align: center;
    }

    .cart-table td {
        vertical-align: middle !important;
        text-align: center;
    }

    .cart-table img {
        border-radius: 8px;
        max-height: 80px;
        object-fit: contain;
    }

    .cart-summary {
        background: #f1f3f5;
        padding: 20px;
        border-radius: 16px;
        text-align: right;
    }

    .btn-action {
        margin: 2px 0;
        width: 100%;
        border-radius: 12px;
    }

    .btn-detail {
        background-color: #0d6efd;
        color: #fff;
    }

    .btn-order {
        background-color: #198754;
        color: #fff;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-update {
        border-radius: 12px;
        white-space: nowrap;
    }

    .form-control {
        border-radius: 10px;
    }

    .empty-cart {
        padding: 40px;
        background: #f9f9f9;
        text-align: center;
        border-radius: 16px;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4">🛒 Giỏ hàng của bạn</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($carts->isEmpty())
        <div class="empty-cart">
            <h4>Giỏ hàng của bạn đang trống 😢</h4>
            <p>Hãy quay lại cửa hàng để chọn vài món nhé!</p>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">🔙 Quay lại trang chủ</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped cart-table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($carts as $cart)
                        @php
                            $subtotal = $cart->quantity * $cart->unit_price;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ asset($cart->product->image) }}" alt="{{ $cart->product->name }}">
                            </td>
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ number_format($cart->unit_price) }} đ</td>
                            <td>
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="d-flex justify-content-center align-items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="form-control me-2" style="width: 80px;">
                                    <button type="submit" class="btn btn-sm btn-primary btn-update">Cập nhật</button>
                                </form>
                            </td>
                            <td>{{ number_format($subtotal) }} đ</td>
                            <td>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-delete btn-action">🗑 Xóa</button>
                                </form>

                                <a href="{{ route('product.detail', $cart->product_id) }}" class="btn btn-sm btn-detail btn-action">🔍 Chi tiết</a>

                                <a href="{{ route('order.create', $cart->id) }}" class="btn btn-sm btn-order btn-action">✅ Đặt hàng</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td colspan="2" class="text-start">
                            <strong style="font-size: 18px; color: #dc3545;">{{ number_format($total) }} đ</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
