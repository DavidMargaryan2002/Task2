<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="Css/update.css" type="text/css">
</head>
<body>
<div class="container">
    <h1 class="h1Update">Update Page</h1>
</div>
<?php foreach ($_SESSION['array'] as $post):?>
    <form action="Controller/methods.php?id=<?= $post['post_id']?>&action=View" method="post" class="update-form">
        <input type="hidden" name="post_id" value="<?= $post['post_id']?>">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $post['title'] ?>" placeholder="Enter title...">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" placeholder="Enter content..."><?= $post['content']?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="Update"  class="update-btn">Update</button>
        </div>
    </form>
<?php endforeach;?>

</body>
</html>
