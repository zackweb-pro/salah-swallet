<?php
$host = "localhost";
$user = "id19379719_root";
$password = "Z>4/7D)g~wb5lk)D";
$db = "id19379719_employees";
$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
