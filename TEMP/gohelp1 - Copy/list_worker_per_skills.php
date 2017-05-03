<?php
include_once('assets\connection\connection.php');
include_once('distance_comparer.php');
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
					<h1 class="page-head-line">Workers' Skills</h1>

					<h1 class="page-subhead-line">Skills</h1>
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
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-md-3">Worker Name       </th>
											<th class="col-md-1">Contact Info</th>
											<th class="col-md-3">Address</th>
											<th class="col-md-2">Skills</th>
										</tr>
									
									<tbody>
										</thead>
										<?php
										$pdo = new PDO($dsn, $user, $pass);
										$sql= "SELECT i.id, contact_info ,fname,lname, address_lot, address_street, address_brgy, address_city,user_lat,user_lng FROM tbl_user_info i INNER JOIN tbl_user u ON u.id = i.id WHERE u.account_type = '2' "; 
										$stmt = $pdo->prepare($sql);
										$stmt->execute();
										$obj = $stmt->fetchAll();
										$nRows = $pdo->query("select count(*) FROM tbl_user_info i INNER JOIN tbl_user u ON u.id = i.id WHERE u.account_type = '2'")->fetchColumn(); 

										for($i = 0 ; $i < $nRows; $i++){
										?>
											<tr class = "tbl_service">
												<td class="col-md-2"><?php echo $obj[$i]["fname"]. " " .$obj[$i]["lname"];?></td>
												<td class="col-md-1"><?php echo $obj[$i]["contact_info"];?></td>
												<td class="col-md-2"><?php 
												if($obj[$i]['user_lat'] == 00 || $obj[$i]['user_lng'] == 00 || $obj[$i]['user_lat'] == "" || $obj[$i]['user_lng'] == ""){
													echo $obj[$i]["address_lot"]. " " .$obj[$i]["address_street"]. " " .$obj[$i]["address_brgy"]. " " .$obj[$i]["address_city"];
												}else{
													echo getaddress($obj[$i]['user_lat'] ,$obj[$i]['user_lng']);
												}
												?></td>
												<td class="col-md-2">
												<?php 
													$sql1= "SELECT service_name FROM tbl_worker_skills s INNER JOIN tbl_service_detail d ON d.serv_detail_id = s.skill_id WHERE s.id =  '". $obj[$i]["id"]."'"; 
													$stmt1 = $pdo->prepare($sql1);
													$stmt1->execute();
													$obj1 = $stmt1->fetchAll();
													$nRows1 = $pdo->query("select count(*)  FROM tbl_worker_skills s INNER JOIN tbl_service_detail d ON d.serv_detail_id = s.skill_id WHERE s.id =  '". $obj[$i]["id"]."'")->fetchColumn(); 

													for($j = 0 ; $j < $nRows1 ; $j++){
															echo $obj1[$j]["service_name"];
															if($j < $nRows1 -1) echo ",";
															
													}
													if($nRows1 == 0 ){
														echo "No Skills";
													}
												?>
												</td>
												
											</tr>
											
										<?php 	
										}
										?>
									</tbody>
								</table>
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
