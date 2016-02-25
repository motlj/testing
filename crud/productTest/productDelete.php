<?php
 
    require_once '../database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`product` WHERE `product`.`id` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: productIndex.php");
      } catch (PDOException $e) { 
        //echo "Syntax Error: ".$e->getMessage(); 
        //die();
        header("Location: productIndex.php");
      }
    }
