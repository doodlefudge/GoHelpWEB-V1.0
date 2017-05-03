<?php
include_once('assets\connection\connection.php');
$pdo = new PDO($dsn,$user,$pass);
$id = $_GET['worker'];
$serv_detail_id = $_GET['service'];

$nRows1 = $pdo->query("SELECT COUNT(*) FROM tbl_worker_skills WHERE id = '".$id."' AND skill_id = '".$serv_detail_id."'")->fetchColumn(); 
if($nRows1 < 1){
	
}else{

	header("location: worker_skills.php");
		?>
		<script >
			alert("Worker already has this skill.");
		</script>
	<?php
}
if(isset($_GET['worker']) && isset($_GET['service'])){
	if(isset($_POST['submit'])){
		
			$arr = $_POST['dateplot'];
			$qry = "INSERT INTO tbl_training_summary VALUE (:training_id, :id,:serv_detail_id,:training_status)";
			$stmt = $pdo -> prepare($qry);
			$training_id = $_GET['worker']."".$_GET['service'];
			
			$training_status = 0;
			$stmt->bindParam(':training_id',$training_id);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':serv_detail_id',$serv_detail_id);
			$stmt->bindParam(':training_status',$training_status);
			$stmt->execute();
			var_dump($arr);	
			foreach($arr as $date){	
				$qry = "INSERT INTO tbl_worker_attendance VALUE (:training_id, :attendance,:date)";
				$attendance = '0';
				$stmt = $pdo -> prepare($qry);
				$stmt->bindParam(':training_id',$training_id);
				$stmt->bindParam(':attendance',$attendance);
				$stmt->bindParam(':date', $date);
				$stmt->execute();
				//echo $date;
			}
			?>
			<script language="javascript">
				alert("Training schedule created");
			</script>
			<?php
		
	}
}else{
	?>
		<script language="javascript">
			alert("Please pick skill and worker first.");
		</script>
	<?php
	header("location: dashboard.php");
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
                        <h1 class="page-head-line">	<?php
								$fname = $pdo->query("SELECT fname FROM tbl_user_info WHERE id = '".$_GET['worker']."'")->fetchColumn(); 
								$lname = $pdo->query("SELECT lname FROM tbl_user_info WHERE id = '".$_GET['worker']."'")->fetchColumn(); 
								echo $fname . " " . $lname;
							?>  Skills Training for <?php
							 echo $pdo->query("SELECT service_name FROM tbl_service_detail WHERE serv_detail_id = '".$_GET['service']."'")->fetchColumn(); 
							?></h1>

                        <h1 class="page-subhead-line">Skills</h1>
                    </div>
                </div><!-- /. ROW  -->

				<div class="row">
					<div class="col-lg-12 col-sm-6 col-xs-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								Plot Schedule of training
							</div>
						
							<div class="panel-body">
								<form role="form" action = "" method = "post">
									<?php
										$nRows1 = $pdo->query("SELECT training_days FROM tbl_skill_training WHERE serv_detail_id = '".$_GET['service']."'")->fetchColumn(); 
										for($i = 0 ; $i < $nRows1 ; $i++){
											?>
												<div class="input-group">
													<input type="text" class="form-control datepicker" name = "dateplot[<?php echo $i?>]" >
													<span class="input-group-addon" id="basic-addon2">Day<?php echo $i + 1 ?></span>
												</div>
											<br>
											<?php
										}
									?>
									<input type = "submit" class = "btn btn-success form-control" name = "submit" value = "Make Schedule of Training">
								</form>
							</div>
						</div>
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
