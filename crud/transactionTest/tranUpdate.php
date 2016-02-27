<?php
 error_reporting(E_ALL);
    require_once '../database.php';
 
    if ( !empty($_POST)) {

      // keep track post values
      $id = $_POST['id'];
      $subtotal = $_POST['subtotal'];
      $tax = $_POST['tax'];
      $tranDate = $_POST['tranDate'];
      $cart = $_POST['cart'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }

      if (!valid($subtotal) || !valid($tax) || !valid($tranDate) || !valid($cart)) {
        header("Location: tranIndex.php");
      }

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE transaction SET subtotal = ?, tax = ?, tranDate = ?, cart = ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($subtotal,$tax,$tranDate,$cart,$id));
      Database::disconnect();
      header("Location: tranIndex.php");
    }
