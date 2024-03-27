<?php
session_start();
require_once '../Model/Model.php';

if (!isset($_SESSION["id"])) {
    header('Location:../index.php');
    exit();
}
if (isset($_POST['btn_submit'])) {
    if (isset($_POST['title'], $_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $model = Model::getInstance();
        $model->insertPost($title, $content);
        header('Location: adminPage.php');
        exit();
    } else {
        $_SESSION['error'] = 'Title and content are required.';
        header('Location: adminPage.php');
        exit();
    }
}
$model = Model::getInstance();
$posts = $model->getPost();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../Css/adminPage.css" type="text/css">
</head>
<body>
<div>
    <form action="../Controller/logOut.php" method="post">
        <div class="form-group">
            <button type="submit" class="logout" name="logout">Log Out</button>
        </div>
    </form>
</div>
<div class="container">
    <form action="../Controller/addPost.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter title...">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" placeholder="Enter content..."></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="btn_submit">Submit</button>
        </div>
    </form>
    <div class="error">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message">
                <h2>Error!</h2>
                <p><?= $_SESSION['error']; ?></p>
            </div>
            <?php
            unset($_SESSION['error']);
        endif; ?>
    </div>
</div>
    <form action='../Controller/delPost.php' method='post'>
        <?php foreach ($posts as $post): ?>
        <div class="container">
            <div class="post">
                <h2><?= htmlspecialchars($post['title']); ?></h2>
                <p><?= htmlspecialchars($post['content']); ?></p>
                <button type="submit" name="delete" value="<?= $post['post_id']; ?>">Delete</button>
            </div>
        </div>
        <?php endforeach; ?>
    </form>

</body>
</html>
