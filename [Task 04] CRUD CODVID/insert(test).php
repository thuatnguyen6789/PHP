<html>
<head>
    <title>Add new</title>
</head>
<body>
<?php
$Id = 0;
$Name = "";
$Tel = "";
$Address = "";
$F = 0;
$Location = "";
$start_date = "";
$end_date = "";

if (!empty($_POST['Id'])){
    $Id = $_POST['Id'];
}

if (!empty($_POST['Name'])){
    $Name = $_POST['Name'];
}

if (!empty($_POST['Tel'])){
    $Tel = $_POST['Tel'];
}

if (!empty($_POST['Address'])){
    $Address = $_POST['Address'];
}

if (!empty($_POST['F'])){
    $F = $_POST['F'];
}

if (!empty($_POST['Location'])){
    $Location = $_POST['Location'];
}

if (!empty($_POST['start_date'])){
    $start_date = $_POST['start_date'];
}

if (!empty($_POST['end_date'])){
    $end_date = $_POST['end_date'];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Id : <input type="text" name="Id"/><br>
    Name : <input type="text" name="Name"/><br>
    Tel : <input type="text" name="Tel"/><br>
    Address : <input type="text" name="Address"/><br>
    F : <input type="text" name="F"/><br>
    Location : <input type="text" name="Location"/><br>
    start_date : <input type="text" name="start_date"/><br>
    end_date : <input type="text" name="end_date"/>
    <input type="submit" value="Add">
    <input type="submit" value="back">
</form>

<?php
$myDB = new mysqli('localhost','root','','isolate');
if ($myDB->connect_error)
{
    die('Connect Error (' . $myDB->connect_error . ') ' .$myDB->connect_error);
}
if ($Name != '' && $Tel != ''){
    $insert = "INSERT INTO people (Id, Name, Tel, Address, F, Location, start_date, end_date) VALUES 
    ($Id, '$Name', '$Tel', '$Address', $F, '$Location', '$start_date', '$end_date')";
    echo $insert;
    $myDB->query($insert);
    echo  "New record created successfully";
}

if ($Name != '')
{
    $sql = "SELECT * FROM people WHERE Name LIKE '%{$Name}%' ORDER BY Name";
}else{
    $sql = "SELECT * FROM people";
}
$result = $myDB->query($sql);
?>

<table cellspacing="2" cellpadding="6" align="center" border="1">
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
        echo "<td>";
        echo ($row["Id"]);
        echo "</td><td align='center'>";
        echo $row["Name"];
        echo "</td><td>";
        echo $row["Tel"];
        echo "</td><td>";
        echo $row["Address"];
        echo "</td><td>";
        echo $row["F"];
        echo "</td><td>";
        echo $row["Location"];
        echo "</td><td>";
        echo $row["start_date"];
        echo "</td><td>";
        echo $row["end_date"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</body>
</html>
