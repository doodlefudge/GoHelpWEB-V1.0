<?php
include_once('assets\connection\connection.php');
if(isset($_POST['submit'])){
	$pdo = new PDO($dsn, $user, $pass);
	
	 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $serv_id = "SERV".(((int)$pdo->query('select count(*) from tbl_service_detail')->fetchColumn())+ 1);
	
		$sql = "INSERT INTO tbl_service_detail values (:serv_id,:serv_cat_id,:serv_name,:serv_info,:serv_price)";
		$stmt = $pdo->prepare($sql);
		$category_id = $_POST['category_id'];
		$serv_name = $_POST['service_name'];
		$serv_info = $_POST['service_info'];
		$serv_price = $_POST['service_price'];
		$stmt->bindParam(':serv_id',$serv_id);
		$stmt->bindParam(':serv_cat_id',$category_id);
		$stmt->bindParam(':serv_name',$serv_name);
		$stmt->bindParam(':serv_info',$serv_info);
		$stmt->bindParam(':serv_price',$serv_price);
		$stmt->execute();
		$obj= $stmt->fetchObject();
		
		$sql = "INSERT INTO tbl_skill_training values (:serv_id,:training_days)";
		$stmt = $pdo->prepare($sql);
		$training_days= $_POST['training_days'];
		$stmt->bindParam(':serv_id',$serv_id);
		$stmt->bindParam(':training_days',$training_days);
		$stmt->execute();
		
    } else {
       ?>
		   <script type = "javascript">
		   alert("Selected file is not an image");
		   </script>
	   <?php
    }

}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('assets\navbar\include.php');?>
<body>
    <div id="wrapper">
        <?php include('assets\navbar\header.php');?>
        <!-- /. NAV TOP  -->
        <?php include('assets\navbar\navbar.php');?>
		<!-- /. NAV SIDE  --><!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Service</h1>

                        <h1 class="page-subhead-line">Add service to show on each page on the page</h1>
                    </div>
                </div><!-- /. ROW  -->

                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Add Service
                            </div>
							
                            <div class="panel-body">
							
                                <form role="form" action = "" method = "post" >
                                    <div class="form-group">
										<label>Select which Category to put service.</label>
										<select class="form-control" name ="category_id" id = "category_id">
											<?php
											$pdo = new PDO($dsn, $user, $pass);
											$sql= "SELECT * from tbl_service_category"; 
											$stmt = $pdo->prepare($sql);
											$stmt->execute();
											$obj = $stmt->fetchAll();
											$nRows = $pdo->query('select count(*) from tbl_service_category')->fetchColumn(); 
											for($i = 0 ; $i < $nRows; $i++){
											?>
											<option value= "<?php echo $obj[$i]["serv_cat_id"]; ?>"><?php echo $obj[$i]["category_name"]; ?></option>
											<?php
											}?>
										</select>
                                        <label>Service Name</label> <input class="form-control" type="text" name = "service_name" id = "service_name"/>
                                        <p class="help-block">Name or type of service</p>
                                        <label>Service Information</label> <input class="form-control" type="text" name = "service_info" id = "serv_info"/>
                                        <label>Service Price</label> <input class="form-control" type="number" name = "service_price" id = "service_price"/>
                                        <label>Days of Training</label> <input class="form-control" type="number" name = "training_days" id = "training_days"/>

                                    </div>
                                    <input type="submit" class="btn btn-info" name = "submit" value = "Add"/>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div><!--/.ROW-->

               
            </div><!-- /. PAGE INNER  -->
        </div><!-- /. PAGE WRAPPER  -->
    </div><!-- /. WRAPPER  -->

    <?php include('assets\navbar\footer.php');?>
	<!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <?php include('assets\navbar\scripts.php');?>

</body>
</html>
