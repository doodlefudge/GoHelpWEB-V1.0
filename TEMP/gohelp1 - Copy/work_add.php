<?php

 
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('assets\navbar\include.php');?>
<body>
    <div id="wrapper">
	
		<?php include('assets\navbar\header.php');?>
        <!-- /. NAV TOP  -->
        <?php include('assets\navbar\navbar.php');?><!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Worker Account</h1>

                        <h1 class="page-subhead-line">Add service to show on each page on the page</h1>
                    </div>
                </div><!-- /. ROW  -->

                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Register Worker Account
                            </div>
							
                            <div class="panel-body">
                                    
								<div class="form-group">
									<label>Worker First Name</label> 
									<input class="form-control" name = "w_fname" id = "w_fname" type="text" />
									<p class="help-block"></p>
								</div><div class="form-group">
									<label>Worker Middle Name</label> 
									<input class="form-control" name = "w_middle"  id = "w_middle" type="text" />
									<p class="help-block"></p>
								</div>
								<div class="form-group">
									<label>Worker Last Name</label> 
									<input class="form-control" name = "w_lastname" id = "w_lastname" type="text" />
									<p class="help-block"></p>
								</div>
								<label>Worker Address</label> 
								<div class = "row">
									<div class = "col-md-2">
										<input class="form-control" name = "w_address_lot"  id = "w_address_lot" type="text" placeholder = "Lot. No. / Street No."/>
									</div>
									<div class = "col-md-2">
										<input class="form-control" name = "w_address_street" id = "w_address_street" type="text" placeholder = "Street Name"/ />
									</div>
									<div class = "col-md-2">
										<input class="form-control" name = "w_address_brgy" id = "w_address_brgy" type="text" placeholder = "Brgy"/>
									</div>
									<div class = "col-md-3">
										<input class="form-control" name = "w_address_city" id = "w_address_city" type="text" placeholder = "City"/>
									</div>
								</div>
								<div class="form-group">
									<label>Worker Contact No.</label> 
									<input class="form-control" name = "w_contactno" id = "w_contactno"type="text" />
									<p class="help-block"></p>
								</div>
								<div class="form-group">
									<label>Worker Email.</label> 
									<input class="form-control" name = "w_email" id = "w_email" type="email" />                                                                                            
									<p class="help-block"></p>
								</div>
								<div class="form-group">
									<label>Worker UserName</label> 
									<input class="form-control" name = "w_username" id = "w_username"type="text" />
									<p class="help-block"></p>
								</div>
								<div class="form-group">
									<label>Password</label> 
									<input class="form-control" name = "w_password" id = "w_password"placeholder="Password"  type="password" />
									<p class="help-block"></p>
								</div>
								
								<div class="form-group">
									<label>Confirm Password</label> 
									<input class="form-control" name = "rep_password" id = "rep_password" placeholder="Password"  type="password" />
									<p class="help-block"></p>
								</div>
								

								<button data-toggle="modal"  data-target="#addModal" class="btn btn-d" name = "add">Add</button>
								<div id="addModal" class="modal fade" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->	
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Create Worker</h4>
										</div>
										<div class="modal-body">
											<p>Create this account for worker?</p>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-info" id = "addWorker" name = "submit">Create</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										</div>
									</div>
									<!-- End Modal content-->
									</div>
								</div>                           
							</div>
                        </div>
                    </div>
                </div><!--/.ROW-->               
            </div><!-- /. PAGE INNER  -->
        </div><!-- /. PAGE WRAPPER  -->
    </div><!-- /. WRAPPER  -->

    <?php include('assets\navbar\footer.php');?>
	<!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
     <?php include('assets\navbar\scripts.php');?>
</body>
</html>
