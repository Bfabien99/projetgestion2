<?php
$id;
    if (isset($_GET['adminid'])) {
        $id = $_GET['adminid'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Admin dashboard</h1>
    <a href="form.php">Ajouter article</a>
    <a href="update.php?adminid=<?=$id?>">Modifier info admin</a>
</body>
</html>