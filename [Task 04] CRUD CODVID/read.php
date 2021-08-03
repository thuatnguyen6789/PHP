<?php
//Check existence of id parameter before processing further
if (isset($_GET["Id"]) && !empty(trim($_GET["Id"]))){
    // Include config file
    require_once 'config.php';
    // Prepare a select statement
    $sql = "SELECT * FROM people WHERE Id = ?";

    if ($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i",$param_Id);

        // Set parameters
        $param_Id = trim($_GET["Id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop*/
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $Name = $row["Name"];
                $Tel = $row["Tel"];
                $Address = $row["Address"];
                $F = $row["F"];
                $Location = $row["Location"];
                $start_date = $row["start_date"];
                $end_date = $row["end_date"];
            }else{
                //URL doesn't contain valid id parameter. Redirect t error page
                header("location: error.php");
                exit();
            }
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($link);
}else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width : 900px;
            margin:  0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>View Record</h1>
                </div>
                <div class="form-group">
                    <lable>Name :</lable>
                    <p class="form-control-static"><?php echo $row["Name"]; ?></p>
                </div>
                <div class="form-group">
                    <lable>Tel :</lable>
                    <p class="form-control-static"><?php echo $row["Tel"]; ?></p>
                </div>
                <div class="form-group">
                    <lable>Address :</lable>
                    <p class="form-control-static"><?php echo $row["Address"]; ?></p>
                </div>
                <div class="form-group">
                    <lable>F :</lable>
                    <p class="form-control-static"><?php echo $row["F"]; ?></p>
                </div>
                <div class="form-group">
                    <lable>Location :</lable>
                    <p class="form-control-static"><?php echo $row["Location"]; ?></p>
                </div>
                <div class="form-group">
                    <lable>start_date :</lable>
                    <p class="form-control-static"><?php echo $row["start_date"]; ?></p>
                </div>
                <div class="form-group">
                    <lable>end_date :</lable>
                    <p class="form-control-static"><?php echo $row["end_date"]; ?></p>
                </div>
                <p><a href="index.php" class="btn btn-primary">Back</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>


