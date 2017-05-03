<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('assets\navbar\include.php');?>
<body>
    <div id="wrapper">
        <?php include('assets\navbar\header.php');?>

        <!-- /. NAV TOP  -->
		<?php include('assets\navbar\navbar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h1 class="page-subhead-line">Navigate through your dashboard</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">
                                <i class="fa fa-bolt fa-5x"></i>
                                <h5><?php 
									$pdo = new PDO($dsn, $user, $pass);
									$sql = "SELECT COUNT(*) as count FROM tbl_service_request r 
											LEFT JOIN tbl_service_confirmation c ON r.request_id = c.request_id 
											LEFT JOIN tbl_user_info i ON c.worker_id = i.id 
											LEFT JOIN tbl_user_info cust ON cust.id = r.customer_id 
											LEFT JOIN tbl_service_detail d ON  r.serv_detail_id = d.serv_detail_id 
											WHERE r.service_status = '2' AND c.worker_conf_status = '1' AND c.serv_conf_status = '0'";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$obj = $stmt->fetchAll();
									?>								
									<?php echo $obj[0]['count']?> Confirmations	</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <i class="fa fa-plug fa-5x"></i>
                                <h5>
									<?php 
									$pdo = new PDO($dsn, $user, $pass);
									$sql = "SELECT COUNT(*) as count FROM tbl_service_request WHERE service_status = '1'";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$obj = $stmt->fetchAll();
									?>								
									<?php echo $obj[0]['count']?> Task In Check
								</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <i class="fa fa-dollar fa-5x"></i>
                                <h5><?php 
									$sql = "SELECT SUM(service_price) as count FROM tbl_service_request r LEFT JOIN tbl_user_info i ON r.customer_id = i.id LEFT JOIN tbl_service_detail d ON  r.serv_detail_id = d.serv_detail_id WHERE r.service_status = '1'";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$obj = $stmt->fetchAll();

									?>								
									<?php echo $obj[0]['count']?> Pending</h5>
                            </a>
                        </div>
                    </div>

                </div>

               
                <!-- /. ROW  -->
		

                <!--/.ROW-->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <?php include('assets\navbar\footer.php');?>

    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <?php include('assets\navbar\scripts.php');?>


</body>
</html>
