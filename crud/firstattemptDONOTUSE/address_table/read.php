<?php
require '../database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM address where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read an Address</h3>
                    </div>
                     
                    <div class="form-horizontal" >

                      <div class="control-group">
                        <label class="control-label">Street 1</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street1'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Street 2</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street2'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['city'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['state'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['zip'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Country</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['country'];?>
                            </label>
                        </div>
                      </div>

                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
 <script src="../assets/js/bootstrap.min.js"></script>
</html>
