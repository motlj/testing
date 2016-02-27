<?php
    error_reporting(E_ALL);
 
    require_once '../database.php';

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
          <h3>Create a Category</h3>
        </div>           
        <form class="form-horizontal" action="categoryCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
            <label class="control-label">Category Description</label>
            <div class="controls">
              <input name="description" type="text" placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
              <?php if (!empty($descriptionError)): ?>
                <span class="help-inline"><?php echo $descriptionError;?></span>
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
      <h3>PHP CRUD Grid: Categories</h3>
    </div>
    <div class="row">
	    <!-- no longer need create button here - use create button from html above
      <p>
        <a href="create.php" class="btn btn-success">Create</a>
      </p>-->
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
	          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // include '../database.php';   --already required above
            $pdo = Database::connect();
            $sql = 'SELECT * FROM category ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';

              echo '<form method="POST" action="categoryUpdate.php">';
              echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
			        echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>'; 
              echo '<td><input type="text" name="description" value="'.$row['description'].'"></td>';
              echo '<td><input type="submit" value="Update"></td>';
			        echo '</form>';

              echo '<form method="POST" action="categoryDelete.php">';
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
