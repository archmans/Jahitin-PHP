<?php
    include('backend/registerBackend.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/formGuest.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
    <form action="backend/registerBackend.php" method="POST" class='login-email'>
            <p style="font-size: 2rem; font-weight: 850;">REGISTER</p>
            <div class="input-group">
                <input type="text" placeholder="Username" id='username' name="username" required>
                <span id="errorMsgUsername"></span>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" id='email' required>
                <span id="errorMsgEmail"></span>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" id='password' name="password" required>
                <span id="errorMsgPassword1"></span>
            </div>
            <div class="input-group">
                <button type="submit" id='submit' name="register" class="btn">Register</button>
            </div>
            <p class="login-register-text">Already Have an Account? <a href="login.php">Login Here</a>.</p>
        </form>
    </div>
</body>
</html>