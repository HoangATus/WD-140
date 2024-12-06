<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Mật Khẩu</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            color: #999;
            font-size: 14px;
            margin-top: 30px;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xin Chào!</h2>
        <p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Để tiếp tục, vui lòng nhấn vào nút dưới đây để thiết lập mật khẩu mới:</p>
        <a href="{{ url('reset-password/' . $token) }}" class="btn">Reset Mật Khẩu</a>
        <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này. Mật khẩu của bạn sẽ không bị thay đổi.</p>
        
        <div class="footer">
            <p>Chúng tôi cam kết bảo mật thông tin của bạn.</p>
            
        </div>
    </div>
</body>
</html>
