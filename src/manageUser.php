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
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="styles\homepage.css">
	<link rel="stylesheet" href="styles\manageUser.css">
</head>
<body>
	<div class="back-container">
		<a href="homepageAdmin.php">Back</a>
	</div>
	<div class="bangs">
		<p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
	</div>
	<nav>
		<div class="logo">
			<img src="assets\logo.png" alt="logo jahitin"/>
		</div>
		<ul>
			<li><a href="homepageAdmin.php">Tailor</a></li>
			<li><a href="manageUser.php" style="color: #279864">User</a></li>
			<li><a href="logoutBackend.php">Logout</a></li>
		</ul>
	</nav>
	<div class="search-results" style="margin-top: 0rem">
		<div class="line">
			<p>Manage User<span id="search-term-text"></span></p>
		</div>
	</div>
	<div class="styled-table-container">
		<table class="styled-table">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($user == null) { ?>
					<tr>
						<td colspan="5" align="center">User not found</td>
					</tr>
				<?php } ?>
				<?php $i = 1; ?>
				<?php foreach ($user as $row) { ?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $row["id"]; ?></td>
						<td><?= $row["username"]; ?></td>
						<td><?= $row["email"]; ?></td>
						<td>
							<a class="delete" href="controller/deleteUser.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure?');">
								<i class="far fa-trash-alt"></i> delete
							</a>
						</td>
					</tr>
					<?php $i++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>


</body>
</html>