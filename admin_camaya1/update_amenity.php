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
                    <h1 class="page-head-line">Edit Amenity Details</h1>

                    <h1 class="page-subhead-line">Edit Amenity	</h1>
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
                                        <th>Room ID</th>
                                        <th>Room Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql= "SELECT * from amenities ";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $obj = $stmt->fetchAll();
                                    $nRows = $pdo->query('select count(*) from amenities')->fetchColumn();
                                    for($i = 0 ; $i < $nRows; $i++){
                                        ?>
                                        <tr>
                                            <td><?php echo $obj[$i]["amenity_id"];?></td>
                                            <td><?php echo $obj[$i]["amenity_name"];?></td>
                                            <td><button class="btn btn-primary"data-toggle="modal" data-target="#editModal<?php echo $obj[$i]["amenity_id"];?>"><i class="glyphicon glyphicon-search"></i>Edit</button></td>
                                            <td><button class="btn btn-danger" data-toggle="modal" data-target="#delModal<?php echo $obj[$i]["amenity_id"];?>"><i class="glyphicon glyphicon-remove"></i>Delete</button></td>
                                            <div id="editModal<?php echo $obj[$i]["amenity_id"];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit Amenity</h4>
                                                        </div>
                                                        <form role="form" action = "" method = "post">
                                                            <div class="modal-body">
                                                                <div id = "serv_cat_err" class = "serv_cat_err"></div>
                                                                <div class="form-group">
                                                                    <label>Amenity ID</label>
                                                                    <input class="form-control" name = "amenity_id" id = "amenity_id" type="text" value = "<?php echo $obj[$i]['amenity_id'];?>" disabled="true"/>
                                                                    <p class="help-block">Name or type of amenity</p>
                                                                </div>
                                                                <input type="hidden" value - <?php echo $obj[$i]['amenity_id']?>/>
                                                                <div class="form-group">
                                                                    <label>Amenity Name</label>
                                                                    <input class="form-control" name = "amenity_name" id = "<?php echo "amenity_name".$obj[$i]['amenity_id'];?>" type="text" value = "<?php echo $obj[$i]['amenity_name'] ;?>"></input>

                                                                    <p class="help-block">Name or type of Amenity</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Amenity Details</label>
                                                                    <textarea class="form-control" name = "amenity_desc" id ="<?php echo "amenity_desc".$obj[$i]['amenity_id'];?>"><?php echo  $obj[$i]['amenity_desc']; ?></textarea>

                                                                    <!--<p class="help-block"><?php echo $error?></p>-->
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Amenity Price</label>
                                                                    <input class="form-control" name = "amenity_price" type="number" step="0.1" id ="<?php echo "amenity_price".$obj[$i]['amenity_id'];?>" value = "<?php echo  $obj[$i]['amenity_price']; ?>"  />
                                                                    <p class="help-block">Price of the packagee</p>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default ame" data-amenity_id= "<?php echo $obj[$i]['amenity_id']; ?>" value = "Update" name = "submit" id = "edit_cat_submit" >Update</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <div id="delModal<?php echo $obj[$i]["amenity_id"];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete  <?php echo $obj[$i]['amenity_name']; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id = "del_cat_err" class = "del_cat_err"></div>
                                                            <p>Do you want to delete this category?</p>
                                                        </div>
                                                        <form action = "./" method = "POST" name = "delete_service_category">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger ame" data-amenity_id= "<?php echo $obj[$i]['amenity_id']; ?>">Delete</button>
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
