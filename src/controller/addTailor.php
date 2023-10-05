<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}
require 'functions.php';

if( isset($_POST["tambah"]) ) {
	if( addTailor($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../homepageAdmin.php';
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
< lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add Tailor</title>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..\styles\homepage.css">
    <link rel="stylesheet" href="..\styles\addUpdateForm.css">
</head>

<body>
	<div class="bangs">
        <p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
    </div>
    <nav>
        <div class="nav-left">
            <a href="..\homepageAdmin.php">Back</a>
        </div>
        <div class="logo">
            <img src="..\assets\logo.png" alt="logo jahitin"/>
        </div>
        <div class="nav-right">
            <ul>
				<li><a href="..\homepageAdmin.php">Tailor</a></li>
				<li><a href="..\manageUser.php">User</a></li>
				<li><a href="..\backend\logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<div class="container-title">
        <div class="line-left"></div>
        <div class="title">
            <p>Add Tailor</p>
        </div>
        <div class="line-right"></div>
    </div>
	<div class="container-form">
        <div class="card-form">
			<form action="" method="post" enctype="multipart/form-data">
				<ul>
					<div class="form-input" style="flex-direction: column">
						<div class="form-input-text">
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
						</div>
						<div class="form-media" style="padding-left: 0">
							<li>
								<label for="foto_tailor">Foto : </label>
								<input type="file" name="foto_tailor" id="foto_tailor">
							</li>
							<li>
								<label for="video_tailor">Video : </label>
								<input type="file" name="video_tailor" id="video_tailor">
							</li>
						</div>
						<div class="form-button">
							<li>
								<button type="submit" name="tambah">Add Tailor</button>
							</li>
						</div>
					</div>
				</ul>
			</form>
		</div>
	</div>
</body>

</html>