<?php
$myDB =new mysqli('localhost','root','','dethi');
if ($myDB -> connect_error){
    die('Connect Error (' . $myDB->connect_errno.')'.$myDB->connect_error);
}
$sql ="SELECT * FROM books";
$result =$myDB->query($sql);
?>
</table>
<html>
<head>
    <title>Books</title>
    <!-- jQuery library -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300&family=Noto+Sans+JP:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">  <style>

        *{
            font-family: 'Hind Siliguri', sans-serif;
        }

    </style>

</head>
<body>
<?php
$title = '';

if (!empty($_POST['title'])){
    $title =$_POST['title'];
    echo "Finding record,{$_POST['title']}, and Result ";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Enter your name: <input type="text" name="title"/>
    <input type="submit" value="Search"/>
</form>
<?php
$myDB =new mysqli('localhost','root','','dethi');
if ($myDB -> connect_error){
    die('Connect Error (' . $myDB->connect_errno.')'.$myDB->connect_error);
}
if ($title !=''){
    $sql = "SELECT * FROM books 
  WHERE available < 5   AND  title LIKE '%{$title}%'
    ORDER  BY title";
}else{
    $sql = "SELECT * FROM  books WHERE available < 3 ORDER BY title";
}

$result = $myDB ->query($sql);
?>

<table class="table table-bordered">
    <tr>
        <th colspan="5">
            <h3 align="center">Book List In Libary</h3>
        </th>
    </tr>
    <tr>
        <th scope="col">BookID</th>
        <th scope="col" >AuthorID</th>
        <th width="250" scope="col">Title</th>
        <th scope="col">ISBN</th>
        <th scope="col">Pub Year</th>
        <th scope="col" >Available</th>

    </tr>
    <?php
    while ($row =$result ->fetch_assoc()){
        echo "<tr>";
        echo "<th>";
        echo $row["bookid"];
        echo "</th><th>";
        echo $row["authorid"];
        echo "</th><th>";
        echo stripcslashes($row['title']);
        echo "</th><th align = 'center'>";
        echo $row["ISBN"];
        echo "</th><th>";
        echo $row["pub_year"];
        echo "</th><th>";
        echo $row["available"];
        echo "</th>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
