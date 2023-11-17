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
    <link rel="stylesheet" href="styles\premium.css">
    <title>Premium Tailor</title>
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
                    <li><a href="premiumPage.php" style="color: #279864">Premium</a></li>
                    <li><a href="profilPage.php">Profile</a></li>
                    <li><a href="controller/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-title">
            <div class="line-left"></div>
            <div class="title">
                <p>Premium Tailor</p>
            </div>
            <div class="line-right"></div>
        </div>
    </div>

    <div class="premium-tailor-list" id="search-results-list">
        <?php $i = 1; ?>
        <?php foreach( $tailor as $row ) { ?>
            <div class="premium-tailor" >
                <h4 class="tailor-name"><?= $row["nama"]; ?></h4>
                <a class="button-see-gallery" id="subscribe-button" href="galleryPage.php?id=<?php echo $row["tailorID"]; ?>">See Gallery</a>
            </div>
            <?php $i++; ?>
        <?php } ?>
    </div>

    <div class="belum-premium">
        <h2>Find Your Perfect Tailor</h2>
        <p>See their gallery to find your perfect tailor!</p>
        <!-- button subscribe -->
        <a class="button-subscribe">SUBSCRIBE</a>
        <p class="pending">PENDING</p>
    </div>
</body>

<style>
    .logo {
        padding-left: 3rem;
    }

</style>

</html>   