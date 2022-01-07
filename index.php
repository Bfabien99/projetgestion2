<?php
require 'dbconnect.php';
if (isset($_GET['error'])) {
    echo $_GET['error'];
}
else{
    
}
if (isset($_POST['search']) && !empty($_POST['search'])) {
    header("location:index.php?q={$_POST['search']}");
}

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    $s = '%'. $q . '%';
    $connect = databaseConnect();
    $query = $connect->prepare("SELECT * FROM proprietes  WHERE price <= :prix OR location LIKE :location");
    $query->execute([
        'prix' => $q,
        'location' => $s
    ]);
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
}else {
    $connect = databaseConnect();
    $query = $connect->prepare("SELECT * FROM proprietes  ORDER BY postdate ASC LIMIT 8");
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="login.php">Connexion (réservé à l'admin)</a></li>
                <li><a href="proprietes.php">Toutes les propriétés</a></li>
            </ul>
            <form action="" method="post">
                <input type="search" name="search" id="">
                <input type="submit" value="search">
            </form>
        </nav>

        <div class="box">
            <?php foreach($articles as $article): ?>
                <a href="show.php?id=<?=$article['id']?>">
                <div class="box-cont">
                
                    <img src="upload/<?= $article['picture']?>" alt="" width="100%">
                    <h2>Propriétaire :<?= $article['ownername'] ?></h2>
                    <h2>Superficie :<?= $article['area'] ?> m²</h2>
                    <h2>Lieu :<?= $article['location'] ?></h2>
                    
            </div>
            </a>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>