<?php
$url = 'localhost';
$username = "root";
$password = "";
$dbname = "moviehall";
$conn = mysqli_connect($url, $username, $password, $dbname);

/* Check connection */
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
