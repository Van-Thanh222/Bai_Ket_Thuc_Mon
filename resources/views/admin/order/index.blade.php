@extends('admin.layout.master')

@section('content')
<div class="container">
    <h3>Danh sách đơn hàng</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->Total_Price) }}đ</td>
                    <td>
                        <select class="form-control status-select" data-order-id="{{ $order->id }}">
                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Chờ xác nhận</option>
                            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đã xác nhận</option>
                            <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đang giao hàng</option>
                            <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Đã giao hàng</option>
                            <option value="5" {{ $order->status == 5 ? 'selected' : '' }}>Đã hủy</option>
                            <!-- Thêm các trạng thái khác nếu cần -->
                        </select>
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-info">Chi tiết</a>
                        <!-- <form action="{{ route('orders.delete', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form> -->
                    </td>
                </tr>
            @endforeach

            @if(count($orders) == 0)
                <tr>
                    <td colspan="9" class="text-center">Không có đơn hàng nào.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Thêm jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.status-select').change(function() {
        var orderId = $(this).data('order-id');
        var newStatus = $(this).val();
        
        $.ajax({
            url: '/orders/update-status/' + orderId,
            method: 'POST',
            data: {
                status: newStatus,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.success) {
                    alert('Cập nhật trạng thái thành công!');
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi cập nhật trạng thái!');
                location.reload(); // Tải lại trang nếu có lỗi
            }
        });
    });
});
</script>
@endsection