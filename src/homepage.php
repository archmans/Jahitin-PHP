<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}

require 'controller/functions.php';
$tailor = query("select * from tailor");

if( isset($_POST["search"]) ) {
	$tailor = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>List Tailor</h1>

<a href="controller/addTailor.php">Add Tailor</a>
<br><br>
<a href="backend/logout.php">Logout</a>

<br><br>
<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="input search keywords" autocomplete="off">
	<button type="submit" name="search">Search</button>
</form>
<br><br>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>No</th>
		<th>Action</th>
		<th>Name</th>
		<th>Address</th>
		<th>Category</th>
		<th>Picture</th>
		<th>Video</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach( $tailor as $row ) { ?>
	<tr>
		<td><?= $i; ?></td>
		<td><a href="controller/updateTailor.php?id=<?php echo $row["tailorID"]; ?>">ubah</a> | <a href="controller/deleteTailor.php?id=<?php echo $row["tailorID"]; ?>" onclick="return confirm('yakin?')">hapus</a></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["alamat"]; ?></td>
		<td><?= $row["jenis"]; ?></td>
        <td>
			<img src="img/<?= $row["foto_tailor"]; ?>" height="240">
		</td>
        <td>
			<video src="vid/<?= $row["video_tailor"]; ?>" width="427" height="240" controls>
		</td>
	</tr>
	<?php $i++; ?>
	<?php } ?>
</table>


</body>
</html>