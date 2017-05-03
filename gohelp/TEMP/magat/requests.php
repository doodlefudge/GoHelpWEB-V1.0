<?php
include('connection/conn.php');
$toEdit = 'ad';
?>
<!DOCTYPE html>
<html>
    <?php include('include/header.php');?>
    <head>
        <meta name="generator"
        content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
        <title></title>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include('include/navbar.php');?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('include/navside.php'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Dashboard 
                    <small>Requests</small></h1>
                </section>
                <!-- Main content -->
                <section class="content">
				<table class="table table-hover">
						<thead>
							<tr>
								<th>Request ID</th>
								<th>Full name</th>
								<th>Department</th>
								<th>Remarks</th>
								<th>View Table</th>
								<th>Disapprove</th>
							</tr>
						
						</thead>
					<tbody>
						<?php
							$qry = "SELECT * FROM request WHERE status = '0'";
							$retval = mysql_query($qry);
							$arr = array();
							
						while($row = mysql_fetch_array($retval)){
						?>
							<tr class = "tbl_service">
								<td><?php echo $row["id"];?></td>
								<td><?php echo $row["fullname"];?></td>
								<td><?php echo $row["department"];?></td>
								<td><?php echo $row["remarks"];?></td>
								<td><button class="btn btn-primary"data-toggle="modal" data-target="#editModal<?php echo $row["id"];?>"><i class="glyphicon glyphicon-search"></i>View Items</button></td>
								<td><button class="btn btn-danger" data-toggle="modal" data-target="#delModal<?php echo $row["id"];?>"><i class="glyphicon glyphicon-remove"></i>Delete</button></td>
								<div id="editModal<?php echo $row["id"];?>" class="modal fade" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">View Requested Items<?php echo $row["id"];?></h4>
												
											</div>
											<div class="modal-body">
														<?php
															$qry1 = "SELECT * FROM request_items r LEFT JOIN items i ON r.item_id = i.item_id WHERE r.id = '".$row["id"]."'";
															$retval1 = mysql_query($qry1);
															$arr1 = array();
															$toEdit  = '';
															while($row1 = mysql_fetch_array($retval1)){
																$arr1[] = $row1;
																?>
															
															<?php echo $row1['item_name']?>
															<?php echo $row1['item_selling_price']?>
															<?php echo $row1['item_quantity'].'<br/>'?>
															<?php?>
															
														<?php
															}?>
														<?php?>
												
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-success approveID" data-toeditable = "<?php echo $row["id"];?>"<?php echo $row["id"];?>">Approve</button>
												<button type="button" class="btn btn-default" data-id = "<?php echo $row["id"];?>" data-dismiss="modal">Close</button>
											</div>
										</div>
									<!-- End Modal content-->
									</div>
								</div>	
								<div id="delModal<?php echo $row["id"];?>" class="modal fade" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->	
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Delete  <?php echo $row['id']; ?></h4>
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
				</section>				
				<!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include('include/footer.php');?>
            <!-- Control Sidebar -->
            <?php include('include/navsideright.php');?>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php include('include/scripts.php');?>
    </body>
</html>
