<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ob_start();

include(dirname(__FILE__).'/assets/navbar/include.php');?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<body>
    <div id="wrapper">
        <?php include(dirname(__FILE__).'/assets/navbar/header.php');?>

        <!-- /. NAV TOP  -->
        <?php include(dirname(__FILE__).'/assets/navbar/navbar.php');?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Service Requests</h1>

                        <h1 class="page-subhead-line">Review service request and Send request for workers approval</h1>
                    </div>
                </div><!-- /. ROW  -->

                <div class="row">
					<div class="col-md-12">
						 <!--    Hover Rows  -->
						<div class="panel panel-default">
							<div class="panel-heading">
								List of Service Requests
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Inquirer's Name</th>
												<th>Schedule Type</th>
												<th>Scheduled Date</th>
												<th>Scheduled End</th>
												<th>View Detailed Schedule</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$sql = "SELECT * FROM 
                                                      schedule_info si 
                                                    INNER JOIN 
                                                      schedule_type st 
                                                    ON
                                                     si.schedule_type_id = st.schedule_type_id 
                                                    INNER JOIN 
                                                     customer_inquiry ci
                                                    ON 
                                                      si.inquire_id = ci.inquire_id
                                                    WHERE 
                                                      si.schedule_status = 0";
											$stmt = $pdo->prepare($sql);
											$stmt->execute();
											$obj = $stmt->fetchAll(); 
											$nRows = $pdo->query("SELECT COUNT(*) FROM 
                                                                      schedule_info si 
                                                                    INNER JOIN 
                                                                      schedule_type st 
                                                                    ON
                                                                     si.schedule_type_id = st.schedule_type_id 
                                                                    INNER JOIN 
                                                                     customer_inquiry ci
                                                                    ON 
                                                                      si.inquire_id = ci.inquire_id
                                                                    WHERE 
                                                                      si.schedule_status = 0")->fetchColumn();
											for($i = 0 ; $i < $nRows ; $i++){

										?>
											<tr>
												<td><?php echo $obj[$i]['inquirer_name']?></td>
												<td><?php echo $obj[$i]['schedule_type']?></td>
												<td><?php echo $obj[$i]['scheduled_date']?></td>
												<td><?php echo $obj[$i]['schedule_end']?></td>
												<td><button class="btn btn-primary"data-toggle="modal" data-target="#serviceModal<?php echo $obj[$i]['schedule_ID'];?>"><i class="glyphicon glyphicon-search"></i>View</button></td>
												<div id="serviceModal<?php echo $obj[$i]["tosend"];?>" class="modal fade" role="dialog">
													<div class="modal-dialog">
													<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Confirmation</h4>
															</div>
															<div class="modal-body">
															<form action = "./service_panel.php" method = 'POST'>
																<div id = "req_err" class = "req_err"></div>
																<label>Request ID</label> 
																<input class="form-control" type="text" disabled = 'true'  id = "schedule_id" name = "<?php echo "tosend".$obj[$i]['tosend'];?>" value = "<?php echo $obj[$i]["tosend"] ?>"/>
																<label>Name of Customer</label>
																<input class="form-control" type="text" disabled = 'true' name = "cust_name" id = "cust_name" value = "<?php echo $obj[$i]["inquirer_name"] ?>"/>
																<label>Schedule additional Detail</label>
																<textarea class="form-control" type="text" disabled = 'true'style="min-width: 100%; box-sizing: border-box; " name = "addtl_detail" id = "addtl_detail" ><?php echo $obj[$i]['service_detail']?></textarea>
																<label>Room/Tour name</label>
                                                                <input class="form-control" type="text" disabled = 'true' name = "cust_name" id = "cust_name" value = "<?php echo $obj[$i]["fname"] .' '. $obj[$i]['lname']  ?>"/>
																<label>W : Worker , C: Customer</label>
															</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default req" data-request_id= "<?php echo $obj[$i]["tosend"] ?>" id = "create_request" >Create Confirmation</button>
																	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																</div>
															</form>
														</div>
														

													<!-- End Modal content-->
													</div>
												</div>
											</tr>
										<?php
										}?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- End  Hover Rows  -->
					</div>
                </div>

                    
                </div><!--/.ROW-->

               
            </div><!-- /. PAGE INNER  -->
        </div><!-- /. PAGE WRAPPER  -->
    </div><!-- /. WRAPPER  -->

    <?php include(dirname(__FILE__).'/assets/navbar/footer.php');?>
	<!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <?php include(dirname(__FILE__).'/assets/navbar/scripts.php');?>
</script>
</body>
</html>
