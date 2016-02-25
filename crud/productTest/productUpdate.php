<?php
 error_reporting(E_ALL);
    require_once '../database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $product_name = $_POST['product_name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
        
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($product_name) || !valid($description) || !valid($price)) {
        header("Location: productIndex.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE product SET product_name = ?, description = ?, price = ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($product_name,$description,$price,$id));
      Database::disconnect();
      header("Location: productIndex.php");
    }
