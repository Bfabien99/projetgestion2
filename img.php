<?php
    require 'dbconnect.php';
    if (isset($_POST['connect'])) {
        $connect = databaseConnect();
        $query = $connect->prepare('SELECT * FROM admin');
        $query->execute();
        $admin = $query->fetch(PDO::FETCH_ASSOC);
        if ($_POST['pass'] === $admin['password'] && $_POST['identifiant'] === $admin['pseudo']) {
            header("location:dashboard.php?adminid={$admin['id']}");
        }
        else {
            require 'login.php';
            echo "Wrong password or identifiant";
        }
    }
    
?>