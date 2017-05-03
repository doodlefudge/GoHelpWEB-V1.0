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
                <section class="content"></section>
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
