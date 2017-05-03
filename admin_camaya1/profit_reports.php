<?php
include_once('assets\connection\connection.php');
if(isset($_POST['submit'])){
	$from = $_POST['from'];
	$to = $_POST['to'];
	
	header("location : profit_reports_view.php?from=$from&to=$to");
}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('assets\navbar\include.php');?>
<body>
    <div id="wrapper">
        <?php include('assets\navbar\header.php');?>
        <!-- /. NAV TOP  -->
        <?php include('assets\navbar\navbar.php');?>
		<!-- /. NAV SIDE  --><!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Profit Reports </h1>

                        <h1 class="page-subhead-line">Filter summary of profit between dates</h1>
                    </div>
                </div>
				<!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Skill
                            </div>
							
                            <div class="panel-body">
							
                                <form role="form" action = "" method = "POST" >
                                    <div class="form-group">
										<div class = "row">
											<div class = "col-md-3" >
												<label>From</label>
												<input type = "text"  name = "from" id = "from" class="form-control datepicker2"/>
											</div>
											<div class = "col-md-3">
												<label>To</label>
												<input type = "text"	name = "to" id = "to" class="form-control datepicker2"/>
											</div>
										</div>
                                    </div>
                                    <input type="submit" class="btn btn-info getProfit" name = "submit" value = "View Profit Report" >
                                </form>
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
    <!-- JQUERY SCRIPTS -->
    <?php include('assets\navbar\scripts.php');?>

</body>
</html>
