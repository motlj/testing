<?php
    error_reporting(E_ALL);
 
    require_once '../database.php';

    if ( !empty($_POST) ) {
        // keep track validation errors

      $nameError = null;
      $last_nameError = null;
      $birthdateError = null;
      $phone_numberError = null;
      $email_addressError = null;
      $user_nameError = null;
      $passwordError = null;

        // keep track post values
      $name = $_POST['name'];
      $last_name = $_POST['last_name'];
      $birthdate = $_POST['birthdate'];
      $phone_number = $_POST['phone_number'];
      $email_address = $_POST['email_address'];
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];
         
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
      }
      if (empty($last_name)) {
        $last_nameError = 'Please enter Last Name';
        $valid = false;
      }
      if (empty($birthdate)) {
        $birthdateError = 'Please enter Birthdate';
        $valid = false;
      }
      if (empty($phone_number)) {
        $phone_numberError = 'Please enter Phone Number';
        $valid = false;
      }
      if (empty($email_address)) {
        $email_addressError = 'Please enter Email Address';
        $valid = false;
      } else if ( !filter_var($email_address,FILTER_VALIDATE_EMAIL) ) {
        $email_addressError = 'Please Enter a valid Emial Address';
        $valid = false;
      }
      if (empty($user_name)) {
        $user_nameError = 'Please enter User Name';
        $valid = false;
      }
      if (empty($password)) {
        $passwordError = 'Please enter Password';
        $valid = false;
      }

        // insert data
      if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO customer (name,last_name,birthdate,phone_number,email_address,user_name,password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$last_name,$birthdate,$phone_number,$email_address,$user_name,$password));
        Database::disconnect();
        header("Location: indexwithcreateandupdate.php");
      }
    }