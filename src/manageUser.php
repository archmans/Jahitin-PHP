<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}

require 'controller/functionsUser.php';

$user = query("select * from users");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Manage User</title>
</head>
<body>
<h1>Manage User</h1>
<a href="homePage.php">Back</a>
<br><br>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>No</th>
		<th>Aksi</th>
        <th>ID</th>
		<th>Email</th>
		<th>Username</th>
	</tr>
	<?php if ($user == null) { ?>
	<tr>
		<td colspan="4" align="center">User not found</td>
	</tr>
	<?php } ?>
	<?php $i = 1; ?>
	<?php foreach( $user as $row ) { ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="controller/deleteUser.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
		</td>
        <td><?= $row["id"]; ?></td>
		<td><?= $row["email"]; ?></td>
        <td><?= $row["username"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php } ?>
</table>

</body>
</html>