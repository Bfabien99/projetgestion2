<?php
    require '../controller/controller.php';
    login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="form-group">
                <label for="identifiant">Identifiant</label>
                <input type="text" name="identifiant" placeholder="Identifiant">
            </div>
            
            <div class="form-group">
                <label for="motdepasse">Mot de passe</label>
                <input type="password" name="pass" placeholder="Mot de passe">
            </div>

            <div class="formbottom">
                <a href="index.php">Invité</a>
                <a href="forget.php">Mot de passe oublié</a>
            </div>
            <input type="submit" name="connect" value="Connexion" class="submit">
        </form>
    </div>
</body>
</html>