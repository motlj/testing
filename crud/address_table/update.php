<?php
    require '../database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
   /* if ( null==$id ) {
        header("Location: index.php");
    }*/
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $street1Error = null;
        $street2Error = null;
	$cityError = null;
	$stateError = null;
	$zipError = null;
	$countryError = null;        
 
        // keep track post values
        $street1 = $_POST['street1'];
        $street2 = $_POST['street2'];
        $city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$country = $_POST['country'];
         
        // validate input
        $valid = true;
        if (empty($street1)) {
            $street1Error = 'Please enter Street Number';
            $valid = false;
        }
	if (empty($street2)) {
	    $street2Error = 'Please enter Street Number (continued)';
	    $valid = false;
	}
	if (empty($city)) {
            $cityError = 'Please enter City';
            $valid = false;
        }
	if (empty($state)) {
            $stateError = 'Please enter State';
            $valid = false;
        }         
	if (empty($zip)) {
            $zipError = 'Please enter Zip Code';
            $valid = false;
        }
        if (empty($country)) {
            $countryError = 'Please enter Country';
            $valid = false;
        }         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE address set street1 = ?, street2 = ?, city = ?, state = ?, zip = ?, country = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($street1,$street2,$city,$state,$zip,$country,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM address where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $street1 = $data['street1'];
        $street2 = $data['street2'];
        $city = $data['city'];
	$state = $data['state'];
	$zip = $data['zip'];
	$country = $data['country'];
        Database::disconnect(); 
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update an Address</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

                      <div class="control-group <?php echo !empty($street1Error)?'error':'';?>">
                        <label class="control-label">Street 1</label>
                        <div class="controls">
                            <input name="street1" type="text"  placeholder="Street1" value="<?php echo !empty($street1)?$street1:'';?>">
                            <?php if (!empty($street1Error)): ?>
                                <span class="help-inline"><?php echo $street1Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($street2Error)?'error':'';?>">
                        <label class="control-label">Street 2</label>
                        <div class="controls">
                            <input name="street2" type="text" placeholder="Street2" value="<?php echo !empty($street2)?$street2:'';?>">
                            <?php if (!empty($street2Error)): ?>
                                <span class="help-inline"><?php echo $street2Error;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <input name="city" type="text"  placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
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
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
 <script src="../assets/js/bootstrap.min.js"></script>
</html>
        
