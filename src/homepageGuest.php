<?php
    require_once('config/config.php');
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    echo "<h1>Daftar User</h1>";
    foreach ($result as $user) {
        echo "<ul>";
            echo "<li>" . $user['id'] . "</li>";
            echo "<li>" . $user['email'] . "</li>";
            echo "<li>" . $user['name'] . "</li>";
            echo "<li>" . $user['password'] . "</li>";
        echo "</ul>";
    }
?>
