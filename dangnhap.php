<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <div id="logincard">
            <h1><span class="title">Đăng nhập</span></h1>
            <form class="fromlogin" action="dangnhap.php" method="post">
                <label>Tên người dùng:</label><br>
                <input type="text" class="name" name="usn"><br>
                <span class="error"><?php echo $usnEr; ?></span><br>
                <label>Mật khẩu:</label><br>
                <input type="password" class="pass" name="pass">
                <span class="error"><?php echo $passEr; ?></span><br>
                <div class="button">
                    <input type="submit" value="Đăng nhập" name="submit">
                    </div>
                </form>
            <p class="footer">Bạn chưa có tài khoản ? <a class="signup" href="dangky.php"> Đăng ký </a>
            </p>
            </div>
        </div>
</body>
</html>