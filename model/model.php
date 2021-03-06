<?php
    function databaseConnect()
    {
        $dsn="mysql:dbname=projetimmobilier;host=localhost";
        $password = "";
        $user = "root";

        $connect = new PDO($dsn,$user,$password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);

        if (!$connect) 
        {
            return new \Exception("Database cannot connect");
        }
        else
        {   
            return $connect;
        }
    }



    function addtodb()
    {
            $img_name = $_FILES['picture']['name'];
            $img_size = $_FILES['picture']['size'];
            $tmp_name = $_FILES['picture']['tmp_name'];
            $error = $_FILES['picture']['error'];
    
            if($error === 0)
            {
                if ($img_size > 1250000) 
                {
                    $em = "Sorry your file is too large";
                    header("Location:index.php?error=$em");
                }
                else 
                {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
    
                    $allowed_exs = array("jpg", "png", "jpeg");
    
                    if(in_array($img_ex_lc, $allowed_exs))
                    {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'upload/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $db = databaseConnect();
                        $query = $db->prepare('INSERT INTO proprietes(ownername, ownertel, postdate, picture, details, price, location, area) VALUES (:name, :tel, :date, :picture, :details, :price, :location, :area)');
                        
                        $query->execute([
                        'name' => htmlspecialchars($_POST['Oname']),
                        'tel' => htmlspecialchars($_POST['Otel']),
                        'date' => date('Y-m-d'),
                        'picture' => $new_img_name,
                        'details' => strtolower(htmlspecialchars($_POST['details'])),
                        'price' => htmlspecialchars($_POST['price']),
                        'location' => strtolower(htmlspecialchars($_POST['location'])),
                        'area' => htmlspecialchars($_POST['area'])
                        ]);
                    }
                    else
                    {
                        $em = "Sorry your can't upload this type of file";
                        header("Location:index.php?error=$em");
                    }
                    
                }
            }
            else
            {
                $em = "Unknow error";
                header("Location:index.php?error=$em");
            }
    }



    function adminUpdate()
    {
            $img_name = $_FILES['picture']['name'];
            $img_size = $_FILES['picture']['size'];
            $tmp_name = $_FILES['picture']['tmp_name'];
            $error = $_FILES['picture']['error'];
    
            if($error === 0)
            {
                if ($img_size > 1250000) 
                {
                    $em = "Sorry your file is too large";
                    header("Location:update.php?error=$em");
                }
                else 
                {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
    
                    $allowed_exs = array("jpg", "png", "jpeg");
    
                    if(in_array($img_ex_lc, $allowed_exs))
                    {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'upload/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $db = databaseConnect();
                        $query = $db->prepare('UPDATE admin SET name=:name , pseudo=:identifiant , password=:pass , email=:email, tel=:tel, picture=:picture WHERE id =:id');
                        $query->execute([
                        'id' => $_GET['adminid'],
                        'name' => htmlspecialchars($_POST['name']),
                        'identifiant' => htmlspecialchars($_POST['identifiant']),
                        'pass' => htmlspecialchars($_POST['pass']),
                        'email' => htmlspecialchars($_POST['email']),
                        'tel' => htmlspecialchars($_POST['tel']),
                        'picture' => $new_img_name,
                        ]);
                    }
                    else
                    {
                        $em = "Sorry your can't upload this type of file";
                        header("Location:update.php?error=$em");
                    }
                    
                }
            }
            else
            {
                $db = databaseConnect();
                        $query = $db->prepare('UPDATE admin SET name=:name , pseudo=:identifiant , password=:pass , email=:email, tel=:tel WHERE id =:id');
                        $result = $query->execute([
                        'id' => $_GET['adminid'],
                        'name' => htmlspecialchars($_POST['name']),
                        'identifiant' => htmlspecialchars($_POST['identifiant']),
                        'pass' => htmlspecialchars($_POST['pass']),
                        'email' => htmlspecialchars($_POST['email']),
                        'tel' => htmlspecialchars($_POST['tel']),
                        ]);
            }
    }

    function updateProperty()
    {
            $img_name = $_FILES['picture']['name'];
            $img_size = $_FILES['picture']['size'];
            $tmp_name = $_FILES['picture']['tmp_name'];
            $error = $_FILES['picture']['error'];
    
            if($error === 0)
            {
                if ($img_size > 1250000) 
                {
                    $em = "Sorry your file is too large";
                    header("Location:index.php?error=$em");
                }
                else 
                {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
    
                    $allowed_exs = array("jpg", "png", "jpeg");
    
                    if(in_array($img_ex_lc, $allowed_exs))
                    {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'upload/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $db = databaseConnect();
                        $query = $db->prepare('UPDATE proprietes SET ownername=:name, ownertel=:tel, postdate=:date, picture=:picture, details=:details, price=:price, location=:location, area=:area WHERE id =:id');
                        
                        $query->execute([
                        'id' => $_GET['articleid'],
                        'name' => htmlspecialchars($_POST['Oname']),
                        'tel' => htmlspecialchars($_POST['Otel']),
                        'date' => date('Y-m-d'),
                        'picture' => $new_img_name,
                        'details' => strtolower(htmlspecialchars($_POST['details'])),
                        'price' => htmlspecialchars($_POST['price']),
                        'location' => strtolower(htmlspecialchars($_POST['location'])),
                        'area' => htmlspecialchars($_POST['area'])
                        ]);
                    }
                    else
                    {
                        $em = "Sorry your can't upload this type of file";
                        header("Location:index.php?error=$em");
                    }
                    
                }
            }
            else
            {
                $em = "Unknow error";
                header("Location:index.php?error=$em");
            }
    }