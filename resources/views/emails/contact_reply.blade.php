<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phản hồi từ quản trị viên</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <h2 style="color: #007bff;">Xin chào {{ $name }},</h2>

        <p>Chúng tôi rất cảm ơn bạn đã liên hệ với chúng tôi.</p>

        <p><strong>Nội dung bạn gửi:</strong></p>
        <blockquote style="background-color: #f1f1f1; padding: 10px; border-left: 4px solid #007bff;">
            {{ $userMessage }}
        </blockquote>

        <p><strong>Phản hồi từ quản trị viên:</strong></p>
        <blockquote style="background-color: #eaf7ea; padding: 10px; border-left: 4px solid #28a745;">
            {{ $reply }}
        </blockquote>

        <p>Nếu bạn cần thêm bất kỳ hỗ trợ nào, đừng ngần ngại liên hệ lại với chúng tôi.</p>

        <p>Trân trọng,<br>
        <strong>Đội ngũ hỗ trợ khách hàng</strong></p>

        <hr>
        <p style="font-size: 12px; color: #999;">Email này được gửi tự động. Vui lòng không trả lời trực tiếp email này.</p>
    </div>
</body>
</html>
