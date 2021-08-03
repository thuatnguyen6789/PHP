<?php
/* Database credentials, Assuming you are running MySQL sever
with default setting (use 'root' with no password) */
define('DB_SERVER','localhost');
define('DB_USENAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME', 'isolate');

/* Attempt to connect to MySQL database*/
$link = mysqli_connect(DB_SERVER, DB_USENAME,DB_PASSWORD,DB_NAME);

//Check connection
if($link == false)
{
    die("ERROR: Could not connect." . mysqli_connect_error());
}
?>