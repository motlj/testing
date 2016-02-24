<?php
 
    require_once '../database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE * FROM customer WHERE id=?";
        $q = $pdo->prepare($sql);
        //$q->execute(array($id));
        //Database::disconnect();
        //header("Location: indexwithcreateandupdate.php");
        try { 
           $q->execute(array($id));
           Database::disconnect();
           header("Location: indexwithcreateandupdate.php");
       } catch (PDOException $e) { 
           echo "Syntax Error: ".$e->getMessage(); 
           die();
       }
    }
