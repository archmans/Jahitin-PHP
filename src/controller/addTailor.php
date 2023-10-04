<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}
require 'functions.php';

if( isset($_POST["tambah"]) ) {
	if( addTailor($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../homePage.php';
            </script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'addTailor.php';
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Tailor</title>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..\styles\homepage.css">
    <link rel="stylesheet" href="..\styles\addTailor.css">
</head>
<body>
<div class="back-container">
		<a href="..\homepage.php">Back</a>
	</div>
	<div class="bangs">
		<p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
	</div>
	<nav>
		<div class="logo">
			<img src="..\assets\logo.png" alt="logo jahitin"/>
		</div>
		<ul>
			<li><a href="../homepageAdmin.php">Tailor</a></li>
			<li><a href="profilePage.php">User</a></li>
			<li><a href="logoutBackend.php">Logout</a></li>
		</ul>
	</nav>
	<div class="search-results" style="margin-top: 0rem">
		<div class="line">
			<p>Add Tailor<span id="search-term-text"></span></p>
		</div>
	</div>
	<div class="container-tailor">
        <div class="card-tailor">
			<form action="" method="post" enctype="multipart/form-data">
				<ul>
					<li>
						<label for="nama">Nama : </label>
						<input type="text" name="nama" id="nama">
					</li>
					<li>
						<label for="alamat">Alamat : </label>
						<input type="text" name="alamat" id="alamat">
					</li>
					<li>
						<label for="jenis">Jenis : </label>
						<input type="text" name="jenis" id="jenis">
					</li>
					<li>
						<label for="foto_tailor">Foto : </label>
						<input type="file" name="foto_tailor" id="foto_tailor">
					</li>
					<li>
						<label for="video_tailor">Video : </label>
						<input type="file" name="video_tailor" id="video_tailor">
					</li>
					<li>
						<button type="submit" name="tambah">Add Tailor</button>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>