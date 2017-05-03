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
                    <h1 class="page-head-line">Customer Messages</h1>

                    <h1 class="page-subhead-line">View Messages sent from the website</h1>
                </div>
            </div><!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Messages
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Inquirer's Name</th>
                                        <th>Message Date & Time</th>
                                        <th>Message Subject</th>
                                        <th>View Detailed Schedule</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM 
                                              user_message usm 
                                            INNER JOIN 
                                             customer_inquiry ci
                                            ON 
                                              usm.inquire_id = ci.inquire_id";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $obj = $stmt->fetchAll();
                                    $nRows = $pdo->query("SELECT COUNT(*) FROM 
                                                                      user_message usm 
                                                                    INNER JOIN 
                                                                     customer_inquiry ci
                                                                    ON 
                                                                      usm.inquire_ID = ci.inquire_ID")->fetchColumn();
                                    for($i = 0 ; $i < $nRows ; $i++){

                                        ?>
                                        <tr>
                                            <td><?php echo $obj[$i]['inquirer_name']?></td>
                                            <td><?php echo $obj[$i]['message_subject']?></td>
                                            <td><?php echo $obj[$i]['message_datetime']?></td>
                                            <td><button class="btn btn-primary"data-toggle="modal" data-target="#serviceModal<?php echo $obj[$i]['inquire_id'];?>"><i class="glyphicon glyphicon-search"></i>View</button></td>
                                            <div id="serviceModal<?php echo $obj[$i]["inquire_id"];?>" class="modal fade" role="dialog">
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
                                                                <label>Message ID</label>
                                                                <input class="form-control" type="text" disabled = 'true'  id = "schedule_id" name = "<?php echo $obj[$i]['message_id'];?>" value = "<?php echo $obj[$i]["schedule_ID"] ?>"/>
                                                                <label>Name of Customer</label>
                                                                <input class="form-control" type="text" disabled = 'true' name = "cust_name" id = "cust_name" value = "<?php echo $obj[$i]["inquirer_name"] ?>"/>
                                                                <label>Subject</label>
                                                                <input class="form-control" type="text" disabled = 'true' name = "cust_name" id = "cust_name" value = "<?php echo $obj[$i]["message_subject"]  ?>"/>
                                                                <label>Date Sent</label>
                                                                <input class="form-control" type="text" disabled = 'true' name = "cust_name" id = "cust_name" value = "<?php echo $obj[$i]["message_datetime"] ?>"/>
                                                                <label>Message Body</label>
                                                                <textarea class="form-control" type="text" disabled = 'true' name = "cust_name" id = "cust_name" >
                                                                    <?php echo $obj[$i]["message_body"]  ?>
                                                                </textarea>

                                                        </div>
                                                        <div class="modal-footer">
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

<?php include(dirname(__FILE__).'/assets/navbar/footer.php');?>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<?php include(dirname(__FILE__).'/assets/navbar/scripts.php');?>
</script>
</body>
</html>
