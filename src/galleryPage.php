<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: loginPage.php");
	exit;
}

include 'controller/functions.php';

$idPenjahit = $_GET["id"];
$review = query("select * from review where penjahitID = $idPenjahit");
// mendapatkan nama penjahit
$penjahit = query("select * from tailor where tailorID = $idPenjahit");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Review</title>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles\homepage.css">
    <link rel="stylesheet" href="styles\galleryPage.css">
</head>

<body>
	<div class="container">
		<div class="bangs">
			<p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
		</div>
		<nav>
			<div class="nav-left">
                <a href="tailorPremPage.php" class="arrow-left-button">
                    <img src="assets\arrow-left-32.png" alt="arrow-left"/>
                </a>
			</div>
			<div class="logo">
				<img src="assets\logo.png" alt="logo jahitin"/>
			</div>
			<div class="nav-right">
				<ul>
					<li><a href="homepageUser.php">Home</a></li>
                    <li><a href="tailorPremPage.php" style="color: #279864">Premium</a></li>
					<li><a href="profilPage.php">Profile</a></li>
					<li><a href="controller/logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		<div class="container-title">
			<div class="line-left"></div>
			<div class="title">
                <p><?php echo $penjahit[0]["nama"];?>'s Gallery</p>
			</div>
			<div class="line-right"></div>
		</div>
	</div>

    <div class="container-gallery">
        <div class="container-media-gallery">
            <div class="container-image">
                <h2>Image</h2>
                <div class="line"></div>
                <div class="image-grid">
                    <div class="image-item">
                        <img src="img/<?php echo $penjahit[0]["foto_tailor"];?>" alt="<?php echo $penjahit[0]["nama"];?>" class="image-gallery">
                        <p class="image-title"><?php echo $penjahit[0]["nama"];?></p>
                    </div>
                    <div class="image-item">
                        <img src="img/<?php echo $penjahit[0]["foto_tailor"];?>" alt="<?php echo $penjahit[0]["nama"];?>" class="image-gallery">
                        <p class="image-title"><?php echo $penjahit[0]["nama"];?></p>
                    </div>
                    <div class="image-item">
                        <img src="img/<?php echo $penjahit[0]["foto_tailor"];?>" alt="<?php echo $penjahit[0]["nama"];?>" class="image-gallery">
                        <p class="image-title"><?php echo $penjahit[0]["nama"];?></p>
                    </div>
                    <div class="image-item">
                        <img src="img/<?php echo $penjahit[0]["foto_tailor"];?>" alt="<?php echo $penjahit[0]["nama"];?>" class="image-gallery">
                        <p class="image-title"><?php echo $penjahit[0]["nama"];?></p>
                    </div>
                    <div class="image-item">
                        <img src="img/<?php echo $penjahit[0]["foto_tailor"];?>" alt="<?php echo $penjahit[0]["nama"];?>" class="image-gallery">
                        <p class="image-title"><?php echo $penjahit[0]["nama"];?></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</body>

</html>