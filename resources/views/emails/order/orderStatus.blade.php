<!DOCTYPE html>
<html>
<head>
    <title>Thông báo đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #444;
            font-size: 22px;
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: #f4f4f4;
            margin: 10px 0;
            padding: 10px;
            border-left: 5px solid #d4af37;
            /* Màu vàng đồng */
            font-size: 16px;
        }

        em {
            font-size: 14px;
            color: #888;
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        strong {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #000;
        }

        body {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <h1>DNTSHOP xin thông báo tới quý khách hàng về trạng thái đơn hàng</h1>

    <ul>
        <li>Khách hàng: {{$full_name}}</li>
        <li>Mã đơn hàng: {{$order_code}}</li>
        <li>Trạng thái đơn hàng: {{$order_status}}</li>
        <li>Ngày đặt mua: {{$created_at}}</li>
    </ul>
    <br>
    <em>Đây là tin nhắn tự động, quý khách vui lòng không trả lời mail này!</em>
    <Strong>Trân trọng</Strong>
</body>

</html>