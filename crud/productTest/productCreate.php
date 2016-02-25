<?php
    error_reporting(E_ALL);
 
    require_once '../database.php';

    if ( !empty($_POST) ) {
        // keep track validation errors

      $product_nameError = null;
      $descriptionError = null;
      $priceError = null;

        // keep track post values
      $product_name = $_POST['product_name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
         
        // validate input
      $valid = true;
        
      if (empty($product_name)) {
        $product_nameError = 'Please enter Product Name';
        $valid = false;
      }
      if (empty($description)) {
        $descriptionError = 'Please enter Product Description';
        $valid = false;
      }
      if (empty($price)) {
        $priceError = 'Please enter Price of Product';
        $valid = false;
      }

        // insert data
      if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO product (product_name, description, price) VALUES (?, ?, ?)";
        $q = $pdo->prepare($sql);

        try { 
           $q->execute(array($product_name,$description,$price));
           Database::disconnect();
           header("Location: productIndex.php");
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
          <h3>Create an Address</h3>
        </div>           
        <form class="form-horizontal" action="productCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($product_nameError)?'error':'';?>">
            <label class="control-label">Product Name</label>
            <div class="controls">
              <input name="product_name" type="text" placeholder="Product Name" value="<?php echo !empty($product_name)?$product_name:'';?>">
              <?php if (!empty($product_nameError)): ?>
                <span class="help-inline"><?php echo $product_nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
            <label class="control-label">Product Description</label>
            <div class="controls">
              <input name="description" type="text" placeholder="Product Description" value="<?php echo !empty($description)?$description:'';?>">
              <?php if (!empty($street2Error)): ?>
                <span class="help-inline"><?php echo $descriptionError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($priceError)?'error':'';?>">
            <label class="control-label">Price</label>
            <div class="controls">
              <input name="price" type="text" placeholder="Price" value="<?php echo !empty($price)?$price:'';?>">
              <?php if (!empty($priceError)): ?>
                <span class="help-inline"><?php echo $priceError;?></span>
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