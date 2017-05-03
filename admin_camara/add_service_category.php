<?php
try{
	$error = '';
	include_once('assets\connection\connection.php');
	if(isset($_POST['submit'])){
		$pdo = new PDO($dsn, $user, $pass);
		$sql= "SELECT count(*) as count from tbl_service_category where category_name = :name"; 
		$stmt = $pdo->prepare($sql);
		$service_cat_name = $_POST['service_cat_name'];
		$stmt->bindParam(':name', $service_cat_name );
		$stmt->execute();
		$obj = $stmt->fetchObject();
		if(((int)$obj->count<1)){
			$pdo = new PDO($dsn, $user, $pass);
			$sql= "SELECT count(*) as count from tbl_service_category"; 
			$stmt = $pdo->prepare($sql);
			$service_cat_name = $_POST['service_cat_name'];
			$stmt->bindParam(':name', $service_cat_name );
			$stmt->execute();
			$obj = $stmt->fetchObject();
			
			$pdo = new PDO($dsn, $user, $pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql= "INSERT INTO tbl_service_category VALUES(:id,:name,:det)"; 
			$stmt = $pdo->prepare($sql);
			$service_cat_id = (((int)$obj->count) + 1);
			$service_cat_name = $_POST['service_cat_name'];
			$service_cat_detail =  $_POST['service_cat_detail'];
			$stmt->bindParam(':id', $service_cat_id);
			$stmt->bindParam(':name', $service_cat_name );
			$stmt->bindParam(':det', $service_cat_detail);
			$stmt->execute();
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
<?php include('assets\navbar\include.php');?>
<body>
    <div id="wrapper">
		<?php include('assets\navbar\header.php');?>
        <!-- /. NAV TOP  -->
        <?php include('assets\navbar\navbar.php');?><!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Service Category</h1>

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
                                <form role="form" action = "" method = "post">
                                    <div class="form-group">
                                        <label>Service Category Name</label> 
										<input class="form-control" name = "service_cat_name" type="text" />
                                        <p class="help-block">Name or type of service</p>
                                    </div>
									<div class="form-group">
                                        <label>Service Category</label> 
										<textarea class="form-control" name = "service_cat_detail"></textarea>
                                        <p class="help-block"><?php echo $error?></p>
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

    <?php include('assets\navbar\footer.php');?>
	<!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
     <?php include('assets\navbar\scripts.php');?>
</body>
</html>
