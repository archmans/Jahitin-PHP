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
	<form action="" method="post">
		<ul>
				<input type="hidden" name="id" value="<?php echo $tailor["tailorID"]; ?>">
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
				<input type="text" name="foto_tailor" id="foto_tailor" value="<?php echo $tailor["foto_tailor"]; ?>">
			</li>
            <li>
				<label for="video_tailor">Video : </label>
				<input type="text" name="video_tailor" id="video_tailor" value="<?php echo $tailor["video_tailor"]; ?>">
			</li>
			<li>
				<button type="submit" id="submit" name="update">Update Data</button>
			</li>
		</ul>
	</form>
</body>
</html>