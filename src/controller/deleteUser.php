<?php
session_start();
if ($_SESSION["role"] != "admin") {
    header("location: loginPage.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("location: loginPage.php");
    exit;
}
require 'functionsUser.php';
$userID = $_GET["id"];

if( deleteUser($userID) > 0 ) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = '../manageUser.php';
		</script>";
} else {
	echo "<script>
			alert('data gagal dihapus!');
			document.location.href = '../manageUser.php';
		</script>";
}
?>