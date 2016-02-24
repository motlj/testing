<?php
    error_reporting(E_ALL);
 
    require_once '../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
/*
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
        $sql = "INSERT INTO customer (name,last_name,birthdate,phone_number,email_address,user_name,password) values(?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$last_name,$birthdate,$phone_number,$email_address,$user_name,$password));
        Database::disconnect();
        header("Location: indexwithcreateandupdate.php");
      }
    } */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
 
 <body>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Create a Customer</h3>
        </div>           
        <form class="form-horizontal" action="customerCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($last_nameError)?'error':'';?>">
            <label class="control-label">Last Name</label>
            <div class="controls">
              <input name="last_name" type="text" placeholder="Last Name" value="<?php echo !empty($last_name)?$last_name:'';?>">
              <?php if (!empty($last_nameError)): ?>
                <span class="help-inline"><?php echo $last_nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($birthdateError)?'error':'';?>">
            <label class="control-label">Birthdate</label>
            <div class="controls">
              <input name="birthdate" type="text" placeholder="Birthdate" value="<?php echo !empty($birthdate)?$birthdate:'';?>">
              <?php if (!empty($birthdateError)): ?>
                <span class="help-inline"><?php echo $birthdateError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($phone_numberError)?'error':'';?>">
            <label class="control-label">Phone Number</label>
            <div class="controls">
              <input name="phone_number" type="text" placeholder="Phone Number" value="<?php echo !empty($phone_number)?$phone_number:'';?>">
              <?php if (!empty($phone_numberError)): ?>
                <span class="help-inline"><?php echo $phone_numberError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($email_addressError)?'error':'';?>">
            <label class="control-label">Email Address</label>
            <div class="controls">
              <input name="email_address" type="text" placeholder="Email Address" value="<?php echo !empty($email_address)?$email_address:'';?>">
              <?php if (!empty($email_addressError)): ?>
                <span class="help-inline"><?php echo $email_addressError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($user_nameError)?'error':'';?>">
            <label class="control-label">User Name</label>
            <div class="controls">
              <input name="user_name" type="text" placeholder="User Name" value="<?php echo !empty($user_name)?$user_name:'';?>">
              <?php if (!empty($user_nameError)): ?>
                <span class="help-inline"><?php echo $user_nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
            <label class="control-label">Password</label>
            <div class="controls">
              <input name="password" type="text" placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
              <?php if (!empty($passwordError)): ?>
                <span class="help-inline"><?php echo $passwordError;?></span>
              <?php endif;?>
            </div>
          </div>
                        
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Create</button>
            <!-- no longer need a button to go back as this is the page being updated   <a class="btn" href="index.php">Back</a>   -->
          </div>
        </form>
      </div>
    </div>


  <div class="container">
    <div class="row">
      <h3>PHP CRUD Grid: Customers</h3>
    </div>
    <div class="row">
	    <!-- no longer need create button here - use create button from html above
      <p>
        <a href="create.php" class="btn btn-success">Create</a>
      </p>-->
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthdate</th>
	          <th>Phone Number</th>
	          <th>Email Address</th>
	          <th>User Name</th>
            <th>Password</th>
            <th>Action</th>
	          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // include '../database.php';   --already required above
            $pdo = Database::connect();
            $sql = 'SELECT * FROM customer ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';

              echo '<form method="POST" action="customerUpdate.php">';
              echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
			        echo '<td><input type="text" name="first_name" value="'.$row['name'].'"></td>'; 
              echo '<td><input type="text" name="last_name" value="'.$row['last_name'].'"></td>';
              echo '<td><input type="text" name="dob" value="'.$row['birthdate'].'"></td>';
              echo '<td><input type="text" name="phone" value="'.$row['phone_number'].'"></td>';
              echo '<td><input type="text" name="email" value="'.$row['email_address'].'"></td>';
              echo '<td><input type="text" name="username" value="'.$row['user_name'].'"></td>';
              echo '<td>***</td>';
              echo '<td><input type="submit" value="Update"></td>';
			        echo '</form>';

              echo '<form method="POST" action="customerDelete.php">';
              echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
              echo '<td><input type="submit" value="Delete"></td>';
              echo '</form>';

              echo '</tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
 </body>
 <script src="../assets/js/bootstrap.min.js"></script>
</html>
