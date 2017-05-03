<?php
include_once('assets\connection\connection.php');
$pdo = new PDO($dsn, $user, $pass);
$from = $_GET['from'];
$to = $_GET['to'];
$worker_id  = $_GET['worker_id'];
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
					 <h1 class="page-head-line">Profit Reports </h1>
					<h1 class="page-subhead-line">Summary of Profit Reports</h1>
				</div>
			</div><!-- /. ROW  -->

			<div class="row">
				<div class="col-md-12">
					 <!--    Hover Rows  -->
					<div class="panel panel-default">
						<div class="panel-heading">
							Workers
						</div>
						<div class="panel-body">
							<div class="table-responsive">
							<div id = "ToPrint">
							<img src="assets/img/Z.jpg" class="img-responsive  center-block" alt="" width="1000" height="600">
								<h2 class="text-center">Income Reports For Worker <?php 
								$fname = $pdo->query("SELECT fname FROM tbl_user_info WHERE id = '".$_GET['worker_id']."'")->fetchColumn(); 
								$lname = $pdo->query("SELECT lname FROM tbl_user_info WHERE id = '".$_GET['worker_id']."'")->fetchColumn(); 
								echo $fname . " " . $lname;
							?> </h2>
								<h3 class="text-center">For the period of <?php echo $from ." to ". $to?> </h2>
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-xl-1 col-sm-1 col-md-1">Transaction ID</th>
											<th class="col-md-1">Confirmation ID</th>
											<th class="col-md-3">Service Name</th>
											<th class="col-md-1">Transaction Date</th>
											<th class="col-md-1">Amount</th>
										</tr>
									
									<tbody>
										</thead>
										<?php
									
										$sql= "SELECT * FROM tbl_trans_detail d
													INNER JOIN tbl_service_confirmation c ON d.serv_conf_id = c.serv_conf_id 
													INNER JOIN tbl_service_request r ON r.request_id = c.request_id 
													INNER JOIN tbl_service_detail s ON s.serv_detail_id = r.serv_detail_id  
													WHERE  STR_TO_DATE(trans_date, '%d/%m/%Y') between STR_TO_DATE('".$from."', '%d/%m/%Y') and STR_TO_DATE('".$to."', '%d/%m/%Y') 
													AND c.worker_id = '" .$worker_id. "'"; 
										//echo $sql;
										$stmt = $pdo->prepare($sql);
										$stmt->execute();
										$obj = $stmt->fetchAll();
										$counter = "select count(*) FROM tbl_trans_detail d 
										INNER JOIN tbl_service_confirmation c ON d.serv_conf_id = c.serv_conf_id 
										INNER JOIN tbl_service_request r ON r.request_id = c.request_id 
										INNER JOIN tbl_service_detail s ON s.serv_detail_id = r.serv_detail_id  
										WHERE  STR_TO_DATE(trans_date, '%d/%m/%Y') between STR_TO_DATE('".$from."', '%d/%m/%Y') and STR_TO_DATE('".$to."', '%d/%m/%Y') 
										AND c.worker_id = '" .$worker_id. "'";
										$nRows = $pdo->query($counter)->fetchColumn(); 
										for($i = 0 ; $i < $nRows; $i++){
										?>
											<tr class = "tbl_service">
												<td class="col-xl-1 col-sm-1 col-md-1"><?php echo $obj[$i]["trans_id"]?></td>
												<td class="col-md-1"><?php echo $obj[$i]["serv_conf_id"];?></td>
												<td class="col-md-3"><?php echo $obj[$i]["service_name"];?></td>
												<td class="col-md-1"><?php echo $obj[$i]["trans_date"];?></td>
												<td class="col-md-1"><?php echo $obj[$i]["trans_amt"];?>.00</td>
												
												
											</tr>
											
										<?php 	
										}
										?>
									</tbody>
								</table>
							
								 <hr />
							
								 <hr />
								  <div class="ttl-amts text-right">
									  <h4> <strong>Profit Amount :<?php 
													$counter = "select SUM(trans_amt) FROM tbl_trans_detail d 
													INNER JOIN tbl_service_confirmation c ON d.serv_conf_id = c.serv_conf_id 
													INNER JOIN tbl_service_request r ON r.request_id = c.request_id 
													INNER JOIN tbl_service_detail s ON s.serv_detail_id = r.serv_detail_id  
													WHERE  STR_TO_DATE(trans_date, '%d/%m/%Y') between STR_TO_DATE('".$from."', '%d/%m/%Y') and STR_TO_DATE('".$to."', '%d/%m/%Y') 
													AND c.worker_id = '" .$worker_id. "'";
													echo $nRows = $pdo->query($counter)->fetchColumn();?>.00 PHP</strong> </h4>
								 </div>
							</div>
						</div>
					</div>
					</div>
								<button class ="btn btn-info print" data-details = "Worker's Income Reports">Print</button>
					<!-- End  Hover Rows  -->
				</div>
				
			</div><!--/.ROW-->

		   
		</div><!-- /. PAGE INNER  -->
	</div><!-- /. PAGE WRAPPER  -->
</div><!-- /. WRAPPER  -->

    <?php include('assets\navbar\footer.php');?>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
     <?php include('assets\navbar\scripts.php');?>

</body>
</html>
