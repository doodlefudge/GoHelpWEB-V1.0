<?php
include_once('assets\connection\connection.php');
if(isset($_POST['submit'])){
	$worker_id = $_POST['worker_id'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	header("location : profit_per_worker_view.php?to=".$to."&from=".$from."&worker_id=".$worker_id);
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
                        <h1 class="page-head-line">View comments and ratings</h1>

                        <h1 class="page-subhead-line">View comments and ratings and choose from filters</h1>
                    </div>
                </div>
				<!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Choose Service
                            </div>
							
                            <div class="panel-body">
                                    <div class="form-group">
										<select class="form-control service" name ="" id = "rating_service">
											<?php
											$pdo = new PDO($dsn,$user,$pass);
											$sql1 = "SELECT * FROM tbl_service_detail";
											echo $sql1 ;
											$stmt1 = $pdo->prepare($sql1);
											$stmt1->execute();
											$obj1  = $stmt1->fetchAll();
											$nRows1 = $pdo->query("SELECT COUNT(*) FROM tbl_service_detail")->fetchColumn(); 
											for($j = 0; $j < $nRows1 ; $j++){
												?>	
												<option selected = 'true' value= "<?php echo $obj1[$j]["serv_detail_id"]?>"><?php echo $obj1[$j]["service_name"]?></option>
												<?php
											}
											?>
										</select>	
                                    </div>
                                    <button class="btn btn-info getRatingPerService" >View Workers</button>
                            </div>
                        </div>
                    </div>
					
                </div><!--/.ROW-->
				<!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Choose Worker
                            </div>
							
                            <div class="panel-body">
                                    <div class="form-group">
										<select class="form-control worker" name ="worker_id" id = "rating_worker">
											<?php
											$pdo = new PDO($dsn,$user,$pass);
											$sql1 = "SELECT * FROM tbl_user_info u INNER JOIN tbl_user i ON u.id = i.id WHERE i.account_type = '2'";
											echo $sql1 ;
											$stmt1 = $pdo->prepare($sql1);
											$stmt1->execute();
											$obj1  = $stmt1->fetchAll();
											$nRows1 = $pdo->query("SELECT COUNT(*)  FROM tbl_user_info u INNER JOIN tbl_user i ON u.id = i.id WHERE i.account_type = '2'")->fetchColumn(); 
											for($j = 0; $j < $nRows1 ; $j++){
												?>	
												<option selected = 'true' value= "<?php echo $obj1[$j]["id"]?>"><?php echo $obj1[$j]["fname"]." " .$obj1[$j]["lname"]?></option>
												<?php
											}
											?>
										</select>	
                                    </div>
                                    <button class="btn btn-info getRatingPerWorker" >View Workers</button>
                            </div>
                        </div>
                    </div>
					
                </div><!--/.ROW-->
				<!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Choose Customer
                            </div>
							
                            <div class="panel-body">
                                    <div class="form-group">
										<select class="form-control customer" name ="worker_id" id = "">
											<?php
											$pdo = new PDO($dsn,$user,$pass);
											$sql1 = "SELECT * FROM tbl_user_info u INNER JOIN tbl_user i ON u.id = i.id WHERE i.account_type = '1'";
											echo $sql1 ;
											$stmt1 = $pdo->prepare($sql1);
											$stmt1->execute();
											$obj1  = $stmt1->fetchAll();
											$nRows1 = $pdo->query("SELECT COUNT(*)  FROM tbl_user_info u INNER JOIN tbl_user i ON u.id = i.id WHERE i.account_type = '1'")->fetchColumn(); 
											for($j = 0; $j < $nRows1 ; $j++){
												?>	
												<option selected = 'true' value= "<?php echo $obj1[$j]["id"]?>"><?php echo $obj1[$j]["fname"]." " .$obj1[$j]["lname"]?></option>
												<?php
											}
											?>
										</select>	
                                    </div>
                                    <button class="btn btn-info getRatingPerCustomer" >View Workers</button>
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
