<?php
session_start();
include "../config/config.php";
error_reporting(0);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header("location: ../homepage.php");
            exit;
        } else {
            echo "<script>alert('Password is Incorrect!')</script>";
        }
    } else {
        echo "<script>alert('Username is Incorrect!')</script>";
    }
}
?>
