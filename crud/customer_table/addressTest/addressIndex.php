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
          <h3>Create an Address</h3>
        </div>           
        <form class="form-horizontal" action="addressCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($street1Error)?'error':'';?>">
            <label class="control-label">Street Address</label>
            <div class="controls">
              <input name="street1" type="text" placeholder="Street Address" value="<?php echo !empty($street1)?$street1:'';?>">
              <?php if (!empty($street1Error)): ?>
                <span class="help-inline"><?php echo $street1Error;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($street2Error)?'error':'';?>">
            <label class="control-label">Street Address (cont.)</label>
            <div class="controls">
              <input name="street2" type="text" placeholder="Street Address (cont.)" value="<?php echo !empty($street2)?$street2:'';?>">
              <?php if (!empty($street2Error)): ?>
                <span class="help-inline"><?php echo $street2Error;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
            <label class="control-label">City</label>
            <div class="controls">
              <input name="city" type="text" placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
              <?php if (!empty($cityError)): ?>
                <span class="help-inline"><?php echo $cityError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
            <label class="control-label">State</label>
            <div class="controls">
              <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
              <?php if (!empty($stateError)): ?>
                <span class="help-inline"><?php echo $stateError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($zipError)?'error':'';?>">
            <label class="control-label">Zip Code</label>
            <div class="controls">
              <input name="zip" type="text" placeholder="Zip Code" value="<?php echo !empty($zip)?$zip:'';?>">
              <?php if (!empty($zipError)): ?>
                <span class="help-inline"><?php echo $zipError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($countryError)?'error':'';?>">
            <label class="control-label">Country</label>
            <div class="controls">
              <input name="country" type="text" placeholder="Country" value="<?php echo !empty($country)?$country:'';?>">
              <?php if (!empty($countryError)): ?>
                <span class="help-inline"><?php echo $countryError;?></span>
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
      <h3>PHP CRUD Grid: Addresses</h3>
      
      <?php
        if( !empty($_POST['error']) && isset($_POST['error']) ) {
        echo "Unable to delete from database.";
        }
      ?>

    </div>
    <div class="row">
	    <!-- no longer need create button here - use create button from html above
      <p>
        <a href="create.php" class="btn btn-success">Create</a>
      </p>-->
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Street Address</th>
            <th>Street Address</th>
            <th>City</th>
	          <th>State</th>
	          <th>Zip</th>
	          <th>Country</th>
            <th>Action</th>
	          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // include '../database.php';   --already required above
            $pdo = Database::connect();
            $sql = 'SELECT * FROM address ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';

              echo '<form method="POST" action="customerUpdate.php">';
              echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
			        echo '<td><input type="text" name="street1" value="'.$row['street1'].'"></td>'; 
              echo '<td><input type="text" name="street2" value="'.$row['street2'].'"></td>';
              echo '<td><input type="text" name="city" value="'.$row['city'].'"></td>';
              echo '<td><input type="text" name="state" value="'.$row['state'].'"></td>';
              echo '<td><input type="text" name="zip" value="'.$row['zip'].'"></td>';
              echo '<td><input type="text" name="country" value="'.$row['country'].'"></td>';
              echo '<td><input type="submit" value="Update"></td>';
			        echo '</form>';

              echo '<form method="POST" action="addressDelete.php">';
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
