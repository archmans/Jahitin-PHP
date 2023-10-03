<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}

require 'controller/functions.php';

if( isset($_POST["search"]) ) {
	$tailor = search($_POST["keyword"]);
}

// pagination
$countDataperPage = 1;
$countData = count(query("SELECT * FROM tailor"));
$pages = ceil($countData / $countDataperPage);
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$firstData = ($countDataperPage * $activePage) - $countDataperPage;

$tailor = query("SELECT * FROM tailor LIMIT $firstData, $countDataperPage");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<a href="manageUser.php">Manage User</a>

<h1>List Tailor</h1>

<a href="controller/addTailor.php">Add Tailor</a>
<br><br>
<a href="profilPage.php">Profil</a>
<br><br>
<a href="backend/logout.php">Logout</a>

<br><br>
<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="input search keywords" autocomplete="off" id="keyword">
	<button type="submit" id="searchbutton" name="search">Search</button>
</form>
<br><br>

<!-- navigation -->

<?php if ( $activePage > 1 ) : ?>
	<a href="?page=<?= $activePage - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $pages; $i++ ) : ?>
	<?php if( $i == $activePage ) : ?>
		<a href="?page=<?= $i; ?>" style="font-weight: bold; color: green;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?page=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if ( $activePage < $pages ) : ?>
	<a href="?page=<?= $activePage + 1; ?>">&raquo;</a>
<?php endif; ?>

<div id="container">
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
		<td><a href="controller/updateTailor.php?id=<?php echo $row["tailorID"]; ?>">Update</a> | <a href="controller/deleteTailor.php?id=<?php echo $row["tailorID"]; ?>" onclick="return confirm('yakin?')">Delete</a> | <a href="reviewPage.php?id=<?php echo $row["tailorID"]; ?>">Review</a></td>
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
</div>
<script src="js/script.js"></script>
</body>
</html>