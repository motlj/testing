<?php
 
    require_once '../database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`transaction` WHERE `transaction`.`id` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: tranIndex.php");
      } catch (PDOException $e) { 
        //echo "Syntax Error: ".$e->getMessage() . "<br />\n"; 
        //die();
        header("Location: tranIndex.php?error=1");
      }
    }
