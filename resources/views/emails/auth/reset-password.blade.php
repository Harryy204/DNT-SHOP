<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Lại Mật Khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS cho email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            border-radius: 8px;
            margin: 20px auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            text-align: center;
            padding: 20px;
            color: #000;
        }

        .content h1 {
            font-size: 24px;
            margin: 20px 0;
            color: #333333;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #555555;
        }

        .reset-button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #000;
            border-radius: 5px;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #888888;
            padding: 20px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>DNT SHOP</h1>
        </div>

        <div class="content p-4">
            <h1>Yêu Cầu Đặt Lại Mật Khẩu</h1>
            <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
            <p>
                <a href="{{ route('password.reset', $token) . '?email=' . urlencode($email) }}" class="reset-button">
                    Đặt Lại Mật Khẩu
                </a>
            </p>
            <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
        </div>

        <div class="footer">
            &copy; 2024 DNT SHOP. Tất cả quyền được bảo lưu.
        </div>
    </div>
</body>
</html>
