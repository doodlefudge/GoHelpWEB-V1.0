<?php

include_once(dirname(__FILE__).'/assets/connection/connection.php');
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include(dirname(__FILE__).'/assets/navbar/include.php');?>
<body >
<div id="wrapper">
    <?php include(dirname(__FILE__).'/assets/navbar/header.php');?>
    <!-- /. NAV TOP  -->
    <?php include(dirname(__FILE__).'/assets/navbar/navbar.php');?><!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Edit Room Details</h1>

                    <h1 class="page-subhead-line">Edit Room	</h1>
                </div>
            </div><!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql= "SELECT * from login l INNER JOIN login_info li ON l.id = li.id";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $obj = $stmt->fetchAll();
                                    $nRows = $pdo->query("select count(*)from login l INNER JOIN login_info li ON l.id = li.id")->fetchColumn();
                                    for($i = 0 ; $i < $nRows; $i++){
                                        ?>
                                        <tr>
                                            <td><?php echo $obj[$i]["id"];?></td>
                                            <td><?php echo $obj[$i]["user"];?></td>
                                            <td><?php echo $obj[$i]["fname"]. " " . $obj[$i]["lname"];?></td>
                                            <td><button class="btn btn-primary"data-toggle="modal" data-target="#editModal<?php echo $obj[$i]["id"];?>"><i class="glyphicon glyphicon-search"></i>Edit</button></td>
                                            <td><button class="btn btn-danger" data-toggle="modal" data-target="#delModal<?php echo $obj[$i]["id"];?>"><i class="glyphicon glyphicon-remove"></i>Delete</button></td>
                                            <div id="editModal<?php echo $obj[$i]["id"];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit Category</h4>
                                                        </div>
                                                        <form role="form" action = "" method = "post">
                                                            <div class="modal-body">
                                                                <div id = "serv_cat_err" class = "serv_cat_err"></div>
                                                                <div class="form-group">
                                                                    <label>Tour ID</label>
                                                                    <input class="form-control" name = "schedule_type_id" id = "schedule_type_id" type="text" value = "<?php echo $obj[$i]['id'];?>" disabled="true"/>
                                                                    <p class="help-block">Name or type of service</p>
                                                                </div>
                                                                <input type="hidden" value - <?php echo $obj[$i]['schedule_type_id']?>/>
                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input class="form-control" name = "type_name" id = "<?php echo "type_name".$obj[$i]['id'];?>" type="text" value = "<?php echo $obj[$i]['type_name'] ;?>"></input>

                                                                    <p class="help-block">Name or type of service</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <textarea class="form-control" name = "type_description" id ="<?php echo "type_description".$obj[$i]['id'];?>"><?php echo  $obj[$i]['type_description']; ?></textarea>

                                                                    <!--<p class="help-block"><?php echo $error?></p>-->
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Minimum People</label>
                                                                    <input class="form-control" name = "person_minimum" type="number"  id ="<?php echo "person_minimum".$obj[$i]['schedule_type_id'];?>" value = "<?php  echo $obj[$i]['person_minimum']; ?>"  />
                                                                    <p class="help-block">Minimum Number of people</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Maximum People</label>
                                                                    <input class="form-control" name = "person_maximum" type="number" id ="<?php echo "person_maximum".$obj[$i]['schedule_type_id'];?>" value = "<?php echo $obj[$i]['person_maximum']; ?>"  />
                                                                    <p class="help-block">Maximum Number of people</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input class="form-control" name = "type_price" type="number" step="0.1" id ="<?php echo "type_price".$obj[$i]['schedule_type_id'];?>" value = "<?php echo  $obj[$i]['type_price']; ?>"  />
                                                                    <p class="help-block">Price of the packagee</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Secondary Room Description</label>
                                                                    <textarea class="form-control" name = "schedule_sec_info"  id ="<?php echo "schedule_sec_info".$obj[$i]['schedule_type_id'];?>"><?php echo  $obj[$i]['schedule_sec_info']; ?></textarea>
                                                                    <p class="help-block"></p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default cat" data-schedule_type_id= "<?php echo $obj[$i]['schedule_type_id']; ?>" value = "Update" name = "submit" id = "edit_cat_submit" >Update</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <div id="delModal<?php echo $obj[$i]["schedule_type_id"];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete  <?php echo $obj[$i]['type_name']; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id = "del_cat_err" class = "del_cat_err"></div>
                                                            <p>Do you want to delete this category?</p>
                                                        </div>
                                                        <form action = "assets" method = "POST" name = "delete_service_category">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger delcat" data-scheduleid= "<?php echo $obj[$i]['schedule_type_id']; ?>">Delete</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>

            </div><!--/.ROW-->


        </div><!-- /. PAGE INNER  -->
    </div><!-- /. PAGE WRAPPER  -->
</div><!-- /. WRAPPER  -->
<?php include(dirname(__FILE__).'/assets/navbar/footer.php');?>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<?php include(dirname(__FILE__).'/assets/navbar/scripts.php');?>
</body>
</html>
