<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Css/login.css" type="text/css">
</head>
<body>
<div class="big_div">
    <h2 class="title">Login Page</h2>
    <div class="small_div">
        <form method="post" action="Controller/checkLogin.php">
            <input type="text" class="email" name="email" placeholder="Email">
            <input type="password" class="password" name="password" placeholder="Password">
            <button class="Btn_login" name="btn_login">Log In</button>
        </form>
        <div class="error_message">
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            session_unset();
            ?>
        </div>
    </div>
</div>
</body>
</html>
