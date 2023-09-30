<?php
include "../config/config.php";

$data = "SELECT * FROM user WHERE username='$username'";

if (isset($_GET['username'])) {
    $resIsUsernameAvailable = $authentication_usecase->getUserByUsername($_GET['username']);
    $resData['username'] = $_GET['username'];
    $resData['isUsernameAvailable'] = !isset($resIsUsernameAvailable['data']);
}
?>