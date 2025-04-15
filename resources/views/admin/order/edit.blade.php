@extends('admin.layout.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Chi tiết đơn hàng #{{ $order->order_code }}</h2>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Thông tin khách hàng</h4>
                    <hr>
                    <p><strong>Tên khách hàng:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                    <p><strong>SĐT:</strong> {{ $order->customer_phone }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->customer_address }}</p>
                    <p><strong>Người dùng hệ thống:</strong> 
                        @if($order->user)
                            {{ $order->user->name }} (ID: {{ $order->user->id }})
                        @else
                            Khách vãng lai
                        @endif
                    </p>
                </div>

                <div class="col-md-6">
                    <h4>Thông tin đơn hàng</h4>
                    <hr>
                    <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
                    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Trạng thái:</strong>
                        <span class="badge 
                            @switch($order->status)
                                @case(1) bg-primary @break
                                @case(2) bg-info @break
                                @case(3) bg-warning @break
                                @case(4) bg-success @break
                                @case(5) bg-danger @break
                                @default bg-secondary
                            @endswitch">
                            @switch($order->status)
                                @case(1) Đơn hàng mới @break
                                @case(2) Đã xác nhận @break
                                @case(3) Đang vận chuyển @break
                                @case(4) Đã giao hàng @break
                                @case(5) Đã hủy @break
                                @default Không xác định
                            @endswitch
                        </span>
                    </p>
                    <p><strong>Ghi chú:</strong> {{ $order->note ?? 'Không có ghi chú' }}</p>
                </div>

                <div class="col-md-12 mt-4">
                    <h4>Thông tin sản phẩm</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá gốc</th>
                                    <th>Giá khuyến mãi</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $order->product_name }}
                                        @if($order->product)
                                            <br><small>Mã SP: {{ $order->product->id }}</small>
                                        @endif
                                    </td>
                                    <td>{{ number_format($order->Original_price) }}đ</td>
                                    <td>{{ number_format($order->Promotional_price) }}đ</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ number_format($order->Promotional_price * $order->quantity) }}đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <h4>Thông tin giảm giá</h4>
                    <hr>
                    @if($order->discountCode)
                        <p><strong>Mã giảm giá:</strong> {{ $order->discountCode->code }}</p>
                        <p><strong>Giá trị giảm:</strong> {{ number_format($order->discount_price) }}đ</p>
                    @else
                        <p>Không áp dụng mã giảm giá</p>
                    @endif
                </div>

                <div class="col-md-6 mt-3">
                    <h4>Tổng thanh toán</h4>
                    <hr>
                    <p><strong>Tổng tiền hàng:</strong> {{ number_format($order->Promotional_price * $order->quantity) }}đ</p>
                    <p><strong>Giảm giá:</strong> -{{ number_format($order->discount_price ?? 0) }}đ</p>
                    <p><strong class="h5">Tổng cộng:</strong> 
                        <span class="h5 text-danger">{{ number_format($order->Total_Price-$order->discount_price) }}đ</span>
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại danh sách
                </a>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Chỉnh sửa đơn hàng
                </a>
            </div>
        </div>
    </div>
</div>
@endsection