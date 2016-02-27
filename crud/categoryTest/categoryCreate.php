<?php
    error_reporting(E_ALL);
 
    require_once '../database.php';

    if ( !empty($_POST) ) {
        // keep track validation errors

      $nameError = null;
      $descriptionError = null;

        // keep track post values
      $name = $_POST['name'];
      $description = $_POST['description'];

        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Category Name';
        $valid = false;
      }
      if (empty($description)) {
        $descriptionError = 'Please enter Description';
        $valid = false;
      }

        // insert data
      if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO category (name, description) VALUES (?, ?)";
        $q = $pdo->prepare($sql);

        try { 
           $q->execute(array($name,$description));
           Database::disconnect();
           header("Location: categoryIndex.php");
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
        <form class="form-horizontal" action="categoryCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Category Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Category Name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
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

          <div class="form-actions">
            <button type="submit" class="btn btn-success">Create</button>
            <!-- no longer need a button to go back as this is the page being updated   <a class="btn" href="index.php">Back</a>   -->
          </div>
        </form>
      </div>
    </div>
  </body>
</html>