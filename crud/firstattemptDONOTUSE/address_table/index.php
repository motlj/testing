<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid: Addresses</h3>
            </div>
            <div class="row">
	      <p><a href="create.php" class="btn btn-success">Create</a></p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Street 1</th>
                      <th>Street 2</th>
                      <th>City</th>
		      <th>State</th>
		      <th>Zip Code</th>
		      <th>Country</th>
		      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include '../database.php';
                      $pdo = Database::connect();
                      $sql = 'SELECT * FROM address ORDER BY id DESC';
                      foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['street1'] . '</td>';
                            echo '<td>'. $row['street2'] . '</td>';
                            echo '<td>'. $row['city'] . '</td>';
                            echo '<td>'. $row['state'] . '</td>';
                            echo '<td>'. $row['zip'] . '</td>';
                            echo '<td>'. $row['country'] . '</td>';
			    echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>'; 
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
