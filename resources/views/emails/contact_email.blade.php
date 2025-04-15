<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #f1f1f1;
        }

        .email-header h2 {
            color: #3498db;
            margin: 0;
        }

        .email-body {
            padding: 20px;
        }

        .email-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }

        .button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .message {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }

        .message h3 {
            margin: 0;
            color: #2c3e50;
        }

        .message p {
            font-size: 14px;
            line-height: 1.6;
        }

    </style>
</head>
<body>

<div class="email-container">
    <div class="email-header">
        <h2>{{ $sentData['title'] }}</h2>
    </div>
    <div class="email-body">
        <p>Xin chào,</p>
        <p>{{ $sentData['title'] }} Dưới đây là thông tin chi tiết:</p>

        <div class="message">
            <h3>Tên khách hàng: {{ $sentData['name'] }}</h3>
            <p><strong>Email:</strong> {{ $sentData['email'] }}</p>
            <p><strong>Thông điệp:</strong></p>
            <p>{{ $sentData['body'] }}</p>
        </div>

        <p>Vui lòng xử lý yêu cầu này càng sớm càng tốt.</p>
    </div>

    <div class="email-footer">
        <p>Trân trọng,</p>
        <p><strong>Đội ngũ hỗ trợ khách hàng</strong></p>
        <p><a href="https://example.com" class="button">Truy cập website</a></p>
    </div>
</div>

</body>
</html>
