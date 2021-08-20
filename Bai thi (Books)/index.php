<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function (){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Book List</h2>
                    <a href="search.php" class="btn btn-success" style="margin-left: 30px;">Search People</a>
                </div>
                <?php
                require_once 'config.php';
                $sql ="SELECT * FROM books";
                if ($result = mysqli_query($link, $sql)){
                    if (mysqli_num_rows($result) > 0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Book Id</th>";
                        echo "<th>Author Id</th>";
                        echo "<th>Title</th>";
                        echo "<th>ISBN</th>";
                        echo "<th>Pub Year</th>";
                        echo "<th>Available</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row =mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" .$row['bookid'] . "</td>";
                            echo "<td>" .$row['authorid'] . "</td>";
                            echo "<td>" .$row['title'] . "</td>";
                            echo "<td>" .$row['ISBN'] . "</td>";
                            echo "<td>" .$row['pub_year'] . "</td>";
                            echo "<td>" .$row['available'] . "</td>";
//                            echo "<td>";
//                            echo "<a href='read.php?id=".$row['id']
//                                ."' title='View Record' data-toggle='tooltip'>
//                                        <span class='glyphicon glyphicon-eye-open'></span></a>";
//                            echo "<a href='update.php?id=".$row['id']
//                                ."' title='Update Record' data-toggle='tooltip'>
//                                         <span class='glyphicon glyphicon-pencil'></span></a>";
//                            echo "<a href='delete.php?id=".$row['id']
//                                ."' title='View Record' data-toggle='tooltip'>
//                                        <span class='glyphicon glyphicon-trash'></span></a>";
//                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        //free result set
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
</html>