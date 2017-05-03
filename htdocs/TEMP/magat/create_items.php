<?php
include("connection/conn.php");
if(isset($_POST['submit'])){
	$id = mysql_result(mysql_query("SELECT COUNT(*) FROM items "),0);
	$id += 1;
	$item_name = $_POST['item_name'];
	$item_details = $_POST['item_details'];	
	$item_unit_price = $_POST['item_unit_price'];
	$item_selling_price = $_POST['item_selling_price'];
	$item_type = $_POST['item_type'];
	$qry = "INSERT INTO items VALUES('$id','$item_name','$item_details','$item_unit_price','$item_selling_price','$item_type')";
	$insert = mysql_query($qry);
	$qry = "INSERT INTO item_stock VALUES('$id','0')";
	$insert1 = mysql_query($qry);
	if((!$insert) && (!$insert1)){
		?><script>alert("Failed to do insert")</script><?php
	}else{
		?><script>alert("Succesfull")</script><?php
	}
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
                    <h1>Dashboard 
                    <small>Create Item</small></h1>
                </section>
                <!-- Main content -->
                <section class="content">
				<div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Add Item
                            </div>
							
                            <div class="panel-body">
                                <form role="form" action = "" method = "post">
                                    <div class="form-group">
                                        <label>Stock Item Name</label> 
										<input class="form-control" name = "item_name" type="text" required = "true" />
                                        <p class="help-block">Name or type of service</p>
                                    </div>
									<div class="form-group">
                                        <label>Item details</label> 
										<textarea class="form-control" name = "item_details" required = "true"></textarea>
                                        <p class="help-block"></p>
                                    </div>
									<div class="form-group">
                                        <label>Item Unit Price</label> 
										<input class="form-control" name = "item_unit_price" type="text" />
                                        <p class="help-block"></p>
                                    </div>
									<div class="form-group">
                                        <label>Item Selling Price</label> 
										<input class="form-control" name = "item_selling_price" type="text" />
                                        <p class="help-block"></p>
                                    </div>
									<div class="form-group">
                                        <label>Item Type</label> 
                                        <select class="form-control" name = "item_type" id = "item_type">
											<?php
											$qry1 = "SELECT * FROM item_type";
											$get_item_category = mysql_query($qry1);
											while($row = mysql_fetch_array($get_item_category)) {
												?>
												<option value = "<?php echo $row['item_type_id'] ?>"><?php echo $row['item_type_name']?></option>
												<?php
											}
											?>
										</select>
										<p class="help-block"></p>
                                    </div>
                                    <input type="submit" class="btn btn-info" name = "submit" value = "Create Item">
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div><!--/.ROW-->

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
