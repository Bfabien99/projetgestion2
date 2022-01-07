<?php 
    require 'dbconnect.php';
    if (isset($_POST['Oname']) && isset($_FILES['picture'])) 
    {   
        addtodb();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Formulaire</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <a href="index.php">Retour</a>
            <h3>Information relative à la propriété</h3>
        </div>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="Oname" placeholder="Nom du vendeur">
            </div>

            <div class="form-group">
                <label for="tel">Contact</label>
                <input type="number" name="Otel" placeholder="Contact du vendeur">
            </div>

            <div class="line"></div>

            <div class="form-group">
                <label for="picture">Image</label>
                <input type="file" name="picture" >
            </div>

            <div class="form-group">
                <label for="location">Localisation</label>
                <input type="text" name="location" placeholder="où se situe la propriété ?">
            </div>

            <div class="form-group">
                <label for="area">Superficie</label>
                <input type="number" name="area" placeholder="Superficie de la propriété">
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <textarea name="details" cols="30" rows="10" placeholder="Détails de la proprité"></textarea>
            </div>

            <div class="form-group">
                <label for="price">Prix</label>
                <input type="text" name="price" placeholder="Prix de la propriété">
            </div>

            <div class="line"></div>

            <input type="submit" value="Envoyer" name="submit" class="submit">
        </form>
    </div>
</body>
</html>