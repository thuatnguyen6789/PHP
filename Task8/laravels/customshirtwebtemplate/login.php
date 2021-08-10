<?php
$_SESSION['username'] = "Admin";
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Custom Shirt Web Template</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div id="header">
    <div>

        <a href="index.php" id="logo"><img src="images/logo.png" alt="LOGO"></a>
    </div>
</div>
<div id="body">
    <div id="contents">
        <h1>Login</h1>
        <?php
        if (isset($_SESSION['username'])){
            echo '<div class="gallery-upload">
                            <h2>Login</h2>
                            <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="Email" placeholder="Phone or Email ...">
                                <input type="password" name="password" placeholder="Password...">
                                <button type="submit" name="submit"><a class="fix" href="index.php">Login</a></button>
                                <p>Quên mật khẩu ?</p>
                                <a class="fix" href="register.php">Tạo tài khoản ?</a>

                            </form>
                        </div>';
        }
        ?>
    </div>
</div>

<div id="footer">
    <div class="background">
        <div class="body">
            <div class="subscribe">
                <h3>Get Weekly Newsletter</h3>
                <form action="index.php" method="post">
                    <input type="text" value="" class="txtfield">
                    <input type="submit" value="" class="button">
                </form>
            </div>
            <div class="posts">
                <h3>Latest Post</h3>
                <p>
                    Integer sit amet erat at nulla sodales fermentum vel quis mi. <br> Morbi bibendum <a href="#header">...</a> <span>12/08/2021</span>
                </p>
            </div>
            <div class="connect">
                <h3>Follow Us:</h3>
                <a href="https://www.facebook.com/hiep.nguyenminh.9887" target="_blank" class="facebook"></a> <a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a> <a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
            </div>
        </div>
    </div>
    <span id="footnote"> <a href="index.php">Moonstrosity Custom Shirts</a> &copy; 2021 | All Rights Reserved.</span>
</div>
</body>
</html>

