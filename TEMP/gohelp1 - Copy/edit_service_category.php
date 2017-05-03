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
												<th>Category ID</th>
												<th>Category Name</th>
												<th>Category Detail</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$pdo = new PDO($dsn, $user, $pass);
											$sql= "SELECT * from tbl_service_category"; 
											$stmt = $pdo->prepare($sql);
											$stmt->execute();
											$obj = $stmt->fetchAll();
											$nRows = $pdo->query('select count(*) from tbl_service_category')->fetchColumn(); 
											for($i = 0 ; $i < $nRows; $i++){
											?>
												<tr>
													<td><?php echo $obj[$i]["serv_cat_id"];?></td>
													<td><?php echo $obj[$i]["category_name"];?></td>
													<td><?php echo $obj[$i]["category_details"];?></td>
													<td><button class="btn btn-primary"data-toggle="modal" data-target="#editModal<?php echo $obj[$i]["serv_cat_id"];?>"><i class="glyphicon glyphicon-search"></i>Edit</button></td>
													<td><button class="btn btn-danger" data-toggle="modal" data-target="#delModal<?php echo $obj[$i]["serv_cat_id"];?>"><i class="glyphicon glyphicon-remove"></i>Delete</button></td>
													<div id="editModal<?php echo $obj[$i]["serv_cat_id"];?>" class="modal fade" role="dialog">
														<div class="modal-dialog">

														<!-- Modal content-->
														
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Edit Category</h4>
																</div>
																<form action = "./" method = "POST" name = "edit_service_category">
																	<div class="modal-body">																		
																		<div id = "serv_cat_err" class = "serv_cat_err"></div>
																		<div class="form-group">
																			<label>Category ID</label> 
																			<input class="form-control" name = "serv_cat_id" id = "serv_cat_id" type="text" value = "<?php echo $obj[$i]['serv_cat_id'];?>"/>

																			<p class="help-block">Name or type of service</p>
																		</div>
																		<div class="form-group">
																			<label>Service Category Name</label> 
																			<input class="form-control" name = "serv_cat_name" id = "<?php echo "serv_cat_name".$obj[$i]['serv_cat_id'];?>" type="text" value = "<?php echo $obj[$i]['category_name'] ;?>"></input>

																			<p class="help-block">Name or type of service</p>
																		</div>
																		<div class="form-group">
																			<label>Service Category Details</label> 
																			<textarea class="form-control" name = "serv_cat_detail" id ="<?php echo "serv_cat_detail".$obj[$i]['serv_cat_id'];?>"><?php echo  $obj[$i]['category_details']; ?></textarea>

																			<!--<p class="help-block"><?php echo $error?></p>-->
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-default cat" data-serv_cat_id= "<?php echo $obj[$i]['serv_cat_id']; ?>" value = "Update" name = "submit" id = "edit_cat_submit" >Update</button>
																	</div>
																</form>
															</div>

														</div>
													</div>
													
													<div id="delModal<?php echo $obj[$i]["serv_cat_id"];?>" class="modal fade" role="dialog">
														<div class="modal-dialog">

														<!-- Modal content-->	
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Delete  <?php echo $obj[$i]['category_name']; ?></h4>
															</div>
															<div class="modal-body">
																<div id = "del_cat_err" class = "del_cat_err"></div>
																<p>Do you want to delete this category?</p>
															</div>
															<form action = "./" method = "POST" name = "delete_service_category">
																<div class="modal-footer">
																	<button type="button" class="btn btn-danger delcat" data-serv_cat_id= "<?php echo $obj[$i]['serv_cat_id']; ?>">Delete</button>
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																</div>
															</form>
														</div>

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
    <!-- JQUERY SCRIPTS -->

   <?php include('assets\navbar\scripts.php');?>
</body>
</html>
