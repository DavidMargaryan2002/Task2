<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../Css/navbar.css" type="text/css">
</head>
<body>
<nav class="navbar">
       <a href="index.php" class="navbar-link">Home</a>
    <a href="../../User/View/index.php" class="navbar-link">User Page</a>
        <form action="../Controller/methods.php" method="post">
            <button type="submit" name="logout">Log Out</button>
        </form>
</nav>

</body>
</html>
