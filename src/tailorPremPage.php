<?php
session_start();
if ($_SESSION["role"] != "user") {
    header("location: loginPage.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("location: loginPage.php");
    exit;
}

include 'controller/functions.php';
$tailor = query("select * from tailor");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles\homepage.css">
    <link rel="stylesheet" href="styles\listTailor.css">

    <title>Tailor Premium</title>
</head>

<body>
    <div class="container">
        <div class="bangs">
            <p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
        </div>
        <nav>
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
                <p>Premium Tailors</p>
            </div>
            <div class="line-right"></div>
        </div>
    </div>

    <div class="search-results-list" id="search-results-list">
        <ul class="tailor-list">
            <?php $i = 1; ?>
            <?php foreach( $tailor as $row ) { ?>
                <li class="tailor-item" >
                    <div class="tailor-card">
                    <div class="tailor-media">
                        <img src="img/<?= $row["foto_tailor"]; ?>" alt="<?= $row["nama"]; ?>" class="tailor-photo">
                    </div>
                    <div class="tailor-info">
                        <h1 class="tailor-name"><?= $row["nama"]; ?></h1>
                        <h2>Address</h2>
                        <p class="tailor-address"><?= $row["alamat"]; ?></p>
                        <h2>Category</h2>
                        <p class="tailor-category"><?= $row["jenis"]; ?></p>
                        <h2>Review</h2>
                        <a class="button" href="reviewPage.php?id=<?php echo $row["tailorID"]; ?>">Tailor's Review</a>
                        <h2>Karya</h2>
                        <a class="button" href="#popupVid<?= $i ?>">Video Karya Penjahit</a>
                        <div id="popupVid<?= $i ?>" class="overlay">
                            <div class="container-popUp">
                                <div class="close">
                                    <a class="x" href="" onclick="closePopupVid(<?= $i ?>)">&times;</a>
                                </div>
                                <div class="popup">
                                    <h1><?= $row["nama"]; ?></h1>
                                    <div class="content">
                                        <video src="vid/<?= $row["video_tailor"]; ?>" id="vid<?= $i ?>" style="max-height: 450px;" controls></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="button-premium">
                            <!-- <button class="button-subscribe" id="subscribe-button">Subscribe</button>
                            <button class="button-pending" id="subscribe-button">PENDING</button> -->
                            <a class="button-see-gallery" id="subscribe-button" href="galleryPage.php?id=<?php echo $row["tailorID"]; ?>">See Gallery</a>
                        </div>  
                    </div>
                </div>
                </li>
                <?php $i++; ?>
            <?php } ?>
        </ul>
    </div>
</body>

<style>
    .logo {
        padding-left: 3rem;
    }
</style>

</html>   