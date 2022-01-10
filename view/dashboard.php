<?php
require '../controller/controller.php';
$articles = Dashboard();
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
    <div class="box">
            <?php foreach($articles as $article): ?>
                <a href="show.php?id=<?=$article['id']?>">
                <div class="box-cont">
                
                    <img src="upload/<?= $article['picture']?>" alt="" width="50%">
                    <h2>Propriétaire :<?= $article['ownername'] ?></h2>
                    <h2>Superficie :<?= $article['area'] ?> m²</h2>
                    <h2>Lieu :<?= $article['location'] ?></h2>
                    <a href="delete.php?articleid=<?=$article['id']?>">supprimer</a>
                    <a href="editProperty.php?articleid=<?=$article['id']?>">modifier</a>
                    
            </div>
            </a>
            <?php endforeach;?>
        </div>
</body>
</html>