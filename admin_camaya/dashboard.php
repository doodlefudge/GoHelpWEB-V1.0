<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ob_start();

include(dirname(__FILE__).'/assets/navbar/include.php');?>
<body>
    <div id="wrapper">
        <?php include(dirname(__FILE__).'/assets/navbar/header.php');?>

        <!-- /. NAV TOP  -->
		<?php include(dirname(__FILE__).'/assets/navbar/navbar.php');?>
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
									//$pdo = new PDO($dsn, $user, $pass);
									$sql = "SELECT COUNT(*) as count from customer_inquiry";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$obj = $stmt->fetchAll();
									?>								
									<?php echo $obj[0]['count']?> Customer Inquiries	</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <i class="fa fa-plug fa-5x"></i>
                                <h5>
									<?php 
									//$pdo = new PDO($dsn, $user, $pass);
									$sql = "SELECT COUNT(*) as count FROM schedule_info WHERE schedule_status = 1";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$obj = $stmt->fetchAll();
									?>								
									<?php echo $obj[0]['count']?> Inquiry of schedules
								</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <i class="fa fa-user fa-5x"></i>
                                <h5><?php 
									$sql = "SELECT COUNT(*) as count FROM user_message";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$obj = $stmt->fetchAll();

									?>								
									<?php echo $obj[0]['count']?> Messages</h5>
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
    <?php include(dirname(__FILE__).'/assets/navbar/footer.php');?>

    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <?php include(dirname(__FILE__).'/assets/navbar/scripts.php');?>


</body>
</html>
