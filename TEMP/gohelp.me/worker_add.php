
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('../gohelp.me/assets/navbar/include.php');?>
<body>
    <div id="wrapper">
		<?php include('../gohelp.me/assets/navbar/header.php');?>
        <!-- /. NAV TOP  -->
        <?php include('../gohelp.me/assets/navbar/navbar.php');?><!-- /. NAV SIDE  -->

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
                                <form role="form" action = "" method = "post">
                                    <div class="form-group">
                                        <label>Username</label> 
										<input class="form-control" name = "w_username" id = "w_username" type="text" />
                                        <p class="help-block">Name or type of service</p>
                                    </div>
									<div class="form-group">
                                        <label>Password</label> 
										<input class="form-control" name = "w_password" id="w_password" type="text" />
                                        <p class="help-block"></p>
                                    </div>
									<div class="form-group">
                                        <label>Repeat Password</label> 
										<input class="form-control" name = "w_rep_password" id = "w_rep_password"type="text" />
                                        <p class="help-block"></p>
                                    </div>
									<div class="form-group">
                                        <label>Worker First Name</label> 
										<input class="form-control" name = "w_fname" type="text" />
                                        <p class="help-block"></p>
                                    </div><div class="form-group">
                                        <label>Worker Middle Name</label> 
										<input class="form-control" name = "service_cat_name" type="text" />
                                        <p class="help-block"></p>
                                    </div><div class="form-group">
                                        <label>Worker Last Name</label> 
										<input class="form-control" name = "service_cat_name" type="text" />
                                        <p class="help-block"></p>
                                    </div>
									
                                    <button type="submit" class="btn btn-info" name = "submit">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div><!--/.ROW-->

               
            </div><!-- /. PAGE INNER  -->
        </div><!-- /. PAGE WRAPPER  -->
    </div><!-- /. WRAPPER  -->

    <?php include('../gohelp.me/assets/navbar/footer.php');?>
	<!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
     <?php include('../gohelp.me/assets/navbar/scripts.php');?>
</body>
</html>
