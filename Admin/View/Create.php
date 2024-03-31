<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../Css/create.css" type="text/css">
</head>
<body>
<div class="header">
    <h1>Create Page</h1>
</div>
<div class="container">
    <form action="../Controller/methods.php?action=View" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="input-field" placeholder="Enter title...">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" class="textarea-field" placeholder="Enter content..."></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="Create" class="submit-btn">Create</button>
        </div>
    </form>
    <div class="error">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message">
                <h2>Error!</h2>
                <p><?= $_SESSION['error']; ?></p>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
