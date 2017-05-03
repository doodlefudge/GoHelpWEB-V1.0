<?php
try{
    $error = '';
    include_once(dirname(__FILE__).'/assets/connection/connection.php');
    if(isset($_POST['submit'])){
        $sql= "SELECT count(*) as count from schedule_type where type_name = :type_name";
        $stmt = $pdo->prepare($sql);
        $type_name = $_POST['type_name'];
        $stmt->bindParam(':type_name', $type_name );
        $stmt->execute();
        $obj = $stmt->fetchObject();
        if(((int)$obj->count<1)){
            $sql= "SELECT count(*) as count from schedule_type";
            $stmt = $pdo->prepare($sql);

            $stmt->execute();
            $obj = $stmt->fetchObject();

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "INSERT INTO schedule_type VALUES(NULL ,:schedule_type,
                                                           :type_name,
                                                           :type_description,
                                                           :min,:max,
                                                           :type_price,
                                                           :sec_info)";
            $stmt = $pdo->prepare($sql);
            //$service_cat_id = (((int)$obj->count) + 1);
            $schedule_type = "room";
            $type_name =  $_POST['type_name'];
            $type_description =  $_POST['type_description'];
            $min =  $_POST['min'];
            $max =  $_POST['max'];
            $type_price =  $_POST['type_price'];
            $sec_info=  $_POST['sec_info'];
            $stmt->bindParam(':schedule_type', $schedule_type);
            $stmt->bindParam(':type_name', $type_name);
            $stmt->bindParam(':type_description', $type_description);
            $stmt->bindParam(':min', $min);
            $stmt->bindParam(':max', $max);
            $stmt->bindParam(':type_price', $type_price);
            $stmt->bindParam(':sec_info', $sec_info);
            $stmt->execute();
            ?>
            <script>
                alert('Added Tour!');
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
                    <h1 class="page-head-line">Add Room Package</h1>

                    <h1 class="page-subhead-line">Add Room Package to show on Front end</h1>
                </div>
            </div><!-- /. ROW  -->

            <div class="row">
                <div class="col-lg-12 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add Tour Package
                            <br>
                            <?php echo $error?>
                        </div>

                        <div class="panel-body">
                            <form role="form" action = "" method = "post">
                                <div class="form-group">
                                    <label>Room Name</label>
                                    <input class="form-control" name = "type_name" type="text" />
                                    <p class="help-block">Name or type of service</p>
                                </div>
                                <div class="form-group">
                                    <label>Room Description</label>
                                    <textarea class="form-control" name = "type_description"></textarea>
                                    <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                    <label>Minimum People</label>
                                    <input class="form-control" name = "min" type="number" />
                                    <p class="help-block">Minimum Number of people</p>
                                </div>
                                <div class="form-group">
                                    <label>Maximum People</label>
                                    <input class="form-control" name = "max" type="number" />
                                    <p class="help-block">Maximum Number of people</p>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" name = "type_price" type="number" step="0.1"/>
                                    <p class="help-block">Price of the packagee</p>
                                </div>
                                <div class="form-group">
                                    <label>Secondary Tour Description</label>
                                    <textarea class="form-control" name = "sec_info"></textarea>
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
