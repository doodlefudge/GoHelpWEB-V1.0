<?php
include('connection/conn.php');

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
                    <small>Control panel</small></h1>
					
                </section>
                <!-- Main content -->
                <section class="content">
				<table class="table table-bordered table-condensed table-striped" id = "dummyTable">
						<thead>
							<tr>
								<th>Item Name</th>
								<th>Item Category</th>
								<th>Item Price</th>
								<th>Item Qty.</th>
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
								<td><?php echo $row['item_stock']?></td>
								
								
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
