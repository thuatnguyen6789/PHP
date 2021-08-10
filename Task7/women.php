<?php
$_SESSION['username'] = "Admin";
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Women - Moonstrosity Custom Shirts Website Template</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div id="header">
    <div>
        <div id="navigation">
            <div class="infos">
                <a href="index.php">Cart</a> <a href="index.php">0 items</a>
            </div>
            <div>
                <a href="login.php">Login</a> <a href="register.php">Register</a>
            </div>
            <ul id="primary">
                <li>
                    <a href="index.php"><span>Home</span></a>
                </li>
                <li>
                    <a href="about.php"><span>About</span></a>
                </li>
                <li>
                    <a href="men.php"><span>Men</span></a>
                </li>
            </ul>
            <ul id="secondary">
                <li  class="selected">
                    <a href="women.php"><span>Women</span></a>
                </li>
                <li>
                    <a href="blog.php"><span>Blog</span></a>
                </li>
                <li>
                    <a href="contact.php"><span>Contact</span></a>
                </li>
            </ul>
        </div>
        <a href="index.php" id="logo"><img src="images/logo.png" alt="LOGO"></a>
    </div>
</div>
<div id="body">
    <div id="contents">
        <h1>Women</h1>
        <section class="gallery-links">

            <ul id="shirts" class="gallery-container">

                <?php
                include_once 'includes/dhb.inc.php';

                $sql = "SELECT * FROM gallerys ORDER BY orderGallery DESC ;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    echo "SQL statement failed!";
                }else{
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)){
                        echo ' <li>
                                        <a href="#header"><div style="background-image: url(images/gallery/'.$row["imgFullNameGallery"].');"></div></a><a href="#header" class="button">Add to cart</a>
                                        <p>
                                        '.$row["titleGallery"].' <br> <span>&#36;'.$row["descGallery"].'</span>
                                        </p>
                                   </li>
                                ';
                    }
                }
                ?>
            </ul>

        </section>
    </div>
    <?php
    if (isset($_SESSION['username'])){
        echo '<div class="gallery-upload">
                            <h2>Upload</h2>
                            <form action="includes/gallery-upload.women.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="filename" placeholder="Name ...">
                                <input type="text" name="filetitle" placeholder="Title ...">
                                <input type="text" name="filedesc" placeholder="Salary ...">
                                <input type="file" name="file">
                                <button type="submit" name="submit">UPLOAD</button>
                            </form>
                        </div>';
    }
    ?>
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

