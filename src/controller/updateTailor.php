<?php 
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
				alert('data gagal diupdate!');
				document.location.href = '../homePage.php';
			</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Data Tailor</title>
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body>
	<h1>Update Data Tailor</h1>
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
				<button type="submit" id="submit" name="update">Update Data</button>
			</li>
		</ul>
	</form>
</body>
</html>