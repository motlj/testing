<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
 
 <body>
  <div class="container">
    <div class="row">
      <h3>PHP CRUD Grid: Customers</h3>
    </div>
    <div class="row">
	    <p>
        <a href="create.php" class="btn btn-success">Create</a>
      </p>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>name</th>
            <th>last_name</th>
            <th>birthdate</th>
	          <th>phone_number</th>
	          <th>email_address</th>
	          <th>user_name</th>
            <th>password</th>
            <th>Action</th>
	          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include '../database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM customer ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<form method="POST" action="updateCustomer.php">';
			        echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>'; 
              echo '<td><input type="text" name="last_name" value="'.$row['last_name'].'"></td>';
              echo '<td><input type="text" name="birthdate" value="'.$row['birthdate'].'"></td>';
              echo '<td><input type="text" name="phone_number" value="'.$row['phone_number'].'"></td>';
              echo '<td><input type="text" name="email_address" value="'.$row['email_address'].'"></td>';
              echo '<td><input type="text" name="user_name" value="'.$row['user_name'].'"></td>';
              echo '<td><input type="text" name="password" value="'.$row['password'].'"></td>';
              echo '<td><input type="submit" value="Update"></td>';
			        echo '</form>';
			        echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a></td>';
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
