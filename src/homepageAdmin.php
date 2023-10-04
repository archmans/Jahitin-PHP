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

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles\homepage.css">
    <link rel="stylesheet" href="styles\homepageAdmin.css">
    <title>Homepage Admin</title>
</head>

<body>
    <div class="bangs">
        <p class="title"> Hi, <?php echo $_SESSION['username']; ?>! </p>
    </div>
    <nav>
        <div class="logo">
            <img src="assets\logo.png" alt="logo jahitin"/>
        </div>
        <ul>
            <li><a href="homePage.php" style="color:#279864">Tailor</a></li>
            <li><a href="manageUser.php">User</a></li>
            <li><a href="logoutBackend.php">Logout</a></li>
        </ul>
    </nav>
    <div class="search-container">
        <div class="search">
            <input type="text" class="search-input" id="search-term" placeholder="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>">
            <?php
            if (isset($_GET['search'])) {
                unset($_GET['search']);
            }
            ?>
            <div class="buttons-container">
                <div class="sort-filter">
                    <select class="search-option" id="sort-judul">
                        <option disabled selected value>Sort</option>
                        <option value="asc">Ascending (A to Z)</option>
                        <option value="desc">Descending (Z to A)</option>
                    </select>
                    <select class="search-option" id="filter-genre">
                        <option disabled selected value>Filter</option>
                        <option value="Costum">Custom Tailors</option>
                        <option value="Service">Service Tailor</option>
                    </select>
                </div>
                <div class="buttons">
                    <button class="btn" id="search-btn">Search</button>
                    <button class="btn" id="reset-btn">Reset</button>
                </div>
            </div>
        </div>
        <div class="search-results">
            <div class="line">
                <p>Tailors <span id="search-term-text"></span></p>
            </div>
            <!-- button add tailor -->
            <div class="add-tailor">
                <a href="controller/addTailor.php"> + Tambah Tailor</a>
            </div>

            <div class="search-results-list">
                <ul class="tailor-list">
                    <?php $i = 1; ?>
                    <?php foreach( $tailor as $row ) { ?>
                        <div class="tailor-card-actions">
                            <div class="tailor-card-number">
                                    <li class="tailor-item">
                                    <div class="tailor-counter"><?= $i; ?></div>
                                    <div class="tailor-card">
                                        <div class="tailor-media">
                                            <img src="img/<?= $row["foto_tailor"]; ?>" alt="<?= $row["nama"]; ?>" class="tailor-photo" style="width: auto; height: 100px;">
                                        </div>
                                        <div class="tailor-info">
                                            <h2 class="tailor-name"><?= $row["nama"]; ?></h2>
                                            <h5>Address</h5>
                                            <p class="tailor-address"><?= $row["alamat"]; ?></p>
                                            <h5>Category</h5>
                                            <p class="tailor-category"><?= $row["jenis"]; ?></p>
                                            <h5>Review</h5>
                                            <a class="button" href="reviewPage.php?id=<?php echo $row["tailorID"]; ?>">Tailor's Review</a>
                                            <h5>Karya</h5>
                                            <a class="button" href="#popup1">Video Karya Penjahit</a>
                                            <div id="popup1" class="overlay">
                                                <div class="container-popUp">
                                                    <div class="close">
                                                        <a class="x" href="#">&times;</a>
                                                    </div>
                                                    <div class="popup">
                                                        <h2><?= $row["nama"]; ?></h2>
                                                        <div class="content">
                                                            <video src="vid/<?= $row["video_tailor"]; ?>" style="width: auto; height: 200px" controls></video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </li>
                                </div>
                                <div class="tailor-actions">
                                    <a class="update" href="controller/updateTailor.php?id=<?php echo $row["tailorID"]; ?>">update</a>
                                    <a class="review" href="reviewPage.php?id=<?php echo $row["tailorID"]; ?>">review</a>
                                    <a class="delete" href="controller/deleteTailor.php?id=<?php echo $row["tailorID"]; ?>" onclick="return confirm('yakin?')">delete</a></td>
                                </div> 
                            </div>
                        <?php $i++; ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    


</body>