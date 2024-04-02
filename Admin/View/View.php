<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="Css/viewIndex.css" type="text/css">
    <link rel="stylesheet" href="Css/adminPage.css" type="text/css">
</head>
<body>

<h1>Admin</h1>

<div class="icon-group">
    <a href="Controller/checkInclude.php?action=Create">Create</a>
</div>

<table>
    <tr>
        <th>Վերնագիր</th>
        <th>Նյութ</th>
        <th>Ֆունկցիաներ</th>
    </tr>
    <?php foreach ($_SESSION['post'] as $post):?>
        <tr>
            <td><?= mb_substr($post['title'], 0, 50) ?></td>
            <td><?= mb_substr($post['content'], 0, 150) . '...' ?></td>
            <td>
                <div class="icon-group">
                    <a href="Controller/checkInclude.php?id=<?= $post['post_id'] ?>&action=Show">Show</a>
                    <a href="Controller/checkInclude.php?id=<?= $post['post_id'] ?>&action=Update">Update</a>
                    <form action="Controller/methods.php?id=<?= $post['post_id'] ?>&action=View" method="post">
                            <button name="Delete">Delete</button>
                    </form>

                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
