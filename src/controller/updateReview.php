<?php 
require 'functionsReview.php';

$reviewID = $_GET["id"];
$review = query("SELECT * FROM review WHERE reviewID = $reviewID")[0];
$penjahitID = $review["penjahitID"];

if( isset($_POST["update"]) ) {
	if( updateReview($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil diupdate!');
				document.location.href = '../reviewPage.php?id=$penjahitID';
			</script>";
	} else {
		echo "<script>
				alert('masukkan data dengan benar, data gagal diupdate!');
				document.location.href = 'updateReview.php?id=$reviewID';
			</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Review</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..\styles\homepage.css">
    <link rel="stylesheet" href="..\styles\addTailor.css">
</head>
<body>
	<div class="back-container">
		<a href=../reviewPage.php">Back</a>
	</div>
	<div class="bangs">
		<p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
	</div>
	<nav>
		<div class="logo">
			<img src="..\assets\logo.png" alt="logo jahitin"/>
		</div>
		<ul>
			<li><a href="homePage.php">Home</a></li>
			<li><a href="profilePage.php">Profile</a></li>
			<li><a href="logoutBackend.php">Logout</a></li>
		</ul>
	</nav>
	<div class="search-results" style="margin-top: 0rem">
		<div class="line">
			<p>Update Review<span id="search-term-text"></span></p>
		</div>
	</div>
	<div class="container-tailor">
        <div class="card-tailor">
			<form action="" method="post" enctype="multipart/form-data">
				<ul>
						<input type="hidden" name="id" value="<?php echo $review["reviewID"]; ?>">
						<input type="hidden" name="penjahitID" value="<?php echo $review["penjahitID"]; ?>">
						<input type="hidden" name="oldFoto" value="<?php echo $review["foto_ulasan"]; ?>">
						<input type="hidden" name="oldVideo" value="<?php echo $review["video_ulasan"]; ?>">
					<li>
						<label for="ulasan">Ulasan : </label>
						<input type="text" name="ulasan" id="ulasan" value="<?php echo $review["ulasan"]; ?>">
					</li>
					<li>
						<label for="foto_ulasan">Picture : </label>
						<img src="../img/<?= $review["foto_ulasan"]; ?>" width="100"></img>
						<br>
						<input type="file" name="foto_ulasan" id="foto_ulasan">
					</li>
					<br>
					<li>
						<label for="video_ulasan">Video : </label>
						<video src="../vid/<?= $review["video_ulasan"]; ?>" width="100">
						</video><br>
						<input type="file" name="video_ulasan" id="video_ulasan">
					</li>
					<li>
						<button type="submit" id="submit" name="update">Update Review</button>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>