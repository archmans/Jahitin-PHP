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
	<title>Update Data Review</title>
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body>
	<h1>Update Review</h1>
	<a href="../reviewPage.php?id=<?php echo $penjahitID; ?>">Back</a>
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
				<button type="submit" id="submit" name="update">Update Data</button>
			</li>
		</ul>
	</form>
</body>
</html>