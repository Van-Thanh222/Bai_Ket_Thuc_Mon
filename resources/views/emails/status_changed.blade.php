@component('mail::message')
# Laravel  
## Cập nhật Trạng thái Đơn hàng  

Chào **{{ $order->customer_name }}**,  

Cảm ơn bạn đã tin tưởng và mua sắm tại **Laravel**. Chúng tôi rất vui thông báo đến bạn về cập nhật mới nhất cho đơn hàng của bạn:

@component('mail::panel')
### Đơn hàng #{{ $order->order_code }}

**Ngày đặt:** {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}  
**Tổng tiền:** {{ number_format($order->Total_Price, 0, ',', '.') }}đ  

@php
    $statusText = match ($order->status) {
        1 => 'Đang xử lý',
        2 => 'Đã xử lý',
        3 => 'Đang vận chuyển',
        4 => 'Đã giao',
        5 => 'Đã hủy',
        default => 'Không rõ trạng thái',
    };
@endphp

@component('mail::button', ['url' => '', 'color' => 'success'])
{{ $statusText }}
@endcomponent
@endcomponent

@component('mail::panel')
Đơn hàng đã được **{{ strtolower($statusText) }}** thành công đến địa chỉ của bạn.

Chúng tôi hy vọng bạn hài lòng với sản phẩm. Nếu có bất kỳ vấn đề gì, vui lòng liên hệ với chúng tôi trong vòng **7 ngày**.
@endcomponent

Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email hỗ trợ hoặc hotline.  

Trân trọng cảm ơn,  
**Đội ngũ Laravel**
@endcomponent
