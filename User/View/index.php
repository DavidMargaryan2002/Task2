<?php
session_start();
require_once '../Model/Model.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/style.css" type="text/css">
</head>
<body>

<?php
$posts = $_SESSION['post'];
foreach ($posts as $post): ?>
    <div class="container">
        <h1><?=$post['title'] ?></h1>
        <div class="full-text">
            <p><?=$post['content'] ?></p>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>