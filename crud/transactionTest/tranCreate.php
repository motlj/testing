<?php
    error_reporting(E_ALL);
 
    require_once '../database.php';

    if ( !empty($_POST) ) {
        // keep track validation errors

      $subtotalError = null;
      $taxError = null;
      $tranDateError = null;
      $cartError = null;

        // keep track post values
      $subtotal = $_POST['subtotal'];
      $tax = $_POST['tax'];
      $tranDate = $_POST['tranDate'];
      $cart = $_POST['cart'];

        // validate input
      $valid = true;
        
      if (empty($subtotal)) {
        $subtotalError = 'Please enter Subtotal';
        $valid = false;
      }
      if (empty($tax)) {
        $taxError = 'Please enter Tax';
        $valid = false;
      }
      if (empty($tranDate)) {
        $tranDateError = 'Please enter Transaction Date';
        $valid = false;
      }
      if (empty($cart)) {
        $cartError = 'Please enter Cart Data';
        $valid = false;
      }

        // insert data
      if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO transaction (subtotal, tax, tranDate, cart) VALUES (?, ?, ?, ?)";
        $q = $pdo->prepare($sql);

        try { 
           $q->execute(array($subtotal,$tax,$tranDate,$cart));
           Database::disconnect();
           header("Location: tranIndex.php");
       } catch (PDOException $e) { 
           echo "Syntax Error: ".$e->getMessage(); 
           die();
       }

      } 
    }
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
        <form class="form-horizontal" action="categoryCreate.php" method="post"> 

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
  </body>
</html>