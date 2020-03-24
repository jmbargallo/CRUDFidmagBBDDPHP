<?php

    session_start();
    include 'config.php';

    $update=false;
    $id="";
    $name="";
    $email="";
    $phone="";
    $photo="";

    if (isset($_POST['add'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $photo=$_FILES['image']['name'];
        $upload="uploads/".$photo;

        $query= "INSERT INTO investigadores(nom,email,tel,photo)VALUES(?,?,?,?)";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("ssss",$name,$email,$phone,$upload);
        $stmt->execute();
        move_uploaded_file($_FILES['image']['tmp_name'],$upload);

        header('location:index.php');
        $_SESSION['response']="S´ha afegit a la base de dades!";
        $_SESSION['res_type']="success";
    }

    

    if (isset($_GET['delete'])){
        $id=$_GET['delete'];

        $sql="SELECT photo FROM investigadores WHERE id=?";
        $stmt2=$conn->prepare($sql);
        $stmt2->bind_param("i",$id);
        $stmt2->execute();
        $result2=$stmt2->get_result();
        $row=$result2->fetch_assoc();

        $imagepath=$row['photo'];
        unlink($imagepath);

        $query="DELETE FROM investigadores WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        header('location:index.php');
        $_SESSION['response']="S´ha esborrat de la base de dades!";
        $_SESSION['res_type']="danger";
    }
    

    if(isset($_GET['edit'])){
        $id=$_GET['edit'];

        $query="SELECT * FROM investigadores WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $name=$row['nom'];
        $email=$row['email'];
        $phone=$row['tel'];
        $photo=$row['photo'];

        $update=true;
        
        
    }
    if (isset($_POST['update'])) {
       $id=$_POST['id'];
       $name=$_POST['nom'];
       $email=$_POST['email'];
       $phone=$_POST['tel'];
       $photo=$_POST['oldimage'];

       $newimage=$_FILES['image'][name];
       


    }
    if (isset($_GET['details'])) {
        $id=$_GET['details'];
        $query="SELECT * FROM investigadores WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result =$stmt->get_result();
        $row=$result->fetch_assoc();

        $vid=$row['id'];
        $vname=$row['nom'];
        $vemail=$row['email'];
        $vphone=$row['tel'];
        $vphoto=$row['photo'];
        

    }
    ?>