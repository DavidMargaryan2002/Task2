<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/show.css" type="text/css">
</head>
<body>
<div class="container">
    <?php foreach ($_SESSION['posts'] as $post):?>
        <div class="logo">
            <h1>Show Page</h1>
        </div>
        <div class="post">
            <h1><?= htmlspecialchars($post['title']) ?></h1>
            <p><?= htmlspecialchars($post['content']) ?></p>
            <a href="index.php?id=<?= $post['post_id'] ?>&action=updatePage">Update</a>
            <form action="index.php?id=<?= $post['post_id'] ?>&action=Delete" method="post">
                <button class="Delete" name="Delete">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
