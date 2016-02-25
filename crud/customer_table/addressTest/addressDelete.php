<?php
 
    require_once '../database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`address` WHERE `address`.`id` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: addressIndex.php");
      } catch (PDOException $e) { 
        //echo "Syntax Error: ".$e->getMessage(); 
        //die();
        header("Location: addressIndex.php");
      }
    }
