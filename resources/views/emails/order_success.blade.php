<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 30px;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            color: #333;
        }
        .email-header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .email-header h1 {
            color: #28a745;
            font-size: 24px;
        }
        .email-body p {
            line-height: 1.6;
            font-size: 16px;
        }
        .order-info {
            background-color: #f1f8f4;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .order-info strong {
            color: #28a745;
        }
        .email-footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>🎉 Đặt Hàng Thành Công!</h1>
        </div>
        <div class="email-body">
            <p>Chào <strong>{{ $order->user->full_name ?? 'Quý khách' }}</strong>,</p>
            <p>Cảm ơn bạn đã mua sắm tại website của chúng tôi.</p>

            <div class="order-info">
                <p>Mã đơn hàng: <strong>#{{ $order->order_code}}</strong></p>
                <p>Tổng thanh toán: <strong>{{ number_format($order->Total_Price, 0, ',', '.') }} VNĐ</strong></p>
            </div>

            <p>Chúng tôi sẽ sớm liên hệ để xác nhận và giao hàng cho bạn trong thời gian sớm nhất.</p>
            <p>Nếu có bất kỳ câu hỏi nào, vui lòng liên hệ với bộ phận hỗ trợ khách hàng của chúng tôi.</p>

            <p>Trân trọng,</p>
            <p><strong>Website bán hàng</strong></p>
        </div>

        <div class="email-footer">
            © {{ date('Y') }} Website bán hàng. Mọi quyền được bảo lưu.
        </div>
    </div>
</body>
</html>
