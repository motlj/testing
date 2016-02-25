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
          <h3>Create a Product</h3>
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
            <label class="control-label">Description</label>
            <div class="controls">
              <input name="description" type="text" placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
              <?php if (!empty($descriptionError)): ?>
                <span class="help-inline"><?php echo $descriptionError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($priceError)?'error':'';?>">
            <label class="control-label">City</label>
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


  <div class="container">
    <div class="row">
      <h3>PHP CRUD Grid: Products</h3>
      
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
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
	          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // include '../database.php';   --already required above
            $pdo = Database::connect();
            $sql = 'SELECT * FROM product ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';

              echo '<form method="POST" action="productUpdate.php">';
              echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
			        echo '<td><input type="text" name="product_name" value="'.$row['product_name'].'"></td>'; 
              echo '<td><input type="text" name="description" value="'.$row['description'].'"></td>';
              echo '<td><input type="text" name="price" value="'.$row['price'].'"></td>';
              echo '<td><input type="submit" value="Update"></td>';
			        echo '</form>';

              echo '<form method="POST" action="productDelete.php">';
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
