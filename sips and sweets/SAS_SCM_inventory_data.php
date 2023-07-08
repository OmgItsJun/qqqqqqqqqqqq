<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("connection failed" . mysqli_connect_error());
}
// echo "Connected successfully";