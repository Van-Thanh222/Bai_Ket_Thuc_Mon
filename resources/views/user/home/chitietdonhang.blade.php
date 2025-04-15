@extends('layout.master')

@section('content')
<style>
    .order-detail-box {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .order-info-title {
        font-weight: 600;
        margin-top: 20px;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 10px;
        color: #0d6efd;
    }

    .order-info ul {
        list-style: none;
        padding: 0;
    }

    .order-info ul li {
        margin-bottom: 10px;
    }

    .order-status {
        margin-top: 20px;
    }

    .order-status .step {
        position: relative;
        padding: 15px 20px;
        border-left: 5px solid #dee2e6;
        background-color: #fff;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .order-status .step.active {
        border-left-color: #198754;
        background-color: #e9fbe7;
    }

    .order-status .step.canceled {
        border-left-color: #dc3545;
        background-color: #fbe7e9;
    }

    .order-status .step i {
        margin-right: 8px;
    }

    .order-status .check {
        float: right;
        font-size: 18px;
        color: #198754;
    }

    .order-status .cross {
        float: right;
        font-size: 18px;
        color: #dc3545;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4">🧾 Chi tiết đơn hàng <span class="text-muted">#{{ $order->order_code }}</span></h2>

    <div class="order-detail-box">
        <div class="row">
            <div class="col-md-6 order-info">
                <h5 class="order-info-title">👤 Thông tin khách hàng</h5>
                <ul>
                    <li><strong>Họ tên:</strong> {{ $order->customer_name }}</li>
                    <li><strong>Email:</strong> {{ $order->customer_email }}</li>
                    <li><strong>Điện thoại:</strong> {{ $order->customer_phone }}</li>
                    <li><strong>Địa chỉ:</strong> {{ $order->customer_address }}</li>
                </ul>

                <h5 class="order-info-title">📦 Sản phẩm</h5>
                <ul>
                    <li><strong>Tên sản phẩm:</strong> {{ $order->product_name }}</li>
                    <li><strong>Số lượng:</strong> {{ $order->quantity }}</li>
                    <li><strong>Tổng giá:</strong> {{ number_format($order->Total_Price, 0, ',', '.') }} đ</li>
                    <a href="{{ route('product.detail',$order->product_id ) }}" class="btn btn-primary mt-4">Chi tiết SP</a>
                </ul>

                <h5 class="order-info-title">📝 Ghi chú</h5>
                <p>{{ $order->note ?? 'Không có ghi chú' }}</p>
            </div>

            <div class="col-md-6 order-status">
                <h5 class="order-info-title">📍 Trạng thái đơn hàng</h5>

                <div class="step {{ $order->status >= 1 ? 'active' : '' }}">
                    <i class="bi bi-hourglass-split"></i> Chờ xác nhận
                    @if($order->status >= 1)
                        <span class="check">✔</span>
                    @endif
                </div>

                <div class="step {{ $order->status >= 2 ? 'active' : '' }}">
                    <i class="bi bi-check2-circle"></i> Đã xác nhận
                    @if($order->status >= 2)
                        <span class="check">✔</span>
                    @endif
                </div>

                <div class="step {{ $order->status >= 3 ? 'active' : '' }}">
                    <i class="bi bi-truck"></i> Đang giao hàng
                    @if($order->status >= 3)
                        <span class="check">✔</span>
                    @endif
                </div>

                <div class="step {{ $order->status == 4 ? 'active' : '' }}">
                    <i class="bi bi-bag-check"></i> Đã giao hàng
                    @if($order->status == 4)
                        <span class="check">✔</span>
                    @endif
                </div>

                @if($order->status == 5)
                    <div class="step canceled">
                        <i class="bi bi-x-circle"></i> Đã hủy
                        <span class="cross">✘</span>
                    </div>
                @endif
            </div>
        </div>

        <a href="{{ route('orderss.trangchinh') }}" class="btn btn-primary mt-4">🔙 Quay lại danh sách đơn hàng</a>
        <a href="{{ route('danhgia.form',['id_product' => $order->product_id]) }}" class="btn btn-primary mt-4">Đánh giá SP</a>

</div>

<!-- Bootstrap Icons (nếu chưa có) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
