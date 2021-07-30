<?php
$_SESSION['username'] = "Admin";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Portfolio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <header>
           <a href="temp.html" class="header-brand">CODELANE</a>
           <nav>
               <ul>
                   <li><a href="portfolio.html">NGUYEN MINH HIEP</a></li>
                   <li><a href="about.html">About me</a></li>
                   <li><a href="contact.html">Contact</a></li>
               </ul>
               <a href="cases.html" class="header-cases">Cases</a>
           </nav>
       </header>
        <main>
            <section class="gallery-links">
                <div class="wrapper">
                    <h2>Gallery</h2>
                    <div class="gallery-container">
                        <?php
                        include_once 'includes/dhb.inc.php';

                        $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC ;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL statement failed!";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while ($row = mysqli_fetch_assoc($result)){
                                echo '<a href="#">
                                <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
                                <h3>'.$row["titleGallery"].'</h3>
                                <p>'.$row["descGallery"].'</p>
                                </a>';
                            }
                        }
                        ?>
                    </div>

                    <?php
                    if (isset($_SESSION['username'])){
                        echo '<div class="gallery-upload">
                            <h2>Upload</h2>
                            <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="filename" placeholder="File name ...">
                                <input type="text" name="filetitle" placeholder="Image title ...">
                                <input type="text" name="filedesc" placeholder="Image description ...">
                                <input type="file" name="file">
                                <button type="submit" name="submit">UPLOAD</button>
                            </form>
                        </div>';
                    }
                    ?>
                </div>
            </section>
        </main>
        <div class="wrapper">
            <footer>
                <ul class="footer-links-main">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Cases</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">About me</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="footer-links-cases">
                    <li><p>Latest cases</p></li>
                    <li><a href="#">CODELEAN - WEB DEVELOPMENT</a></li>
                    <li><a href="#">MINHHIEP - WEB DEVELOPMENT, SEO</a></li>
                    <li><a href="#">HIEPMINH - YOUTUBE CHANNEL</a></li>
                    <li><a href="#">CODELEAN - VIDEO PRODUCTION</a></li>
                </ul>
                <div class="footer-sm">
                    <a href="https://www.youtube.com/watch?v=0hz2-445KnI">
                        <img src="img/youtube.jpg" width="120" height="65" alt="youtube-icon" >

                    </a>
                    <a href="https://www.youtube.com/watch?v=0hz2-445KnI">
                        <img src="img/twitter.jpg"  width="120" height="65" alt="youtube icon">
                    </a>
                    <a href="https://www.facebook.com/hiep.nguyenminh.9887">
                        <img src="img/facebook.jpg"  width="120" height="65" alt="youtube icon">
                    </a>
                </div>
            </footer>
        </div>
    </body>
</html>
