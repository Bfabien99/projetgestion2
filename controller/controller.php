<?php 
    require 'model/model.php';

    //updateAdmin.php
    if (isset($_GET['error'])) {
        echo $_GET['error'];
    }
    $id;
        if (isset($_GET['adminid'])) {
            $id = $_GET['adminid'];
            if (isset($_POST['update'])) {
                //controle de securité pour comparer les mots de passe.
                adminUpdate();
            }
        }

    //login.php
    function login()
    {if (isset($_POST['connect'])) {
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
    }};

    //Delete.php
    function deleteProperty(){if (isset($_GET['articleid'])) {
        $connect = databaseConnect();
        $req = $connect->prepare('DELETE FROM proprietes WHERE id=:id');
        $req->execute([
            'id' => $_GET['articleid'],
        ]);
    }};

    //editProperty.php
    function EditProperty(){
        if (isset($_GET['articleid']) && isset($_POST['submit'])) {
            updateProperty();
        }
    }

    //Form.php
    function addProperty(){if (isset($_POST['Oname']) && isset($_FILES['picture'])) 
    {   
        addtodb();
    }};

    //proprietes.php
    function viewAllproprerties(){if (isset($_GET['error'])) {
        echo $_GET['error'];
    }
    
    if (isset($_POST['search'])) {
        header("location:index.php?q={$_POST['search']}");
    }
    
    if (isset($_GET['q'])) {
        $q = $_GET['q'];
        $connect = databaseConnect();
        $query = $connect->prepare("SELECT * FROM proprietes  WHERE price <= :prix OR location =:location");
        $query->execute([
            'prix' => $q,
            'location' => $q
        ]);
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    }else {
        $connect = databaseConnect();
        $query = $connect->prepare("SELECT * FROM proprietes  ORDER BY postdate ASC");
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }};

    //show.php
    function showProperty(){if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $connect = databaseConnect();
        $req = $connect->prepare("SELECT * FROM proprietes WHERE id = :id ");
        $req->execute([
            'id'=>$id,
        ]);
        $show = $req->fetch(); 
        return $show;
    }};

//Dashboard
function Dashboard(){
    if (isset($_GET['adminid'])) {
        $id = $_GET['adminid'];
    }
    $connect = databaseConnect();
    $query = $connect->prepare("SELECT * FROM proprietes  ORDER BY postdate ASC");
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}


//Index.php
function home(){if (isset($_GET['error'])) {
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
    return $articles;
}}