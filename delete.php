<?php
require 'dbconnect.php';
    if (isset($_GET['articleid'])) {
        echo $_GET['articleid'];
        $connect = databaseConnect();
        $req = $connect->prepare('DELETE FROM proprietes WHERE id=:id');
        $req->execute([
            'id' => $_GET['articleid'],
        ]);
    }