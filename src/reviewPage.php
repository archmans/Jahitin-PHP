<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}

require 'controller/functions.php';

$idPenjahit = $_GET["id"];
$review = query("select * from review where penjahitID = $idPenjahit");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Review</title>
</head>
<body>
<h1>Review Penjahit</h1>
<a href="homePage.php">Back</a>
<br><br>
<a href="controller/addReview.php?id=<?php echo $idPenjahit; ?>">Add Review</a>
<br><br>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>No</th>
		<th>Action</th>
		<th>Ulasan</th>
		<th>Foto</th>
		<th>Video</th>
	</tr>
	<?php if ($review == null) { ?>
	<tr>
		<td colspan="5" align="center">Review not found</td>
	</tr>
	<?php } ?>
	<?php $i = 1; ?>
	<?php foreach( $review as $row ) { ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="controller/updateReview.php?id=<?php echo $row["reviewID"]; ?>">Update</a> | <a href="controller/deleteReview.php?id=<?= $row["reviewID"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
		</td>
		<td><?= $row["ulasan"]; ?></td>
		<td><img src="img/<?= $row["foto_ulasan"]; ?>" width="240"></td>
		<td><video src="vid/<?= $row["video_ulasan"]; ?>" width="240" controls></td>
	</tr>
	<?php $i++; ?>
	<?php } ?>
</table>

</body>
</html>