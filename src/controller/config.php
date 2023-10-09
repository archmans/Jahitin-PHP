<?php

$server = "mysql_db";
$username = "user";
$password = "password";
$database = "jahitin";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
