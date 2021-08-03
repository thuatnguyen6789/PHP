
<HTML>
<head>
    <meta charset="UTF-8">
    <title>Danh sach so nguoi bi cach li</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1400px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top:  0;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="searchName.php" class="btn btn-success pull-right">Search Name</a>
                <a href="searchF.php" class="btn btn-success pull-right">Search F</a>
                <a href="searchLocation.php" class="btn btn-success pull-right">Search Location</a>
                <div class="page-header clearfix">
                    <h2 class="pull-left">CRUD CODVID 19</h2>
                    <a href="insert.php" class="btn btn-success pull-right">Add New People</a>
                </div>
                <?php
                require_once  'config.php';
                $sql = "SELECT * FROM people";
                if ($result = mysqli_query($link, $sql)){
                    if (mysqli_num_rows($result) > 0){
                        echo "<table class=' table table-bordered table-striped' >";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Name</th>";
                        echo "<th>Tel</th>";
                        echo "<th>Address</th>";
                        echo "<th>F</th>";
                        echo "<th>Location</th>";
                        echo "<th>Start_date</th>";
                        echo "<th>End_date</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                       while ($row =mysqli_fetch_array($result)){
                           echo "<tr>";
                           echo "<td>" .$row['Id'] . "</td>";
                           echo "<td>" .$row['Name'] . "</td>";
                           echo "<td>" .$row['Tel'] . "</td>";
                           echo "<td>" .$row['Address'] . "</td>";
                           echo "<td>" .$row['F'] . "</td>";
                           echo "<td>" .$row['Location'] . "</td>";
                           echo "<td>" .$row['start_date'] . "</td>";
                           echo "<td>" .$row['end_date'] . "</td>";
                           echo "<td>";
                           echo "<a href='read.php?Id=".$row['Id']
                               ."' title='View Record' data-toggle='tooltip'>
                                        <span class='glyphicon glyphicon-eye-open'></span></a>";

                           echo "<a href='update.php?Id=".$row['Id']
                               ."' title='Update Record' data-toggle='tooltip'>
                                         <span class='glyphicon glyphicon-pencil'></span></a>";

                           echo "<a href='delete.php?Id=".$row['Id']
                               ."' title='Delete Record' data-toggle='tooltip'>
                                        <span class='glyphicon glyphicon-trash'></span></a>";
                           echo "</td>";
                           echo "</tr>";
                       }
                       echo "</tbody>";
                       echo "</table>";
                       mysqli_free_result($result);
                     }else{
                        echo "<p class='lead'><em>No records were found</em></p>";
                    }
                }else{
                    echo "ERROR: Cloud not able to execute $sql.".mysqli_error($link);
                }
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</HTML>