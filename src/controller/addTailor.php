<?php 
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
	<title>Tambah Data Tailor</title>
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body>
	<h1>Tambah Data Tailor</h1>
	<a href="../homePage.php">Back</a>
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
				<button type="submit" name="tambah">Tambah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>