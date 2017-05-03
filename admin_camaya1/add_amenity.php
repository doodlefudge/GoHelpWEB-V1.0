<?php
try{
    $error = '';
    include_once(dirname(__FILE__).'/assets/connection/connection.php');
    if(isset($_POST['submit'])){
        $sql= "SELECT count(*) as count from amenities WHERE amenity_name = :amenity_name";

        $stmt = $pdo->prepare($sql);
        $amenity_name = "amenity_name";
        $stmt->bindParam(':amenity_name', $amenity_name);
        $stmt->execute();
        $obj = $stmt->fetchObject();
        if(((int)$obj->count<1)){
            $sql= "SELECT count(*) as count from schedule_type";
            $stmt = $pdo->prepare($sql);

            $stmt->execute();
            $obj = $stmt->fetchObject();

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "INSERT INTO amenities VALUES(NULL ,:amenity_name,
                                                           :amenity_desc,
                                                           :amenity_price)";
            $stmt = $pdo->prepare($sql);
            //$service_cat_id = (((int)$obj->count) + 1);
            $amenity_name =  $_POST['amenity_name'];
            $amenity_desc =  $_POST['amenity_desc'];
            $amenity_price =  $_POST['amenity_price'];

            $stmt->bindParam(':amenity_name', $amenity_name);
            $stmt->bindParam(':amenity_desc', $amenity_desc);
            $stmt->bindParam(':amenity_price', $amenity_price);

            $stmt->execute();
            ?>
            <script>
                alert('Added Amenity');
            </script>
            <?php
        }else{
            $error = 'Category Name Already Taken';
        }



    }
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include(dirname(__FILE__).'/assets/navbar/include.php');?>
<body >
<div id="wrapper">
    <?php include(dirname(__FILE__).'/assets/navbar/header.php');?>
    <!-- /. NAV TOP  -->
    <?php include(dirname(__FILE__).'/assets/navbar/navbar.php');?><!-- /. NAV SIDE  -->

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Add Amenity</h1>

                    <h1 class="page-subhead-line">Add Amenity to show on Front end</h1>
                </div>
            </div><!-- /. ROW  -->

            <div class="row">
                <div class="col-lg-12 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add Amenity
                            <br>
                            <?php echo $error?>
                        </div>

                        <div class="panel-body">
                            <form role="form" action = "" method = "post">
                                <div class="form-group">
                                    <label>Amenity Name</label>
                                    <input class="form-control" name = "amenity_name" type="text" />
                                    <p class="help-block">Name or type of service</p>
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" name = "amenity_price" type="number" step="0.1"/>
                                    <p class="help-block">Price of the packagee</p>
                                </div>
                                <div class="form-group">
                                    <label>Amenity Description</label>
                                    <textarea class="form-control" name = "amenity_desc"></textarea>
                                    <p class="help-block"></p>
                                </div>
                                <button type="submit" class="btn btn-info" name = "submit">Create</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div><!--/.ROW-->


        </div><!-- /. PAGE INNER  -->
    </div><!-- /. PAGE WRAPPER  -->
</div><!-- /. WRAPPER  -->

<?php include(dirname(__FILE__).'/assets/navbar/footer.php');?>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<?php include(dirname(__FILE__).'/assets/navbar/scripts.php');?>
</body>
</html>
