<?php
include("connection/conn.php");
try{
	if(isset($_POST['submit'])){
	$id = mysql_result(mysql_query("SELECT COUNT(*) FROM item_type "),0);
	$id += 1; 
	$type_name = $_POST['type_name'];
	$type_details = $_POST['type_details'];
	$qry = "INSERT INTO item_type VALUES('$id','$type_name','$type_details')";
	$insert = mysql_query($qry);	
	if(!$insert){
		?><script>alert("Failed to do insert")</script><?php
	}else{
		?><script>alert("Succesfull")</script><?php
	}
}
}catch(Exception $e){
	echo $e;
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
                    <small>Create Item Category</small></h1>
                </section>
                <!-- Main content -->
                <section class="content">
				<div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Add Item Category
                            </div>
							
                            <div class="panel-body">
                                <form role="form" action = "" method = "post">
                                    <div class="form-group">
                                        <label>Item Type</label> 
										<input class="form-control" name = "type_name" type="text" />
                                        <p class="help-block">Name or type of service</p>
                                    </div>
									<div class="form-group">
                                        <label>Item type details</label> 
										<textarea class="form-control" name = "type_details"></textarea>
                                        <p class="help-block"></p>
                                    </div>
									
									
                                    <input type="submit" class="btn btn-info" name = "submit" value = "submit">
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
