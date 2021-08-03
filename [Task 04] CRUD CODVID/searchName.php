<html>
<head>
    <title>Search Name</title>
</head>
<body>
<?php
    $Name = '';
    if (!empty($_POST['Name'])){
        $Name = $_POST['Name'];
        echo "Finding record, {$_POST['Name']}, and Result";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    Enter your name : <input type="text" name="Name"/>
    <input type="submit" class="btn btn-primary" value="Submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
</form>

<?php
$myDB = new mysqli('localhost','root','','isolate');
if ($myDB->connect_error)
{
    die('Connect Error (' . $myDB->connect_error . ') ' .$myDB->connect_error);
}
// Name
if ($Name != '')
{
    $sql = "SELECT * FROM people WHERE Name LIKE '%{$Name}' ORDER BY Name";
}else{
    $sql = "SELECT * FROM people";
}
$result = $myDB->query($sql);


?>
<table width="1100" cellspacing="2" cellpadding="6" align="center" border="1">
    <tr>
        <td colspan="8">
            <h3 align="center">Danh sach so nguoi cach li</h3>
        </td>
    </tr>
    <tr>
        <td align="center">ID</td>
        <td align="center">Name</td>
        <td align="center">Tel</td>
        <td align="center">Address</td>
        <td align="center">F</td>
        <td align="center">Location</td>
        <td align="center">start_date</td>
        <td align="center">end_date</td>

    </tr>
    <?php
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td align='center'>";
        echo stripslashes($row["Id"]);
        echo "</td><td align='center'> ";
        echo $row["Name"];
        echo "</td><td align='center'>";
        echo $row["Tel"];
        echo "</td><td align='center'>";
        echo $row["Address"];
        echo "</td><td align='center'>";
        echo $row["F"];
        echo "</td><td align='center'>";
        echo $row["Location"];
        echo "</td><td align='center'>";
        echo $row["start_date"];
        echo "</td><td align='center'>";
        echo $row["end_date"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
    <?php
    require_once 'index.php';
    ?>
</table>
</body>
</html>
