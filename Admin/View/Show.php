<?php
session_start();
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/show.css" type="text/css">
</head>
<body>
<div class="container">
    <?php foreach ($_SESSION['array'] as $post): ?>
        <div class="logo">
            <h1>Show Page</h1>
        </div>
        <div class="post">
            <h1><?= htmlspecialchars($post['title']) ?></h1>
            <p><?= htmlspecialchars($post['content']) ?></p>
            <a href="Update.php" class="action-link">Update</a>
            <a href="../Controller/methods.php?id=<?= $post['post_id'] ?>&action=Delete" class="action-link">Delete</a>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
