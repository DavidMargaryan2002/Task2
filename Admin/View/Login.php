
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Css/login.css" type="text/css">
</head>
<body>
<div class="big_div">
    <h2 class="title">Login Page</h2>
    <div class="small_div">
        <form method="post" action="index.php?action=View">
            <input type="text" class="email" name="email" placeholder="Email">
            <input type="password" class="password" name="password" placeholder="Password">
            <input type="hidden" name="action" value="btn_login">
            <button class="Btn_login" >Log In</button>
        </form>
        <div class="error_message">
            <?php
            if (isset($_SESSION['error'])):
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            endif;
            ?>
        </div>
    </div>
</div>
</body>
</html>
