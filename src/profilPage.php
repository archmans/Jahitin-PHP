<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}

require 'controller/functionsUser.php';

$id = $_SESSION["id"];
$user = query("SELECT * FROM users WHERE id = $id")[0];

if( isset($_POST["save"]) ) {
	if( updateProfil($_POST) > 0 ) {
		echo "<script>
				alert('Profil berhasil disimpan!');
				document.location.href = 'profilPage.php';
			</script>";
	} else {
		echo "<script>
				alert('masukkan data dengan benar, profil gagal diupdate!');
				document.location.href = 'profilPage.php';
			</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body>
	<h1>Profil</h1>
	<a href="homePage.php">Back</a>
	<form action="" method="post">
		<ul>
				<input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
				<input type="hidden" name="username" value="<?php echo $user["username"]; ?>">
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" value="<?php echo $user["email"]; ?>">
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="text" name="password" id="password" value="<?php echo $user["password"]; ?>">
			</li>
			<li>
				<button type="submit" id="submit" name="save">save</button>
			</li>
		</ul>
	</form>
</body>
</html>