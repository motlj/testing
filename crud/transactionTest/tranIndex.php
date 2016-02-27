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
          <h3>Create a Transaction</h3>
        </div>           
        <form class="form-horizontal" action="tranCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($subtotalError)?'error':'';?>">
            <label class="control-label">Subtotal</label>
            <div class="controls">
              <input name="subtotal" type="text" placeholder="Subtotal" value="<?php echo !empty($subtotal)?$subtotal:'';?>">
              <?php if (!empty($subtotalError)): ?>
                <span class="help-inline"><?php echo $subtotalError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($taxError)?'error':'';?>">
            <label class="control-label">Tax</label>
            <div class="controls">
              <input name="tax" type="text" placeholder="Tax" value="<?php echo !empty($tax)?$tax:'';?>">
              <?php if (!empty($taxError)): ?>
                <span class="help-inline"><?php echo $taxError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($tranDateError)?'error':'';?>">
            <label class="control-label">Date</label>
            <div class="controls">
              <input name="tranDate" type="text" placeholder="Date" value="<?php echo !empty($tranDate)?$tranDate:'';?>">
              <?php if (!empty($tranDateError)): ?>
                <span class="help-inline"><?php echo $tranDateError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($cartError)?'error':'';?>">
            <label class="control-label">Cart</label>
            <div class="controls">
              <input name="cart" type="text" placeholder="Cart" value="<?php echo !empty($cart)?$cart:'';?>">
              <?php if (!empty($cartError)): ?>
                <span class="help-inline"><?php echo $cartError;?></span>
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
      <h3>PHP CRUD Grid: Transactions</h3>
    </div>
    <div class="row">
	    <!-- no longer need create button here - use create button from html above
      <p>
        <a href="create.php" class="btn btn-success">Create</a>
      </p>-->
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Date</th>
            <th>Cart</th>
            <th>Action</th>
	          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // include '../database.php';   --already required above
            $pdo = Database::connect();
            $sql = 'SELECT * FROM transaction ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';

              echo '<form method="POST" action="tranUpdate.php">';
              echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
			        echo '<td><input type="text" name="subtotal" value="'.$row['subtotal'].'"></td>'; 
              echo '<td><input type="text" name="tax" value="'.$row['tax'].'"></td>';
              echo '<td><input type="text" name="tranDate" value="'.$row['tranDate'].'"></td>';
              echo '<td><input type="text" name="cart" value="'.$row['cart'].'"></td>';
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
