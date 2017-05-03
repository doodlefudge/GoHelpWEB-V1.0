<?php
include_once('assets\connection\connection.php');
include_once('distance_comparer.php');

$pdo = new PDO($dsn, $user, $pass);
$serv_detail_id = $_GET['serv_detail_id'];

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
							<img src="assets/img/Z.jpg" class="img-responsive  center-block" alt="" width="1000" height="600">
								<h2 class="text-center">Workers trained in <?php echo $nRows = $pdo->query("SELECT service_name FROM tbl_service_detail WHERE serv_detail_id = '".$serv_detail_id."'")->fetchColumn(); ?></h2>
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="col-xl-1 col-sm-1 col-md-1">Worker Name</th>
											<th class="col-sm-1">Contact Info</th>
											<th class="col-md-1">Address</th>
											<th class="col-md-2">Last Location</th>
											<th class="col-md-1">e-mail</th>
										</tr>
									
									<tbody>
										</thead>
										<?php
									
										$sql= "SELECT i.id, contact_info,email_addr ,fname,lname, address_lot, address_street, address_brgy, address_city ,user_lat,user_lng FROM tbl_user_info i INNER JOIN tbl_worker_skills s ON s.id = i.id WHERE s.skill_id = '".$serv_detail_id."'"; 
										$stmt = $pdo->prepare($sql);
										$stmt->execute();
										$obj = $stmt->fetchAll();
										$counter = "select count(*) FROM tbl_user_info i INNER JOIN tbl_worker_skills s ON s.id = i.id WHERE s.skill_id = '".$serv_detail_id."'";
										$nRows = $pdo->query($counter)->fetchColumn(); 
										for($i = 0 ; $i < $nRows; $i++){
										?>
											<tr class = "tbl_service">
													<td class="col-xl-1 col-sm-1 col-md-1"><?php echo $obj[$i]["fname"]. " " .$obj[$i]["lname"];?></td>
												<td class="col-md-1"><?php echo $obj[$i]["contact_info"];?></td>
												<td class="col-md-1"><?php 
													echo $obj[$i]["address_lot"]. " " .$obj[$i]["address_street"]. " " .$obj[$i]["address_brgy"]. " " .$obj[$i]["address_city"];
												?></td><td class="col-md-2"><?php 
												if($obj[$i]['user_lat'] == 00 || $obj[$i]['user_lng'] == 00 || $obj[$i]['user_lat'] == "" || $obj[$i]['user_lng'] == ""){
													echo "No update for worker's location yet";
												}else{
													echo getaddress($obj[$i]['user_lat'] ,$obj[$i]['user_lng']);
												}
												?></td>
												<td class="col-md-1"><?php echo $obj[$i]["email_addr"];?></td>
												
												
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
