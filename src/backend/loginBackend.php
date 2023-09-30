<?php
session_start();
include ".\config\config.php"; // bermasalah
error_reporting(0);

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM users WHERE username='$username'";
    $result=mysqli_query($conn,$sql);
    //cek username
    if(mysqli_num_rows($result)===1){
        //cek password
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password'])){
            $_SESSION['login']=true;
            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$row['email'];
            $_SESSION['isAdmin']=$row['isAdmin'];
            header("location: ..\homepageUser.php");
            exit;
        }
        else{
            echo "<script>alert('Password is Incorrect!')</script>";
        }
    }
    else{
        echo "<script>alert('Username is Incorrect!')</script>";
    }
}


?>