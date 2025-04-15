@extends('layout.master')

@section('content')
<style>
    .order-container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        margin-top: 30px;
    }

    .product-image {
        width: 100%;
        max-width: 200px;
        border-radius: 8px;
        object-fit: cover;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control, textarea {
        border-radius: 8px;
    }

    .btn-submit {
        background-color: #0d6efd;
        color: white;
        padding: 10px 25px;
        border: none;
        border-radius: 10px;
        transition: 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0b5ed7;
    }

    .product-summary ul {
        padding-left: 0;
        list-style: none;
    }

    .product-summary li {
        margin-bottom: 10px;
    }

    label {
        font-weight: 600;
    }
</style>

<div class="container order-container">
    <h3 class="mb-4">📝 Đặt hàng: <span class="text-primary">{{ $cart->product->name }}</span></h3>

    <div class="row">
        <!-- Thông tin sản phẩm -->
        <div class="col-md-6 product-summary">
            <h4 class="mb-3">📦 Sản phẩm</h4>
            <ul class="list-group">
                <li class="list-group-item text-center">
                    <img src="{{ asset($cart->product->image) }}" alt="Hình sản phẩm" class="product-image">
                </li>
                <li class="list-group-item">
                    <strong>Tên:</strong> {{ $cart->product->name }}
                </li>
                <li class="list-group-item">
                    <strong>Số lượng:</strong> {{ $cart->quantity }}
                </li>
                <li class="list-group-item">
                    <strong>Đơn giá:</strong> {{ number_format($cart->product->price, 0, ',', '.') }} đ
                </li>
                <li class="list-group-item">
                    <strong>Giảm giá:</strong> {{ $cart->product->promotion_price ? number_format($cart->product->promotion_price, 0, ',', '.') : 'Không có' }} đ
                </li>
                <li class="list-group-item">
                    <strong>Thành tiền:</strong> 
                    {{ number_format(($cart->product->promotion_price * $cart->quantity), 0, ',', '.') }} đ
                </li>
            </ul>
        </div>

        <!-- Form đặt hàng -->
        <div class="col-md-6">
            <h4 class="mb-3">👤 Thông tin khách hàng</h4>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <input type="hidden" name="cart_id" value="{{ $cart->id }}">

                <div class="form-group">
                    <label>Họ tên:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Địa chỉ:</label>
                    <textarea name="address" rows="2" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>Ghi chú:</label>
                    <textarea name="note" rows="2" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="discount_code">Mã giảm giá (nếu có):</label>
                    <select name="discount_code" id="discount_code" class="form-control">
                        <option value="">-- Không chọn --</option>
                        @foreach($discountCodes as $code)
                            <option value="{{ $code->name }}">
                                {{ $code->name }} - Giảm {{ number_format($code->price, 0, ',', '.') }} đ
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check my-3">
                    <input type="checkbox" name="payment_method" value="cod" class="form-check-input" id="cod" checked>
                    <label class="form-check-label" for="cod">
                        Thanh toán khi nhận hàng (COD)
                    </label>
                </div>

                <button type="submit" class="btn-submit">🛒 Xác nhận đặt hàng</button>
            </form>
        </div>
    </div>
</div>
@endsection
