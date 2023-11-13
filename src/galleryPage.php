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
        <div class="container-about">
            <img src="img/<?php echo $penjahit[0]["foto_tailor"];?>" alt="<?php echo $penjahit[0]["nama"];?>" class="profil-photo">
            <div class="about">
                <h2>About</h2>
                <div class="line"></div>
                <p><?php echo $penjahit[0]["nama"];?> merupakan layanan jasa jahit kategori <?php echo $penjahit[0]["jenis"];?> yang berlokasi di <?php echo $penjahit[0]["alamat"];?>. <a href="reviewPage.php?id=<?php echo $idPenjahit; ?>" class="button-review">See Reviews</a>.</p>
            </div>
        </div>
        <div class="container-media-gallery">
            <div class="container-video">
                <h2>Video</h2>
                <div class="line"></div>
                <div class="video-gallery">
                    <video src="vid/<?= $row["video_tailor"]; ?>" id="vid<?= $i ?>" style="max-width: 500px" controls></video>
                </div>
            </div>
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
<style>
    .container-gallery{
        display: flex;
        justify-content: space-around;
        margin-top: 3rem;
    }

    .image-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem; /* Jarak antar gambar */
        margin-top: 2rem;
    }

    .image-item {
        display: flex;
        flex-direction: column;
        width: calc(50% - 1rem); /* Lebar gambar setengah dari lebar container dengan jarak 10px */
        margin-bottom: 1rem; /* Jarak bawah antar baris gambar */
    }

    .image-gallery {
        width: 100%;
        object-fit: cover;
    }

    .image-title {
        font-size: 1rem;
        font-weight: bold;
        text-align: center;
        margin-top: 1rem;
    }
    .container-about{
        height: 10rem;
        width: 30%;
        padding: 0.5rem;
    }

    .container-about p{
        /* rata kanan kiri */
        text-align: justify;
        font-weight: normal;

    }

    .profil-photo{
        max-width: 100%;
        margin-bottom: 1rem;
    }

    .button-review {
        text-decoration: none;
        color: #279864;
        /* font-weight: bold; */
    }

    .button-review:hover {
        text-decoration: underline;
    }

    .container-media-gallery{
        height:200rem;
        width: 60%;
        padding: 0.5rem;

    }

    .video-gallery{ 
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .line {
        width: 100%;
        height: 0.2rem;
        background-color: black;
        margin: 0.5rem 0rem;
    }

    @media (max-width: 750px) {
        .container-gallery {
            flex-direction: column;
            align-items: center;
        }
        .container-about {
            position: static;
            top: 0px;
            height: auto;
            display: flex;
            flex-direction: row;
            width: auto;
            justify-content: center
        }
        .profil-photo {
            max-width: 40%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        .about {
            width: 50%;
            padding-left: 1rem;
        }
        .container-media-gallery {
            height: auto;
            width: 90%;
            padding: 0.5rem;
        }
        .image-grid {
            gap: 0.5rem;
        }
        .image-item {
            width: calc(50% - 0.5rem);
        }
    }
</style>

</html>