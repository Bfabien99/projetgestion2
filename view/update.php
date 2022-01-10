<?php
require '../controller/controller.php';

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin info</title>
</head>
<body>
    <div class="container">
        <form enctype="multipart/form-data" action="" method="POST">
        <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" placeholder="Votre nom">
            </div>

            <div class="form-group">
                <label for="pseudo">identifiant</label>
                <input type="text" name="identifiant" placeholder="Votre identifiant">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Votre email">
            </div>

            <div class="form-group">
                <label for="contact">Numéro</label>
                <input type="text" name="tel" placeholder="Votre contact">
            </div>

            <div class="form-group">
                <label for="picture">Image</label>
                <input type="file" name="picture" >
            </div>

            <div class="form-group">
                <label for="Oldpass">Ancien mot de passe</label>
                <input type="text" name="oldpass" placeholder="Votre ancien mot de passe">
            </div>

            <div class="form-group">
                <label for="motdepasse">Nouveau mot de passe</label>
                <input type="text" name="pass" placeholder="Nouveau mot de passe">
            </div>

            <div class="form-group">
                <label for="newpass">Confirmer le nouveau mot de passe</label>
                <input type="text" name="newpass" placeholder="Entrer votre nouveau mot de passe">
            </div>

            <input type="submit" name="update" value="Sauvegarder" class="update">
        </form>
        <a href="dashboard.php?adminid=<?=$id?>">retour</a>
    </div>
</body>
</html>