<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNTSHOP</title>
</head>
<body>
    <p>Xin chào, {{ $contact->name }},</p>

    <p>Cảm ơn bạn đã gửi ý kiến cho chúng tôi. Dưới đây là một số giải pháp giúp giải quyết vấn đề của bạn:</p>

    <blockquote>
        {{ $replyMessage }}
    </blockquote>
    
    <p>Trân trọng,</p>
    <p>Đội ngũ hỗ trợ khách hàng DNTSHOP</p>
</body>
</html>
