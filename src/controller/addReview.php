<?php 
require 'functionsReview.php';

$penjahitID = $_GET["id"];

if( isset($_POST["tambah"]) ) {
	if( addReview($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../reviewPage.php?id=$penjahitID';
            </script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'addReview.php?id=$penjahitID';
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Review Tailor</title>
	<style>
		ul li { list-style: none; }
	</style>
</head>
<body>
	<h1>Tambah Data Tailor</h1>
	<a href="../reviewPage.php?id=<?php echo $penjahitID; ?>">Back</a>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<input type="hidden" name="id" id="id" value="<?= $id; ?>">
			<li>
				<label for="ulasan">Ulasan : </label>
				<input type="text" name="ulasan" id="ulasan">
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
				<button type="submit" id="submit" name="tambah">Tambah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>