<?php
include_once('assets/connection/connection.php');
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('assets/navbar/include.php');?>
<body>
    <div id="wrapper">
		<?php include('assets/navbar/header.php');?>
        <!-- /. NAV TOP  -->
        <?php include('assets/navbar/navbar.php');?><!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">la 
                        <h1 class="page-head-line">Edit Service Category</h1>

                        <h1 class="page-subhead-line">Edit category	</h1>
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
												<th>Service ID</th>
												<th>Service Name</th>
												<th>Category</th>
												<th>Service Price</th>
												<th>Edit</th>
												<th>Delete</th>
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
												<tr>
													<td><?php echo $obj[$i]["serv_detail_id"];?></td>
													<td><?php echo $obj[$i]["service_name"];?></td>
													<td><?php echo $obj[$i]["category_name"];?></td>
													<td><?php echo $obj[$i]["service_price"];?></td>
													<td><button class="btn btn-primary"data-toggle="modal" data-target="#editModal<?php echo $obj[$i]["serv_detail_id"];?>"><i class="glyphicon glyphicon-search"></i>Edit</button></td>
													<td><button class="btn btn-danger" data-toggle="modal" data-target="#delModal<?php echo $obj[$i]["serv_detail_id"];?>"><i class="glyphicon glyphicon-remove"></i>Delete</button></td>
													<div id="editModal<?php echo $obj[$i]["serv_detail_id"];?>" class="modal fade" role="dialog">
														<div class="modal-dialog">

														<!-- Modal content-->
														
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Edit Category</h4>
																</div>
																<div class="modal-body">
																	<label>Service ID</label> <input class="form-control" type="text" disabled = 'true' name = "service_name"id = "service_name" value = "<?php echo $obj[$i]["serv_detail_id"] ?>"/>
																	<label>Select which Category to put service.</label>
																	<select class="form-control" name ="category_id" id = "category_id">
																		<?php
																		$pdo1 = new PDO($dsn, $user, $pass);
																		$sql1= "SELECT * from tbl_service_category"; 
																		$stmt1 = $pdo1->prepare($sql1);
																		$stmt1->execute();
																		$obj1 = $stmt1->fetchAll();
																		$nRows1 = $pdo1->query('select count(*) from tbl_service_category')->fetchColumn(); 
																		for($j = 0 ; $j < $nRows1; $j++){
																			if($obj1[$j]["serv_cat_id"] == $obj[$i]["serv_cat_id"]){
																			?>
																			<option selected = 'true'value= "<?php echo $obj1[$j]["serv_cat_id"]; ?>"><?php echo $obj1[$j]["category_name"]; ?></option>
																			<?php
																			}else{
																				?>
																				<option value= "<?php echo $obj1[$j]["serv_cat_id"]; ?>"><?php echo $obj1[$j]["category_name"]; ?></option>
																				<?php
																			}
																			
																		}?>
																	</select>
																	<label>Service Name</label> <input class="form-control" type="text" name = "service_name"id = "service_name" value = "<?php echo $obj[$i]["service_name"] ?>"/>
																	<p class="help-block">Name or type of service</p>
																	<label>Service Information</label> <input class="form-control" type="text" name = "service_info" id = "serv_info" value = "<?php echo $obj[$i]["service_info"] ?>"/>
																	<label>Service Price</label> <input class="form-control" type="number" name = "service_price" id = "service_price" value = "<?php echo $obj[$i]["service_price"] ?>"/>

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														<!-- End Modal content-->
														</div>
													</div>
													<div id="delModal<?php echo $obj[$i]["serv_detail_id"];?>" class="modal fade" role="dialog">
														<div class="modal-dialog">

														<!-- Modal content-->	
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Delete  <?php echo $obj[$i]['service_name']; ?></h4>
															</div>
															<div class="modal-body">
																<p>Do you want to delete this category?</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
																<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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

    <?php include('assets/navbar/footer.php');?>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
     <?php include('assets/navbar/scripts.php');?>
</body>
</html>
