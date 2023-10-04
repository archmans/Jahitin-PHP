<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}

require 'functionsReview.php';

$id = $_GET["id"];

if( isset($_POST["tambah"]) ) {
	if( addReview($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../reviewPage.php';
            </script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = '../reviewPage.php';
		</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Review Tailor</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..\styles\homepage.css">
    <link rel="stylesheet" href="..\styles\addReview.css">

</head>
<body>
	<div class="back-container">
		<a href="../reviewPage.php">Back</a>
	</div>
	<div class="bangs">
		<p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
	</div>
	<nav>
		<div class="logo">
			<img src="..\assets\logo.png" alt="logo jahitin"/>
		</div>
		<ul>
			<li><a href="..\homepageUser.php">Home</a></li>
			<li><a href="profilePage.php">Profile</a></li>
			<li><a href="logoutBackend.php">Logout</a></li>
		</ul>
	</nav>
	<div class="search-results" style="margin-top: 0rem">
		<div class="line">
			<p>Add Review Tailor<span id="search-term-text"></span></p>
		</div>
	</div>
	<div class="container-review">
        <div class="card-review">
			<form action="" method="post" enctype="multipart/form-data">
				<ul>
					<input type="hidden" name="id" id="id" value="<?= $id; ?>">
					<li>
						<label for="ulasan">Ulasan : </label>
						<textarea type="text" name="ulasan" id="ulasan"></textarea>
					</li>
					<li>
						<label for="foto_ulasan">Foto : </label>
						<input type="file" name="foto_ulasan" id="foto_ulasan">
					</li>
					<li>
						<label for="video_ulasan">Video : </label>
						<input type="file" name="video_ulasan" id="video_ulasan">
					</li>
					<li>
						<button type="submit" id="submit" name="tambah">Add Review</button>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>