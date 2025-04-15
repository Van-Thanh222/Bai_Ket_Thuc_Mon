@extends('layout.master')

@section('content')
<style>
    .order-status .btn {
        border-radius: 20px;
        margin-right: 8px;
        margin-bottom: 10px;
    }

    .table thead th {
        background-color: #f8f9fa;
        text-transform: uppercase;
        font-size: 13px;
    }

    .table td, .table th {
        vertical-align: middle !important;
    }

    .badge {
        font-size: 14px;
        padding: 6px 10px;
        border-radius: 12px;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
        border-radius: 12px;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .order-card {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        border-radius: 16px;
        background: #fff;
        padding: 20px;
    }
</style>

<div class="container">
    <h2 class="my-4">🧾 Tất cả đơn hàng của bạn</h2>

    <!-- Menu ngang cho các trạng thái đơn hàng -->
    <div class="order-status mb-4 d-flex flex-wrap">
        <a href="{{ route('orderss.trangchinh') }}" class="btn btn-outline-secondary {{ request('status') == null ? 'active' : '' }}">Tất cả</a>
        <a href="{{ route('orderss.trangchinh', ['status' => 1]) }}" class="btn btn-outline-warning {{ request('status') == 1 ? 'active' : '' }}">Chờ xác nhận</a>
        <a href="{{ route('orderss.trangchinh', ['status' => 2]) }}" class="btn btn-outline-primary {{ request('status') == 2 ? 'active' : '' }}">Đã xác nhận</a>
        <a href="{{ route('orderss.trangchinh', ['status' => 3]) }}" class="btn btn-outline-info {{ request('status') == 3 ? 'active' : '' }}">Đang giao hàng</a>
        <a href="{{ route('orderss.trangchinh', ['status' => 4]) }}" class="btn btn-outline-success {{ request('status') == 4 ? 'active' : '' }}">Đã giao hàng</a>
        <a href="{{ route('orderss.trangchinh', ['status' => 5]) }}" class="btn btn-outline-danger {{ request('status') == 5 ? 'active' : '' }}">Đã hủy</a>
    </div>

    @if($orders->isEmpty())
        <div class="alert alert-info">📭 Không có đơn hàng nào với trạng thái này.</div>
    @else
        <div class="order-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><strong>#{{ $order->order_code }}</strong></td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ number_format($order->Total_Price, 0, ',', '.') }} ₫</td>
                            <td>
                                <span class="badge 
                                    @if($order->status == 1) bg-warning text-dark
                                    @elseif($order->status == 2) bg-primary
                                    @elseif($order->status == 3) bg-info
                                    @elseif($order->status == 4) bg-success
                                    @else bg-danger
                                    @endif">
                                    {{ 
                                        match($order->status) {
                                            1 => 'Chờ xác nhận',
                                            2 => 'Đã xác nhận',
                                            3 => 'Đang giao hàng',
                                            4 => 'Đã giao hàng',
                                            5 => 'Đã hủy',
                                        }
                                    }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('orders.chitiet', $order->id) }}" class="btn btn-sm btn-info">
                                    👁 Xem chi tiết
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
