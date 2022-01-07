<?php
    $id;
    require 'dbconnect.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $connect = databaseConnect();
        $req = $connect->prepare("SELECT * FROM proprietes WHERE id = :id ");
        $req->execute([
            'id'=>$id,
        ]);
        $show = $req->fetch(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
</head>
<body>
    <div class="container">
        <img src="upload/<?= $show->picture; ?>" alt="" width="200px">
        <h3>Propriétaire = <?= $show->ownername; ?> </h3>
        <h3>Contact = <?= $show->ownertel; ?> </h3>
        <h3>Localisation = <?= $show->location; ?> </h3>
        <h3>Superficie = <?= $show->area; ?> m2</h3>
        <h3>Prix = <?= number_format($show->price, 0, '.', '.'); ?> Fcfa</h3>
        <h3>Détails = <?= $show->details; ?> </h3>
    </div>
    <a href="index.php">retour</a>
</body>
</html>
