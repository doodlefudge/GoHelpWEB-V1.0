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
        <?php include('assets\navbar\navbar.php');?><!-- /. NAV SIDE  --><!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Admin Approval of Requests</h1>

                        <h1 class="page-subhead-line">Approve service request of customer's</h1>
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
												<th>Customer Name</th>
												<th>Service Name</th>
												<th>Scheduled Date</th>
												<th>Time</th>
												<th>View Service Request</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$pdo = new PDO($dsn,$user,$pass);
											$sql = "SELECT * FROM tbl_service_request r LEFT JOIN tbl_user_info i ON r.customer_id = i.id LEFT JOIN tbl_service_detail d ON  r.serv_detail_id = d.serv_detail_id WHERE r.service_status = '1'";
											$stmt = $pdo->prepare($sql);
											$stmt->execute();
											$obj = $stmt->fetchAll(); 
											$nRows = $pdo->query("SELECT COUNT(*) FROM tbl_service_request r LEFT JOIN tbl_user_info i ON r.customer_id = i.id LEFT JOIN tbl_service_detail d ON  r.serv_detail_id = d.serv_detail_id WHERE r.service_status = '1'")->fetchColumn(); 
											for($i = 0 ; $i < $nRows ; $i++){
											$date1 = new DateTime($obj[$i]['date_of_service']. ' ' . $obj[$i]['time_start_of_service']);
											$date2 = new DateTime($obj[$i]['date_of_service']. ' 7:00PM');
											$diff = $date2->diff($date1);
											$hours = $diff->h;
											$hours = $hours + ($diff->days*24);
											if($hours <= 4 )
											{
												$amount = $obj[$i]['service_price'] * .4 ;
											}else{
												$amount= $obj[$i]['service_price'] ;
											}
										
										?>
											<tr>
												<td><?php echo $obj[$i]['fname'] ." ".$obj[$i]['lname']?></td>
												<td><?php echo $obj[$i]['service_name']?></td>
												<td><?php echo $obj[$i]['date_of_service']?></td>
												<td><?php echo $obj[$i]['time_start_of_service']?></td>
												<td><button class="btn btn-primary"data-toggle="modal" data-target="#serviceModal<?php echo $obj[$i]['request_id'];?>"><i class="glyphicon glyphicon-search"></i>View</button></td>
												<div id="serviceModal<?php echo $obj[$i]["request_id"];?>" class="modal fade" role="dialog">
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
																<input class="form-control" type="text" disabled = 'true'  id = "request_id" name = "<?php echo "request_id".$obj[$i]['request_id'];?>" value = "<?php echo $obj[$i]["request_id"] ?>"/>
																<label>Customer ID</label> 
																<input class="form-control" type="text" disabled = 'true' name = "cust_id" id = "cust_id" value = "<?php echo $obj[$i]['id']?>"/>
																<label>Name of Customer</label> 
																<input class="form-control" type="text" disabled = 'true' name = "cust_name" id = "cust_name" value = "<?php echo $obj[$i]["fname"] .' '. $obj[$i]['lname']  ?>"/>
																<label>Service Request Detail</label> 
																<textarea class="form-control" type="text" disabled = 'true'style="min-width: 100%; box-sizing: border-box; " name = "serv_request" id = "serv_request" ><?php echo $obj[$i]['service_detail']?></textarea>
																<label>Service Request Summary</label> 
																<input class="form-control" type="text" style="min-width: 100%; box-sizing: border-box; " name = "serv_summary" id = "<?php echo "serv_summary".$obj[$i]['request_id'];?>" />
																<label>Service Quotation</label>
																<input class="form-control" type="text" name = "serv_quote" id = "<?php echo "serv_quote".$obj[$i]['request_id'];?>" value = "<?php echo $amount;?>"/>
																<label>Workers Nearest to assign service</label>
																<select class="form-control map" name ="worker_id" id = "<?php echo "worker_id".$obj[$i]['request_id'];?>">
																	<?php
																	$pdo = new PDO($dsn,$user,$pass);
																	$sql1 = "SELECT * FROM tbl_user_info i LEFT JOIN tbl_user u  ON i.id = u.id  LEFT JOIN tbl_worker_skills w ON i.id = w.id WHERE u.account_type = '2' AND w.skill_id = '".$obj[$i]['serv_detail_id']."'";
																	$stmt1 = $pdo->prepare($sql1);
																	$stmt1->execute();
																	$obj1  = $stmt1->fetchAll();
																	$nRows1 = $pdo->query("SELECT COUNT(*) FROM tbl_user_info i LEFT JOIN tbl_user u  ON i.id = u.id  LEFT JOIN tbl_worker_skills w ON i.id = w.id WHERE u.account_type = '2' AND w.skill_id = '".$obj[$i]['serv_detail_id']."'")->fetchColumn(); 
																	?>
																	<?php
																	for($j = 0; $j < $nRows1 ; $j++){
																		$coordinates2 = get_coordinates($obj1[$j]['address']);		
																		$test = $coordinates1['url'];
																		$dist = GetDrivingDistance($obj[$i]['lat'], $coordinates2['lat'], $obj[$i]['lng'], $coordinates2['long']);
																		if($dist['time'] < 3600 || $dist['dist'] < 10000 ){
																			?>	
																			<option selected = 'true' value= "<?php echo $obj1[$j]["id"]; ?>"><?php echo $obj1[$j]["fname"]. ' ' . $obj1[$j]['lname'].' - Estimated Time of Arrival '. $dist['timeText'].' - Distance By Road '. $dist['distText'];?></option>
																			<?php
																		}else{
																			?>	
																			<option selected = 'true' value= "<?php echo $obj1[$j]["id"]; ?>"><?php echo $obj1[$j]["fname"]. ' ' . $obj1[$j]['lname'].' - Estimated Time of Arrival '. $dist['timeText'];?></option>
																			<?php
																		}
																	}
																	
																	?>
																</select>	
																<label>Location</label>
																<img src ="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $obj[$i]['lat']?>,<?php echo $obj[$i]['lng'] ?>&zoom=16&size=565x300&markers=color:red%7Clabel:A%7C<?php echo $obj[$i]['lat']?>,<?php echo $obj[$i]['lng'] ?>&key=AIzaSyDm70H2lSLLKffXQ8iFbepnbD6V6E6jD2E">
															</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default req" data-request_id= "<?php echo $obj[$i]["request_id"] ?>" id = "create_request" >Create Confirmation</button>
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

    <?php include('assets\navbar\footer.php');?>
	<!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
   <?php include('assets\navbar\scripts.php');?>
</script>
</body>
</html>
