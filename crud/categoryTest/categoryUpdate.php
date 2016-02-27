<?php
 error_reporting(E_ALL);
    require_once '../database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($name) || !valid($description)) {
        header("Location: categoryIndex.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE customer SET name = ?, description = ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($name,$description,$id));
      Database::disconnect();
      header("Location: categoryIndex.php");
    }
