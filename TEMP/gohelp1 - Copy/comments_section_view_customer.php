<?php
include_once('assets\connection\connection.php');
$pdo = new PDO($dsn, $user, $pass);
$worker_id = $_GET['customer'];
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
								<h2 class="text-center">Comments and Ratings </h2>
								<h3 class="text-center"></h2>
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-xl-1 col-sm-1 col-md-1">Customer Name</th>
											<th class="col-md-1">Service Name</th>
											<th class="col-md-1">Worker Name</th>
											<th class="col-md-3">Comment</th>
											<th class="col-md-1">Rating</th>
										</tr>
									
									<tbody>
										</thead>
										<?php
									
										$sql= "SELECT u.fname as cfname,u.lname as clname ,d.service_name,worker.fname as wfname, worker.lname as wlname,c.comments,c.rating FROM tbl_user_comments c
												INNER JOIN tbl_user_info u ON c.id = u.id
												INNER JOIN tbl_service_confirmation s ON s.serv_conf_id =c.serv_conf_id
												INNER JOIN tbl_user_info worker ON worker.id = s.worker_id
												INNER JOIN tbl_service_request req ON req.request_id = s.request_id
												INNER JOIN tbl_service_detail d ON d.serv_detail_id = req.serv_detail_id WHERE c.id = '" .$worker_id. "'"; 
										//echo $sql;
										$stmt = $pdo->prepare($sql);
										$stmt->execute();
										$obj = $stmt->fetchAll();
										$counter = "select count(*) FROM tbl_user_comments c
												INNER JOIN tbl_user_info u ON c.id = u.id
												INNER JOIN tbl_service_confirmation s ON s.serv_conf_id =c.serv_conf_id
												INNER JOIN tbl_user_info worker ON worker.id = s.worker_id
												INNER JOIN tbl_service_request req ON req.request_id = s.request_id
												INNER JOIN tbl_service_detail d ON d.serv_detail_id = req.serv_detail_id WHERE c.id  = '" .$worker_id. "'";
										$nRows = $pdo->query($counter)->fetchColumn(); 
										for($i = 0 ; $i < $nRows; $i++){
										?>
											<tr class = "tbl_service">
												<td class="col-xl-1 col-sm-1 col-md-1"><?php echo $obj[$i]["cfname"] . " " .$obj[$i]["clname"]?></td>
												<td class="col-md-1"><?php echo $obj[$i]["service_name"];?></td>
												<td class="col-md-1"><?php echo $obj[$i]["wfname"] . " " .$obj[$i]["wlname"]?></td>
												<td class="col-md-3"><?php echo $obj[$i]["comments"];?></td>
												<td class="col-md-1">												
												<input id="input-rating" value="<?php echo $obj[$i]["rating"];?>" type="number" class="rating" disabled = "true" data-show-clear="false"  data-show-caption ="false"  min=0 max=5 step=0.2 data-size="xs">
												</td>
												
												
											</tr>
											
										<?php 	
										}
										?>
									</tbody>
								</table>
							
								 <hr />
							
								 <hr />
								  <div class="ttl-amts text-right">
									  <h4> <strong>Average Rating :</strong> 
													<input id="input-21b" value="<?php 
													$counter = "select AVG(rating) FROM tbl_user_comments c
																	INNER JOIN tbl_user_info u ON c.id = u.id
																	INNER JOIN tbl_service_confirmation s ON s.serv_conf_id =c.serv_conf_id
																	INNER JOIN tbl_user_info worker ON worker.id = s.worker_id
																	INNER JOIN tbl_service_request req ON req.request_id = s.request_id
																	INNER JOIN tbl_service_detail d ON d.serv_detail_id = req.serv_detail_id WHERE c.id = '" .$worker_id. "'";;
													echo $nRows = $pdo->query($counter)->fetchColumn();?>" type="number" class="rating" disabled = "true" min=0 max=5 step=0.2 data-show-clear="false"data-size="xs"></h4>
								 </div>
							</div>
						</div>
					</div>
					</div>
								<button class ="btn btn-info print" data-details = "Worker's List">Print</button>
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
