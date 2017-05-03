<?php
include_once('assets\connection\connection.php');
if(isset($_POST['submit'])){
	$worker_id = $_POST['worker_id'];
	
	header("location : worker_attendance.php?worker=$arr[0]&service=$arr[1]");
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
                        <h1 class="page-head-line">Assess Worker's Attendance</h1>

                        <h1 class="page-subhead-line">Check attendance of each worker</h1>
                    </div>
                </div>
				<!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Add Service
                            </div>
							
                            <div class="panel-body">
							
                                <form role="form" action = "" method = "POST" >
                                    <div class="form-group">
										
											<select class="form-control worker" name ="worker_id" id = "">
												<?php
												$pdo = new PDO($dsn,$user,$pass);
												$sql1 = "SELECT * FROM tbl_user_info i LEFT JOIN tbl_user u  ON i.id = u.id LEFT JOIN tbl_training_summary s ON i.id = s.id LEFT JOIN tbl_service_detail d ON s.serv_detail_id = d.serv_detail_id WHERE u.account_type = '2' AND s.training_status = '0'";
												echo $sql1 ;
												$stmt1 = $pdo->prepare($sql1);
												$stmt1->execute();
												$obj1  = $stmt1->fetchAll();
												$nRows1 = $pdo->query("SELECT COUNT(*) FROM tbl_user_info i LEFT JOIN tbl_user u  ON i.id = u.id LEFT JOIN tbl_training_summary s ON i.id = s.id LEFT JOIN tbl_service_detail d ON s.serv_detail_id = d.serv_detail_id WHERE u.account_type = '2' AND s.training_status = '0' ")->fetchColumn(); 
												for($j = 0; $j < $nRows1 ; $j++){
													?>	
													<option selected = 'true' value= "<?php echo $obj1[$j]["id"].','.$obj1[$j]["serv_detail_id"]; ?>"><?php echo $obj1[$j]["fname"]. ' ' . $obj1[$j]['lname']. ' Training on ' . $obj1[$j]['service_name'];?></option>
													<?php
												}
												?>
											</select>	
                                    </div>
                                    <input type="submit" class="btn btn-info getAttendance" name = "submit" value = "Get Attendance" >
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--/.ROW-->
				<!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Completed Trainings
                            </div>
							
                            <div class="panel-body">
								<div id = "skill_err" class = "skill_err"></div>
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Worker Name</th>
											<th>Training in</th>
											<th>Completed Days of training</th>
											<th>Add Skill</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$pdo = new PDO($dsn,$user,$pass);
									$sql = "SELECT * FROM tbl_user_info u 
												LEFT JOIN tbl_training_summary t ON t.id = u.id 
												LEFT JOIN tbl_service_detail d ON t.serv_detail_id = d.serv_detail_id 
												LEFT JOIN tbl_skill_training s ON t.serv_detail_id = s.serv_detail_id 
												WHERE s.training_days = (
												SELECT COUNT(*) FROM tbl_worker_attendance w 
												WHERE t.training_id = w.training_id AND w.attendance = '1' 
												AND t.training_status = '0')";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$obj = $stmt->fetchAll(); 
									$nRows = $pdo->query("SELECT COUNT(*) FROM tbl_user_info u 
															LEFT JOIN tbl_training_summary t ON t.id = u.id 
															LEFT JOIN tbl_service_detail d ON t.serv_detail_id = d.serv_detail_id 
															LEFT JOIN tbl_skill_training s ON t.serv_detail_id = s.serv_detail_id 
															WHERE s.training_days = (
															SELECT COUNT(*) FROM tbl_worker_attendance w 
															WHERE t.training_id = w.training_id AND w.attendance = '1' 
															AND t.training_status = '0')")->fetchColumn(); 
									for($i = 0 ; $i < $nRows ; $i++){
									?>
										<tr>
											<td><?php echo $obj[$i]['fname'] ." ".$obj[$i]['lname']?></td>
											<td><?php echo $obj[$i]['service_name']?></td>
											<td><?php echo $obj[$i]['training_days']?></td>
											<td><button class="btn btn-primary approve"data-id = "<?php echo $obj[$i]['id']?>" data-serv_detail_id = "<?php echo $obj[$i]['serv_detail_id']?>" data-training_id ="<?php echo $obj[$i]['training_id']?>"><i class="glyphicon glyphicon-plus"></i></button></td>
											
										</tr>
									<?php
									}?>
									</tbody>
								</table>
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
