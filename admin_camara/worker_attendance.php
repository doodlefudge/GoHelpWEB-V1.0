<?php
include_once('assets\connection\connection.php');
$pdo = new PDO($dsn, $user, $pass);
$id = $_GET['worker'];
$ids = explode(',',$id);
if(isset($_POST['submit'])){
	if(isset($_POST['submit'])){
		$attend = $_POST['attend'];
		 foreach($attend as $att){
			$arr = explode(',',$att);
			/* echo $arr[0];
			echo $arr[1];
			echo $arr[2];
			echo $arr[3];
			echo '<br/>'; */
			$qry = "UPDATE tbl_worker_attendance e 
					INNER JOIN tbl_training_summary s ON e.training_id = s.training_id 
					SET e.attendance = :attendance 
					WHERE s.id = :id AND e.date = :date AND s.serv_detail_id = :serv_detail_id";
			$stmt = $pdo->prepare($qry);
			$stmt->bindParam(':attendance',$arr[3]);
			$stmt->bindParam(':id',$arr[2]);
			$stmt->bindParam(':date',$arr[0]);
			$stmt->bindParam(':serv_detail_id',$arr[1]);
			$stmt->execute();
		}
		/*
		$sql1 = "SELECT * FROM tbl_worker_attendance a 
		LEFT JOIN tbl_training_summary s ON a.training_id = s.training_id
		WHERE s.id = '".$id."' AND s.training_status = '0' ORDER BY a.date ASC";
		echo $sql1;
		$stmt1 = $pdo->prepare($sql1);
		$stmt1->execute();
		$obj1  = $stmt1->fetchAll();
		$nRows1 = $pdo->query("SELECT COUNT(*) FROM tbl_worker_attendance a 
						LEFT JOIN tbl_training_summary s ON a.training_id = s.training_id 
						WHERE s.id = '".$id."' AND s.training_status = '0' ORDER BY a.date ASC")->fetchColumn(); 
		for($i = 0 ; $i < $nRows1 ; $i++){
			
		} */
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
                        <h1 class="page-head-line">   <h1 class="page-head-line">	<?php
								$fname = $pdo->query("SELECT fname FROM tbl_user_info WHERE id = '".$ids[0]."'")->fetchColumn(); 
								$lname = $pdo->query("SELECT lname FROM tbl_user_info WHERE id = '".$ids[0]."'")->fetchColumn(); 
								echo $fname . " " . $lname;
							?>  Attendance for <?php
							 echo $pdo->query("SELECT service_name FROM tbl_service_detail WHERE serv_detail_id = '".$ids[1]."'")->fetchColumn()." Training"; 
							?></h1>
							</h1>

                        <h1 class="page-subhead-line">Check attendance of each worker</h1>
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
									<?php
										$sql1 = "SELECT * FROM tbl_worker_attendance a 
													LEFT JOIN tbl_training_summary s ON a.training_id = s.training_id
													LEFT JOIN tbl_service_detail d ON s.serv_detail_id = d.serv_detail_id
													WHERE s.id = '".$ids[0]."' AND s.serv_detail_id = '".$ids[1]."' AND s.training_status = '0' ORDER BY a.date ASC";
										//echo $sql1;
										$stmt1 = $pdo->prepare($sql1);
										$stmt1->execute();
										$obj1  = $stmt1->fetchAll();
										$nRows1 = $pdo->query("SELECT COUNT(*) FROM tbl_worker_attendance a 
																LEFT JOIN tbl_training_summary s ON a.training_id = s.training_id 
																LEFT JOIN tbl_service_detail d ON s.serv_detail_id = d.serv_detail_id 
																WHERE s.id = '".$ids[0]."' AND s.serv_detail_id = '".$ids[1]."' AND s.training_status = '0' ORDER BY a.date ASC")->fetchColumn(); 
										for($i = 0 ; $i < $nRows1 ; $i++){
											if($obj1[$i]['attendance'] == '1'){
												?>
												<div class="checkbox">
													<label>
														<input type="checkbox" checked = "true" hidden = "true"name = "attend[<?php echo  $i?>]"value="<?php echo $obj1[$i]["date"].','.$obj1[$i]["serv_detail_id"].','. $ids[0] .',';?>0">
														<input type="checkbox" class="checkbox date" checked = 'true'name = "attend[<?php echo  $i?>]"value="<?php echo $obj1[$i]["date"].','.$obj1[$i]["serv_detail_id"].','. $ids[0].',';?>1"><label><?php echo $obj1[$i]["date"]?> </label>
													</label>
												</div>
												<?php
											}else{	
												?>
													<div class="checkbox">
														<label>
															<input type="checkbox" hidden = 'true' checked = 'true' name = "attend[<?php echo  $i?>]" value="<?php echo $obj1[$i]["date"].','.$obj1[$i]["serv_detail_id"].','. $ids[0] .',';?>0">
															<input type="checkbox" class="checkbox date" name = "attend[<?php echo  $i?>]"value="<?php echo $obj1[$i]["date"].','.$obj1[$i]["serv_detail_id"].','. $ids[0].',';?>1"><label><?php echo $obj1[$i]["date"]?> </label>
														</label>
													</div>
												<?php
											}
										}
									?>
													
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
