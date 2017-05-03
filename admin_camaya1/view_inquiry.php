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
                    <h1 class="page-head-line">Customer Inquiry</h1>

                    <h1 class="page-subhead-line">View inquiries sent from the website</h1>
                </div>
            </div><!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of customers inquired
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Inquirer's Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Inquiry Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM customer_inquiry ci 
                                            WHERE NOT EXISTS (SELECT * FROM schedule_info si WHERE si.inquire_id = ci.inquire_id )";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $obj = $stmt->fetchAll();
                                    $nRows = $pdo->query("SELECT COUNT(*) FROM customer_inquiry ci 
                                            WHERE NOT EXISTS (SELECT * FROM schedule_info si WHERE si.inquire_id = ci.inquire_id )")->fetchColumn();
                                    for($i = 0 ; $i < $nRows ; $i++){

                                        ?>
                                        <tr>
                                            <td><?php echo $obj[$i]['inquirer_name']?></td>
                                            <td><?php echo $obj[$i]['inquirer_email']?></td>
                                            <td><?php echo $obj[$i]['inquirer_phone']?></td>
                                            <td><?php echo $obj[$i]['inquiry_date']?></td>
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
