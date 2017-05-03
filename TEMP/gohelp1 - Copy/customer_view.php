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
                        <h1 class="page-head-line">Customers</h1>

                        <h1 class="page-subhead-line">List of customers registered in App</h1>
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
												<th> Last Name</th>
												<th> First Name</th>
												<th> Middle Name</th>
                                                <th> User</th>
                                                <th> Email Address</th>
                                                <th> Address</th>
												<th>Edit</th>
												<th>Disable</th>
											</tr>
										
										<tbody>
											</thead>
											<?php
											$pdo = new PDO($dsn, $user, $pass);
											$sql= "SELECT * FROM tbl_user_info i LEFT JOIN tbl_user u ON i.id = u.id WHERE  account_type = '1' "; 
											$stmt = $pdo->prepare($sql);
											$stmt->execute();
											$obj = $stmt->fetchAll();
											$nRows = $pdo->query("SELECT COUNT(*) FROM tbl_user_info i LEFT JOIN tbl_user u ON i.id = u.id WHERE  account_type = '1'")->fetchColumn();

											for($i = 0 ; $i < $nRows; $i++){
											?>
												<tr>
													<td><?php echo $obj[$i]["lname"];?></td>
													<td><?php echo $obj[$i]["fname"];?></td>
													<td><?php echo $obj[$i]["mname"];?></td>
                                                    <td><?php echo $obj[$i]["user"]?></td>
                                                    <td><?php echo $obj[$i]["email_addr"]?></td>
                                                    <td><?php echo $obj[$i]["address_lot"]. " " . $obj[$i]["address_street"]. " " . $obj[$i]["address_brgy"]. " " . $obj[$i]["address_city"]?></td>
													<td><button class="btn btn-primary"data-toggle="modal" data-target="#editModal<?php echo $obj[$i]["id"];?>"><i class="glyphicon glyphicon-search"></i></button></td>
    													<td><button class="btn btn-danger" data-toggle="modal" data-target="#delModal<?php echo $obj[$i]["id"];?>"><i class="glyphicon glyphicon-remove"></i></button></td>
													<div id="editModal<?php echo $obj[$i]["id"];?>" class="modal fade" role="dialog">
														<div class="modal-dialog">

														<!-- Modal content-->
														
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Edit Category</h4>
																</div>
																<div class="modal-body">
																    <input class="form-control" type="hidden" name = "id"id = "id" value = ""/>
																	<div class="form-group">
																		<label>Customer First Name</label> 
																		<input class="form-control" name = "w_fname" id = "w_fname<?php echo $obj[$i]["id"] ?>" type="text" value = "<?php echo $obj[$i]["fname"] ?>">
																		<p class="help-block"></p>
																	</div><div class="form-group">
																		<label>Customer Middle Name</label> 
																		<input class="form-control" name = "w_middle"  id = "w_middle<?php echo $obj[$i]["id"] ?>" type="text" value = "<?php echo $obj[$i]["mname"] ?>"/>
																		<p class="help-block"></p>
																	</div>
																	<div class="form-group">
																		<label>Customer Last Name</label> 
																		<input class="form-control" name = "w_lastname" id = "w_lastname<?php echo $obj[$i]["id"] ?>" type="text" value = "<?php echo $obj[$i]["lname"] ?>" />
																		<p class="help-block"></p>
																	</div>
																	<label>Customer Address</label> 
																	<div class = "row">
																		<div class = "col-md-3">
																			<input class="form-control" name = "w_address_lot"  id = "w_address_lot<?php echo $obj[$i]["id"] ?>" type="text" placeholder = "Lot. No. / Street No." value = "<?php echo $obj[$i]["address_lot"]?>"/>
																		</div>
																		<div class = "col-md-3">
																			<input class="form-control" name = "w_address_street" id = "w_address_street<?php echo $obj[$i]["id"] ?>" type="text" placeholder = "Street Name" value = "<?php echo$obj[$i]["address_street"] ?>"/>
																		</div>
																		<div class = "col-md-3">
																			<input class="form-control" name = "w_address_brgy" id = "w_address_brgy<?php echo $obj[$i]["id"] ?>" type="text" placeholder = "Brgy" value = "<?php echo $obj[$i]["address_brgy"] ?>"/>
																		</div>
																		<div class = "col-md-3">
																			<input class="form-control" name = "w_address_city" id = "w_address_city<?php echo $obj[$i]["id"] ?>" type="text" placeholder = "City" value = "<?php echo $obj[$i]["address_city"]?>"/>
																		</div>
																	</div>
																	<div class="form-group">
																		<label>Customer Contact No.</label> 
																		<input class="form-control" name = "w_contactno" id = "w_contactno<?php echo $obj[$i]["id"] ?>"type="text"  value = "<?php echo $obj[$i]["contact_info"] ?>"/>
																		<p class="help-block"></p>
																	</div>
																	<div class="form-group">
																		<label>Customer Email.</label> 
																		<input class="form-control" name = "w_email" id = "w_email<?php echo $obj[$i]["id"] ?>" type="email"  value = "<?php echo $obj[$i]["email_addr"] ?>"/>
																		<p class="help-block"></p>
																	</div>
																	
																	
																	<label>Username</label> 
                                                                    <input class="form-control" type="text"  disabled= 'true' name = "user" id = "user" value = "<?php echo $obj[$i]["user"] ?>"/>
																	<label>Password</label> 
                                                                    <input class="form-control" type="text"  disabled= 'true' name = "pass"id = "pass" value = "<?php echo $obj[$i]["pass"] ?>"/>																	
																	<label>Active</label> 
                                                                    <input class="form-control" type="text" disabled= 'true'  name = "pass"id = "pass" value = "<?php if ($obj[$i]["isActive"]  == 1 )echo 'Account is active'; else 'Account is not active';?>"/>
																
									

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default updateWorker" data-id = "<?php echo $obj[$i]["id"] ?>" id = "updateWorker">Update</button>
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
		

															<!-- End Modal content-->
														</div>
													</div>
													<div id="delModal<?php echo $obj[$i]["id"];?>" class="modal fade" role="dialog">
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
																<button type="button" class="btn btn-danger disableWorker" data-id = "<?php echo $obj[$i]["id"] ?>"  >Delete</button>
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

    <?php include('assets\navbar\footer.php');?>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
     <?php include('assets\navbar\scripts.php');?>
</body>
</html>