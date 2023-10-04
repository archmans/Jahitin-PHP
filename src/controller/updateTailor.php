<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}
require 'functions.php';

$tailorID = $_GET["id"];
$tailor = query("SELECT * FROM tailor WHERE tailorID = $tailorID")[0];

if( isset($_POST["update"]) ) {
	if( updateTailor($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil diupdate!');
				document.location.href = '../homePage.php';
			</script>";
	} else {
		echo "<script>
				alert('masukkan data dengan benar, data gagal diupdate!');
				document.location.href = 'updateTailor.php?id=$tailorID';
			</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Data Tailor</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..\styles\homepage.css">
    <link rel="stylesheet" href="..\styles\addTailor.css">
</head>
<body>
	<div class="back-container">
		<a href="../homepageAdmin.php">Back</a>
	</div>
	<div class="bangs">
		<p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
	</div>
	<nav>
		<div class="logo">
			<img src="..\assets\logo.png" alt="logo jahitin"/>
		</div>
		<ul>
			<li><a href="..\homepageAdmin.php">Tailor</a></li>
			<li><a href="manageUser.php">User</a></li>
			<li><a href="logoutBackend.php">Logout</a></li>
		</ul>
	</nav>
	<div class="search-results" style="margin-top: 0rem">
		<div class="line">
			<p>Update Tailor<span id="search-term-text"></span></p>
		</div>
	</div>
	<div class="container-tailor">
        <div class="card-tailor">
			<form action="" method="post" enctype="multipart/form-data">
				<ul>
						<input type="hidden" name="id" value="<?php echo $tailor["tailorID"]; ?>">
						<input type="hidden" name="oldFoto" value="<?php echo $tailor["foto_tailor"]; ?>">
						<input type="hidden" name="oldVideo" value="<?php echo $tailor["video_tailor"]; ?>">
					<li>
						<label for="nama">Name : </label>
						<input type="text" name="nama" id="nama" value="<?php echo $tailor["nama"]; ?>">
					</li>
					<li>
						<label for="alamat">Address : </label>
						<input type="text" name="alamat" id="alamat" value="<?php echo $tailor["alamat"]; ?>">
					</li>
					<li>
						<label for="jenis">Category : </label>
						<input type="text" name="jenis" id="jenis" value="<?php echo $tailor["jenis"]; ?>">
					</li>
					<li>
						<label for="foto_tailor">Picture : </label>
						<img src="../img/<?= $tailor["foto_tailor"]; ?>" width="100"></img>
						<br>
						<input type="file" name="foto_tailor" id="foto_tailor">
					</li>
					<br>
					<li>
						<label for="video_tailor">Video : </label>
						<video src="../vid/<?= $tailor["video_tailor"]; ?>" width="100">
						</video><br>
						<input type="file" name="video_tailor" id="video_tailor">
					</li>
					<li>
						<button type="submit" id="submit" name="update" href="..\homepageAdmin.php">Update Tailor</button>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>