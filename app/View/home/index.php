<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .home-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 420px;
            text-align: center;
        }
        h2 {
            margin-bottom: 8px;
            color: #333;
        }
        .welcome-text {
            color: #666;
            font-size: 15px;
            margin-bottom: 24px;
        }
        .username {
            color: #007bff;
            font-weight: bold;
        }
        .btn-logout {
            display: inline-block;
            padding: 12px 28px;
            background-color: #dc3545;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 15px;
            font-weight: bold;
            transition: background-color 0.2s;
        }
        .btn-logout:hover {
            background-color: #b02a37;
        }
    </style>
</head>
<body>

<div class="home-container">
    <h2>TRANG CHỦ</h2>
    <p class="welcome-text">
        Xin chào, <span class="username"><?= htmlspecialchars($username ?? 'Khách') ?></span>!
    </p>
    <p class="welcome-text">Bạn đã đăng nhập thành công.</p>
    <a href="/AuthController/logout" class="btn-logout">Đăng xuất</a>
</div>

</body>
</html>
