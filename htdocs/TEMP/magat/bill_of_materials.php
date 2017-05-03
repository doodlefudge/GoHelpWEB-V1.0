<?php 
include('connection/conn.php');
if(isset($_POST['submit']))
{
	$id = mysql_result(mysql_query("SELECT COUNT(*) FROM request "),0);
	$id += 1;
	$fullname = $_POST['fullname'];
	$department = $_POST['department'];
	$remarks = $_POST['remarks'];
	
	$qry = "INSERT INTO request VALUES('".$id."','.".$fullname."','".$department."','".$remarks."','0')";

	$insert = mysql_query($qry);
	
	
}
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
                    <h1>Bill of materials
                    <small>Control panel</small></h1>
					
                </section>
                <!-- Main content -->
                <section class="content">
					<div class = "row">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h2>List of Items</h2>
									<table class="table table-bordered table-condensed table-striped" id = "dummyTable">
										<thead>
											<tr>
												<th>Item Name</th>
												<th>Item Category</th>
												<th>Item Price</th>
												<th>Item Qty.</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$qry = "SELECT * FROM ITEMS i LEFT JOIN item_type t ON i.item_type_id = t.item_type_id LEFT JOIN item_stock s ON i.item_id = s.item_id";
												$retval = mysql_query($qry);
												$arr = array();
												while($row = mysql_fetch_array($retval)){
													$arr[] = $row;
												
											?>
											<tr>
												<td><?php echo $row['item_name']?></td>
												<td><?php echo $row['item_type_name']?></td>
												<td><?php echo $row['item_selling_price']?></td>
												<td><input type ="text" class = "" id = "<?php echo 'qty'.$row['item_id']?>" ></td>
												<td class="text-center">
													<button class="btn btn-danger item" data-id = "<?php echo $row['item_id']?>" id = "myFunction"><i class="fa fa-refresh fa-spin fa-fw hide"></i>Action</button>
												</td>
												
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
									<div class="col-md-12 col-sm-6 col-xs-12">
										<div class="panel panel-info">
											<div class="panel-heading">
												BASIC FORM
											</div>
											<div class="panel-body">
												<form action = "" method = "POST" class = "my_form">
													<div class="form-group">
														<label>Full Name</label>
														<input class="form-control" type="text" name = "fullname">
														<p class="help-block">Client's Full name</p>
													</div>
													 <div class="form-group">
														<label>Department</label>
														<input class="form-control" type="text" name = "department">
														<p class="help-block">State Deparment Here</p>
													</div>
													<div class="form-group">
														<label>Remarks</label>
														<textarea class="form-control" rows="3" name = "remarks"></textarea>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															List of items to Request
														</div>
														<div class="panel-body">
															<div class="table-responsive">
																<table class="table table-bordered table-condensed table-striped id" id="appendData1">
																	<caption>Bill of Materials</caption>
																	<thead>
																		<tr>
																			<th>Item ID</th>
																			<th>Item NAME</th>
																			<th>Item Price</th>
																			<th>Item Qty</th>
																			<th>Item Total</th>
																			<th>Remove</th>
																		</tr>
																		<tbody class = "itemsTbl">
																		</tbody>
																	</thead>
																</table>
															</div>
														</div>
													</div>
												<div class = "col-xl-16">
													<button type="button" name = "submit_me" class="btn btn-lg btn-primary item" data-id = "<?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM request "),0) +1?>" > 'Create Request'</button> 
												</div>	
												<input type = "submit" id = "submit_me" name = "submit" style = "display : none;">
												</form>
											</div>
										</div>
									</div>
									
									<!-- <div id="applendData"></div>-->
									
									
								</div>
							</div>
						</div>
					</div>
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
