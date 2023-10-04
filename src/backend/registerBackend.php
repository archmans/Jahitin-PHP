<?php
include "../config/config.php";

session_start();
error_reporting(0);

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Registration Successful!')</script>";
            $username = "";
            $email = "";
            $_POST['password'] = "";
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header("location: ..\loginPage.php");
        } else {
            echo "<script>alert('Registration Failed!')</script>";
            header("location: ..\registerPage.php");
        }
    } else {
        echo "<script>alert('Username or Email Already Exists!')</script>";
        header("location: ..\registerPage.php");
    }
}
