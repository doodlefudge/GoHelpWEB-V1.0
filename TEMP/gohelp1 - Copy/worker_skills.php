<?php
include_once('assets\connection\connection.php');
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
                        <h1 class="page-head-line">Workers' Skills Training</h1>

                        <h1 class="page-subhead-line">Skills</h1>
                    </div>
                </div><!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
						 <!--    Hover Rows  -->
						<div class="panel panel-default">
							<div class="panel-heading">
								Hover Rows
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Service Name</th>
												<th>Category</th>
												<th>Train Worker</th>
											</tr>
										
										<tbody>
											</thead>
											<?php
											$pdo = new PDO($dsn, $user, $pass);
											$sql= "SELECT * from tbl_service_detail d left join tbl_service_category c on d.serv_cat_id = c.serv_cat_id"; 
											$stmt = $pdo->prepare($sql);
											$stmt->execute();
											$obj = $stmt->fetchAll();
											$nRows = $pdo->query('select count(*) from tbl_service_detail')->fetchColumn(); 

											for($i = 0 ; $i < $nRows; $i++){
											?>
												<tr class = "tbl_service">
													<td><?php echo $obj[$i]["service_name"];?></td>
													<td><?php echo $obj[$i]["category_name"];?></td>
													<td><button class="btn btn-primary"data-toggle="modal" data-target="#editModal<?php echo $obj[$i]["serv_detail_id"];?>"><i class="glyphicon glyphicon-search"></i></button></td>
													<div id="editModal<?php echo $obj[$i]["serv_detail_id"];?>" class="modal fade" role="dialog">
														<div class="modal-dialog">

														<!-- Modal content-->
														
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Edit Category</h4>	
																</div>
																<div class="modal-body">
																	<div class="input-group">
																		<select class="form-control worker<?php echo  $obj[$i]["serv_detail_id"]?>" name ="worker_id" id = "<?php echo "worker_id".$obj[$i]['request_id'];?>">
																				<?php
																				$pdo = new PDO($dsn,$user,$pass);
																				$sql1 = "SELECT DISTINCT i.* FROM tbl_user_info i LEFT JOIN tbl_user u  ON i.id = u.id  LEFT JOIN tbl_worker_skills w ON i.id = w.id WHERE u.account_type = '2' AND w.skill_id NOT IN (SELECT tbl.skill_id FROM tbl_worker_skills tbl WHERE tbl.skill_id = '".$obj[$i]['serv_detail_id']."' AND tbl.id = u.id)";
																				$stmt1 = $pdo->prepare($sql1);
																				$stmt1->execute();
																				$obj1  = $stmt1->fetchAll();
																				$nRows1 = $pdo->query("SELECT COUNT( DISTINCT i.id ) FROM tbl_user_info i
																										LEFT JOIN tbl_user u ON i.id = u.id 
																										LEFT JOIN tbl_worker_skills w ON i.id = w.id 
																										WHERE u.account_type = '2' AND w.skill_id 
																										NOT IN (SELECT tbl.skill_id FROM tbl_worker_skills tbl WHERE tbl.skill_id ='".$obj[$i]['serv_detail_id']."' AND tbl.id = u.id)")->fetchColumn(); 
																				for($j = 0; $j < $nRows1 ; $j++){
																					?>	
																					<option selected = 'true' value= "<?php echo $obj1[$j]["id"]; ?>"><?php echo $obj1[$j]["fname"]. ' ' . $obj1[$j]['lname'];?></option>
																					<?php
																				}
																				?>
																			</select>		
																		<span class="input-group-btn">
																			<button class="btn btn-info addTrainingWorker" data-id = "<?php echo $obj[$i]["serv_detail_id"]?>" type="button">Add</button>
																		</span>
																	</div>
																</div>
																
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														<!-- End Modal content-->
														</div>
													</div>
													
												</tr>
												
											<?php 	
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
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
